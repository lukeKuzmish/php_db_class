<?php

// database config
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USER', 'root');
define('DB_PASS', 'CHANGE ME');
define('DB_NAME', 'CHANGE ME');
define('TABLE1', 'CHANGE ME');

class DBConn {

    private $pdo = null;

    public function __construct() {

        $pdoString = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
        $this->pdo = new PDO($pdoString, DB_USER, DB_PASS);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

	public function getPDO() {
		return $this->pdo;
	}
    
    public function get($col) {
        $sql = "SELECT * FROM `" . TABLE1 . "` WHERE key1 = '{$col}'";
        //echo "sql is : $sql";
        $ss = $this->pdo->prepare($sql);
        $ss->execute();
        return $ss->fetchAll();
    }
    
    public function insert($val1, $val2) {
        $sql = "INSERT INTO `". TABLE1 . "` (key1, key2) VALUES ('{$val1}', '{$val2}'";
        $is = $this->pdo->prepare($sql);
        return $is->execute();
    }
    
    
    
} // class DBConn
