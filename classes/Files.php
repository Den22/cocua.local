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

    public static function AddImage($dir)
    {
        $uploadDir = dirname(__DIR__) . DIRSEP . 'img' . DIRSEP . $dir . DIRSEP;
        $res = self::uploadedFile($uploadDir);
        return $res;
    }

}