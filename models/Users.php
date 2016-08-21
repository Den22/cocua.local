<?php

namespace Application\Models;

use Application\Classes\DB;


class Users extends AbstractModel
{
    protected static $table = 'Users';
    const MEMBER ='Member';
    const ELDER ='Elder';
    const COLIDER ='Co Leader';

    public static function getHashtagPasswordList()
    {
        $db = new DB;
        $sql = '
        SELECT hashtag, password
        FROM ' . static::$table;
        return $db->queryArray($sql);
    }

    public static function convertBirthdayToAge($users)
    {
        $thisD = date('d');
        $thisM = date('m');
        $thisY = date('Y');
        foreach ($users as $user) {
            list($y, $m, $d) = explode("-", $user->birthday);
            $years = $thisY - $y - 1;
            if ($thisM > $m) {
                $years++;
            }
            if ($thisM == $m && $thisD >= $d) {
                $years++;
            }
            $user->years = $years;
        }
    }
}