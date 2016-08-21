<?php

namespace Application\Classes;


class Files
{
    public static function uploadedFile($uploadDir)
    {
        $uploadFile = $uploadDir . basename($_FILES['file']['name']);
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
            $res = move_uploaded_file($_FILES['file']['tmp_name'], $uploadFile);
        } else {
            throw new \Exception('Неудачная загрузка файла');
        }
        if (!$res) {
            throw new \Exception('Неудачная передача файла');
        }
        return $res;
    }

    public static function AddAvatar()
    {
        $uploadDir = dirname(__DIR__) . DIRSEP . 'img' . DIRSEP . 'avatars' . DIRSEP;
        $res = self::uploadedFile($uploadDir);
        return $res;
    }

    public static function AddPlan()
    {
        $uploadDir = dirname(__DIR__) . DIRSEP . 'img' . DIRSEP . 'plans' . DIRSEP;
        $res = self::uploadedFile($uploadDir);
        return $res;
    }

}