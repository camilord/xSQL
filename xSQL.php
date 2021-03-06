<?php
/**
 * Created by PhpStorm.
 * Author: Camilo Lozano III
 * Email: camilo3rd@gmail.com
 * Date: 21/08/14
 * Time: 4:06 PM
 */

class xSQL {

    protected $_db;
    protected $_statement;

    public function __construct($params = null) {
        if (!is_null($params)) {
            $this->connect($params);
        }
    }

    /**
     * @param $params
     */
    public function connect($params) {
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $database = 'test';
        $charset = 'utf8';
        $driver = 'mysql';

        if (is_array($params) && count($params) > 0) {
            foreach ($params as $key => $val) {
                ${$key} = $val;
            }
        }

        $this->_db = new PDO($driver.':host='.$host.';dbname='.$database.';charset='.$charset, $username, $password);
        if (!$this->_db) {
            echo "\n\n".'Unable to connect to the Database!'."\n\n";
            die();
        }
    }

    /**
     * @param $statement
     * @param $params
     * @return mixed
     */
    public function query($statement, $params) {
        //return $this->_statement = $this->_db->query($statement, $params);
        $this->_statement = $this->_db->prepare($statement);
        return $this->_statement->execute($params);
    }

    /**
     * get number of rows from the query
     * @return mixed
     */
    public function num_rows() {
        return $this->_statement->rowCount();
    }

    /**
     * fetch mixed associative array and numeric array
     * @return mixed
     */
    public function fetch() {
        return $this->_statement->fetch();
    }

    /**
     * get associative array
     * @return mixed
     */
    public function fetch_assoc() {
        return $this->_statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * fetch all mixed associative array and numeric array
     * @return mixed
     */
    public function fetch_all() {
        return $this->_statement->fetchAll();
    }

    /**
     * fetch all mixed associative array
     * @return mixed
     */
    public function fetch_all_assoc() {
        return $this->_statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * insert a row to the table
     * @param $statement
     * @param $params
     * @return mixed
     */
    public function insert($statement, $params) {
        return $this->query($statement, $params);
    }

    /**
     * update row to a table
     * @param $statement
     * @param $params
     * @return mixed
     */
    public function update($statement, $params) {
        return $this->query($statement, $params);
    }

    /**
     * get last mysql id
     * @return mixed
     */
    public function last_id() {
        return $this->_db->lastInsertId();
    }
} 