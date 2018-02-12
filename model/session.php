<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 12.02.2018
 * Time: 12:20
 */

class session
{
    // sessioni klassi muutujad
    var $sid = false; //sessiooni id
    var $vars = array(); // sessiooni ajal tekkinud andmed
    var $http = false; // otseühendus $http objektiga
    var $db = false; // otseühendus $db objektiga

    /**
     * session constructor.
     * @param bool $http
     * @param bool $db
     */
    public function __construct(&$http, &$db)
    {
        $this->http = &$http;
        $this->db = &$db;
    }

    // sessiooni loomine


}