<?php

namespace Application\Models;

use Application\Classes\DB;


class Users extends AbstractModel
{
    protected static $table = 'Users';

    public static function getHashtagPasswordList()
    {
        $db = new DB;
        $sql = '
        SELECT hashtag, password
        FROM ' . static::$table
        ;
        return $db->queryArray($sql);
    }

    public static function convertToYears($users)
    {
        $thisD=date('d');   $thisM=date('m');   $thisY=date('Y');
        foreach ($users as $user) {
            list($y,$m,$d)=explode("-", $user->birthday);
            $years=$thisY-$y-1;
            if($thisM>$m)$years++;
            if($thisM==$m and $thisD>=$d )$years++;
            $user->years = $years;
        }
    }
}