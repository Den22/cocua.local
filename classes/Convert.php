<?php

namespace Application\classes;


class Convert
{
    public static function birthdayToAge($users)
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

    public static function linkToIframe($link) {
        $url = parse_url($link);
        return substr($url['query'], 2, 20);
    }
}