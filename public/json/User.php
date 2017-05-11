<?php

require_once 'AbstractModel.php';
/**
 * Created by PhpStorm.
 * User: Мусяус
 * Date: 03.05.2017
 * Time: 20:38
 */
class User extends AbstractModel
{
    protected static $table = 'u_features';

    function getClassName(){
        echo __CLASS__;
    }
}