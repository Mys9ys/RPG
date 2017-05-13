var ajaxURL = "../../../public/json/AjaxJson.php";

$(document).ready(function() {
    regenAllMobs();
    $('#battleStart').click(function () {
        $('.mute').hide();
        $('.battleContainer').removeClass('hidden');
        // Изъятие моба с карты на время боя
        console.log('vz9tie moba:',$('.warrior2.id').text());
        mobTake($('#location').text(),$('.warrior2.id').text());

    })
    $('#retreat').click(function () {
        returnLocation(0);
    })
});

// Функция генерирующая случайное число
function random(min,max) {
    return Math.round(Math.random()*max+min);
}
// Функция генерирующая выпадение кубика с вращением
function cube(minW,maxW,minH,maxH,value) {
    return dobavka = '<div class="cube" style="top:'+random(minH,maxH)+'px; left: '+random(minW,maxW)+'px; transform: rotate('+random(-45,90)+'deg);">'+value+'</div>';
}
// функция запуска боя в соответствии с навыком - инициатива
function initiative(warrior1,warrior2) {
    console.log('warrior1: ', warrior1, 'warrior2:', warrior2);
    if (warrior1>warrior2){
        battle(1);
    }
    else if (warrior1<warrior2){
        battle(2);
    }
    else {
        battle(random(1,1));
    }
}

// непосредственно функция боя с рекурсией
function battle(value) {
    $('.tablecube div').remove(); // удаление старых кубиков перед ударом
    // определение атакующего и защищающегося с помощью конкатенации цифры к warrior
    if (value == 1) {
        var second =2;
    } else {
        second =1;
    }
    // инициация переменной суммарная атака значением характеристики атака
    var sumAtt = Number($('.warrior'+value+'.attack span').text());
    // запуск цикла на перебор количества кубиков
    for (i=0; i<$('.warrior'+value+'.cube_att span').text();i++){
        var shot = random(1,5);
        sumAtt+=shot;
        $('.warrior'+value+'.tablecube').css('background-color', 'firebrick');
        $('.warrior'+value+'.tablecube').append(cube(10+80*i,100,10,140,shot));
        console.log('max i:', i);
    }
   console.log('sumAtt', sumAtt);
    // инициация переменной суммарная защита значением характеристики защита
    var sumDef = Number($('.warrior'+second+'.defense span').text());

    for (i=0; i<$('.warrior'+second+'.cube_def span').text();i++){
        var shot = random(1,5);
        sumDef+=shot;
        $('.warrior'+second+'.tablecube').css('background-color', 'darkgreen');
        $('.warrior'+second+'.tablecube').append(cube(10+80*i,100,10,140,shot));
    }
    console.log('sumDef', sumDef);
    // работа с характеристикой жизни (НР) бойца
    var HP = Number($('.warrior'+second+'.HP').text());

    var hit = sumAtt - sumDef;
    if(hit<0) {hit = 0;}
    HP-= hit;

    var message = $('.logLarge p').remove().text();

    var liveMax = $('.warrior'+second+'.HP').attr('aria-valuemax');

    $('.warrior'+second+'.HP').attr('style', 'width: '+ progressbarLive(HP,liveMax)+'%;');

    $('.logLarge').append('<p id="animated">'+$('.warrior'+value+'.name').text()+' прорубил '+$('.warrior'+second+'.name').text()+' с силой '+hit+'</p>');
    $('.logSmall').append(message+' \n');

    // запись остатка жизни персонажа на страницу
    $('.warrior'+second+'.HP').text(HP);
    console.log('HP zawiwauwegos9',HP);

    // Проверка на окончание боя по параметру жизни(НР) если они закончились
    if (HP <= 0) {
        var message = $('.logLarge p').remove().text();
        $('.logLarge').append('<p id="animated">'+$('.warrior'+value+'.name').text()+' Победил</p>');
        $('.logSmall').append(message+' \n');
        battleResult(value,second);
    } else {
        setTimeout( function() {battle(second)}, 3000); // если жизнь осталась - переход хода с таймаутом 3с
    }
}

