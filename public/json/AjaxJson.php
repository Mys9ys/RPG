<?php

require_once "User.php";
require_once "Mob.php";
require_once "Frag.php";
require_once "Location.php";
require_once "MobRegen.php";
require_once "Loot.php";
require_once "Resource.php";
require_once 'User_res.php';

$users = new User();
$frag = new Frag();
$mobs = new Mob();
$location = new Location();
$mobRegen = new MobRegen();
$loot = new Loot();
$resource = new Resource();
$UsRes = new User_res();

    // флаг 1 запись победы и фрагов
if($_REQUEST['flag'] == 1){
    // Победы над конкретным мобом
    $result = $frag->findOneByPK($_REQUEST['userID']);
    if(!isset($result)){
        $frag->id = $_REQUEST['userID'];
        $frag->save();
    }
    $win = $frag->findOneByPK($_REQUEST['userID']);
    $selector = 'mob'.$_REQUEST['mobID'];
    $win ->$selector = $win ->$selector +1;
    $win->save();
}

    // Флаг 2 изъятие моба с локациии на время боя
if($_REQUEST['flag'] == 2){
    $take = $location->findOneByPK($_REQUEST['location']);
    if ($take->live_mobs>0){
        $take->live_mobs = $take->live_mobs-1;
        $take->save();
        echo json_encode('1');
    } else {
        echo json_encode('0');
    }
}

    // начисление опыта за бой
if($_REQUEST['flag'] == 3){
    $users = new User();
    $win = $users->findOneByPK($_REQUEST['userID']);
    $XP = $mobs->findOneByPK($_REQUEST['mobID']);
    $win->XP=$win->XP+$XP->win_XP;
    $win->battle_mobs = $win->battle_mobs+1;
    $win->win_mobs = $win->win_mobs+1;
    $win->save();
}
    // Реген моба - запись времени в базу
if($_REQUEST['flag'] == 4){
    $mobRegen->locID = $_REQUEST['location'];
    $mobRegen->mobID = $_REQUEST['mobID'];
    $mobRegen->time_battle = date('Y-m-d H:i:s');
    $mobRegen->time_regen = date('Y-m-d H:i:s', strtotime("+1 min"));
    $mobRegen->save();
}
    // Количество боев +1 при поражении
if($_REQUEST['flag'] == 5){
    $users = new User();
    $win = $users->findOneByPK($_REQUEST['userID']);
    $win->battle_mobs = $win->battle_mobs+1;
    $win->save();
}
// Возврат моба на карту после победы над userom
if($_REQUEST['flag'] == 6){
    $take = $location->findOneByPK($_REQUEST['location']);
    $take->live_mobs = $take->live_mobs+1;
    $take->save();
}
// запрос всего возможного лута от моба
if($_REQUEST['flag'] == 7){
    $mobs = $loot->findOneByColumn('mobID',$_REQUEST['mobID']);
    $array = [];
    foreach ($mobs as $col) {
        $take = $resource->findOneByPK($col->resID);
        $col = (array)$col;
        foreach ($col as $item) {
            $item['name'] = $take->name;
            $item['image'] = $take->image;
            array_push($array, $item);
        }
    }
    echo json_encode(array("loot" => $array));
}
// зачисление выпавшего лута в инвентарь игроку
if($_REQUEST['flag'] == 8){
    $UsRes = new User_res();
    $result = $UsRes->findManyByColumn('userID', $_REQUEST['userID'], 'resID', $_REQUEST['resID'])[0];
    $prefix = $result->id;
    // создание новой записи для лута
    if(!isset($result)) {
        $UsRes->userID = $_REQUEST['userID'];
        $UsRes->resID = $_REQUEST['resID'];
        $UsRes->count = 1;
        $UsRes->save();
    // зачисление к уже имеющемуся
    } else {
        $give =$result->findOneByPK($prefix);
        $give->count ++;
        $give->save();
    }
}

if($_REQUEST['flag'] == 9){
    $regen = $mobRegen->findAll();
    foreach ($regen as $mob){
        if ($mob->time_regen < date('Y-m-d H:i:s')) {
            echo 'ydalili';
            $id = $mob->id;
            $delete = $mob->findOneByPK($id);
            $count = $location->findOneByPK($mob->locID);
            var_dump($count);
            $count->live_mobs++;
            $count->save();
            $delete->deleteID($id);
        }
    }
}

//echo '<pre>';
//$UserProv = 36;
//$resProv = 3;
//loot($UserProv,$resProv);
//function loot($UserProv,$resProv)
//{
//    $UsRes = new User_res();
//    $result = $UsRes->findManyByColumn('userID', $UserProv, 'resID', $resProv)[0];
//    $prefix = $result->id;
//    var_dump($prefix);
//    if (empty($result)) {
//        $UsRes->userID = $UserProv;
//        $UsRes->resID = $resProv;
//        $UsRes->count =  1;
//        $UsRes->save();
//        echo 'Создали новую запись первый раз для usera';
//    } else {
//
//        echo 'dobavili';
//    }
//}


////
////$mob = $loot->findOneByColumn('mobID',1);
////echo '<pre>';
//////var_dump($mob);
////$array = [];
////foreach ($mob as $col){
////    $take = $resource->findOneByPK($col->resID);
////    $col = (array)$col;
////    foreach ($col as $item){
////        $item['name']=$take->name;
////        $item['image']=$take->image;
//        array_push($array,$item);
//    }
//}
//var_dump($array);
//    $text = $userID;
//    $fp = fopen("file.txt", "w" );
//    fwrite($fp, $text);
//    fclose($fp);

//$text = 'flag:'.$_REQUEST['flag'].' location: '.$_REQUEST['location'].' mob: '.$_REQUEST['mobID'];
//$fp = fopen("file.txt", "w" );
//fwrite($fp, $text);
//fclose($fp);

