<?php
/**
 * Created by PhpStorm.
 * User: Den
 * Date: 09.07.2016
 * Time: 14:49
 */

namespace Application\Classes;


class DB
{
    public $dbh;
    public $className = 'stdClass';

    public function __construct() {
        global $config;
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
        ];
        $dsn = 'mysql:dbname=' . $config['db']['dbname'] . ';host=' . $config['db']['host'];
        $this->dbh = new \PDO ($dsn, $config['db']['login'], $config['db']['password'], $opt);
    }

    public function query($sql, $params = []) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = []) {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
}