function battleResult(win,lose) {
    console.log('pobedil',$('.warrior'+win+'.category').text());
    // Победил игрок
    if ($('.warrior'+win+'.category').text()=='user'){
        var userID = $('.warrior'+win+'.id').text();
        var mobID = $('.warrior'+lose+'.id').text();
        var location = $('#location').text();
        console.log('mi v battleRsult', $('.warrior'+win+'.id').text());
        frag(userID,mobID);
        experience(userID,mobID);
        mobRegen(location,mobID);
        loot(userID,mobID);

        returnLocation(15000);
    // Победил моб
    } else {
        var mobID = $('.warrior'+win+'.id').text();
        var userID = $('.warrior'+lose+'.id').text();
        var location = $('#location').text();
        nofrag(userID);
        mobGive(location,mobID);
        returnLocation(15000);
    }

}

// функция зачета убийства моба в инфо персонажа
function frag(userID,mobID) {
    console.log('id usera', userID);
    $.ajax({
        url: ajaxURL,
        type: "POST",
        dataType: "json",
        data: {flag: '1', userID: userID, mobID: mobID }
    })
}
// функция изъятия моба с локации в начале боя
function mobTake(location,mob) {
    $.ajax({
        url: ajaxURL,
        type: "POST",
        dataType: "json",
        data: {flag: '2', mobID: mob, location: location },
        success: function(json){
            console.log('otvet po nali4iumoba',json);
            responseTake(json);
        }
    })
}
// обработка ответа от ajax запроса
function responseTake(json) {
    if (json == 1) {
        // передача в функцию параметров инициативы каждого бойца
        initiative($('.warrior1.initiative span').text(),$('.warrior2.initiative span').text());
    } else {
    console.log('Возможно моб уже в бою или успел убежать');
        returnLocation(15000);
    }
}

// функция возврата на локацию после окончания боя
function returnLocation(value) {
    // адресс перенаправления после боя
    var adress =  'http://'+window.location.hostname+'/location/'+$('#location').text();
    console.log(adress);
    // автоматическое перенаправление на предидущую локацию
    setTimeout( function() {location.replace(adress)}, value);
}
    //функция начисления опыта и количества боев
function experience(userID,mobID) {
    $.ajax({
        url: ajaxURL,
        type: "POST",
        dataType: "json",
        data: {flag: '3', userID: userID, mobID: mobID  }
    })
}
// функция выставления времени регенерации моба на локации
function mobRegen(location,mobID) {
    $.ajax({
        url: ajaxURL,
        type: "POST",
        dataType: "json",
        data: {flag: '4', location: location, mobID: mobID }
    })
}
// функция учитывающая поражение
function nofrag(userID) {
    console.log('id usera', userID);
    $.ajax({
        url: ajaxURL,
        type: "POST",
        dataType: "json",
        data: {flag: '5', userID: userID }
    })
}
// возврат моба на карту после поражения usera
function mobGive(location,mob) {
    $.ajax({
        url: ajaxURL,
        type: "POST",
        dataType: "json",
        data: {flag: '6', mobID: mob, location: location }
    })
}
// обсчет выпадения лута
function loot(userID,mobID) {
    $.ajax({
        url: ajaxURL,
        type: "POST",
        dataType: "json",
        data: {flag: '7', userID: userID, mobID: mobID },
        success: function(json){
            ajaxLoot(json);
        }
    })
}
// определение вероятности выпадения лута
function ajaxLoot(json) {
    $.each(json, function (index, value) {
        $.each(value, function (index, value) {
            if (random(1, 100) < json.loot[index]['chance']) {
                console.log('Вы получаете', json.loot[index]['name']);
                lootGive(json.loot[index]['resID'],$('.warrior1.id').text());
            } else {
                console.log('ни чего не выпало');
            }
        });
    })
}

function lootGive(resID,userID) {
    $.ajax({
        url: ajaxURL,
        type: "POST",
        dataType: "json",
        data: {flag: '8', resID: resID, userID: userID }
    })
}

function regenAllMobs() {
    $.ajax({
        url: ajaxURL,
        type: "POST",
        dataType: "json",
        data: {flag: '9'}
    })
}

function progressbarLive(count,maxlive) {
    return Math.round((count/maxlive)*100);
}

