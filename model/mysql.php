<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 2.02.2018
 * Time: 8:57
 */

class mysql
{
    // klassi väljad
    var $conn = false; // ühendus db serveriga
    var $host = false; //db server
    var $user = false; // db server kasutaja
    var $pass = false; // db server kasutaja parool
    var $dbname = false;

    /**
     * mysql constructor.
     * @param bool $host
     * @param bool $user
     * @param bool $pass
     * @param bool $dbname
     */
    public function __construct($host, $user, $pass, $dbname)
    {
        // määrame parameetrite kaudu kõik vajalikud väärtused
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->connect(); // tekitame ühenduse andmebaasiga
    }
    // andmebaasiga ühenduse loomine

    function connect(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->conn){
            echo 'Probleem andmebaasi ühendusega<br />';
            exit;
        }
    }

}