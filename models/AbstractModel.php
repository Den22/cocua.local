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
        if (isset($this->data[$k])) {
            return $this->data[$k];
        }
        return null;
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
        return $db->queryClass($sql);
    }

    public static function findOneByPk($id)
    {
        $db = new DB();
        $db->className = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id = :id';
        $res = $db->queryClass($sql, [':id' => $id]);
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

    public function update()
    {
        $cols = array_keys($this->data);
        $data = [];
        $upt = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
            $upt[] = $col . '= :' . $col;
        }
        $sql = '
            UPDATE ' . static::$table . '
            SET
            ' . implode(', ', $upt) . '
            WHERE id = :id
        ';
        $data[':id'] = $this->id;
        $db = new DB();
        $db->execute($sql, $data);
    }

    public function delete()
    {
        $sql = '
            DELETE
            FROM ' . static::$table . '
            WHERE id = :id
        ';
        $db = new DB();
        $db->execute($sql, [':id' => $this->id]);
    }

    public function deleteByColumn($column, $value)
    {
        $sql = '
            DELETE
            FROM ' . static::$table . '
            WHERE ' . $column . ' = :value';
        $db = new DB();
        $db->execute($sql, [':value' => $value]);
    }

    public static function findByColumnClass($column, $value)
    {
        $db = new DB();
        $db->className = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :value';
        return $db->queryClass($sql, [':value' => $value]);
    }

    public static function findByColumnArray($column, $value)
    {
        $db = new DB();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' = :value';
        return $db->queryArray($sql, [':value' => $value]);
    }
}