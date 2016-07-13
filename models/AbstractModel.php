<?php

namespace Application\Models;

use Application\Classes\DB;


abstract class AbstractModel
{
    protected static $table;
    public $data = [];
    public $id;

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function __isset($k)
    {
        return isset($this->data[$k]);
    }

    public static function findAll()
    {
        $db = new DB();
        $db->className = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $db = new DB();
        $db->className = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        $res = $db->query($sql, [':id' => $id]);
        return array_pop($res);
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }
        $sql = '
            INSERT INTO ' . static::$table . '
            (' . implode(', ', $cols) . ')
            VALUES
            (' . implode(', ', array_keys($data)) . ')
        ';
        $db = new DB();
        $db->execute($sql, $data);
        $this->id = $db->dbh->lastInsertId();
    }

    public static function findByColumn($column, $value)
    {
        $db = new DB();
        $db->className = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :value';
        return $db->query($sql, [':value' => $value]);
    }

}