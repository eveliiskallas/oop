<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 18.01.2018
 * Time: 10:21
 */

class template
{
    // template objekti/klassi omadused
    var $file = ''; //html vaade faili nimi
    //html vaade faili sisu, mis on klassis
    //vastava funktsiooni abil loetud
    var $content = false;
    // reaalsed väärtused html vaade šablooni täitmiseks
    var $vars = array();
    // template klassi meetodid
    // html vaade faili sisu lugemine
    function readFile($f){
//        $fp = fopen($f, 'rb');
//        $this->content = fread($fp, filesize($f));
//        fclose($fp);
        $this->content = file_get_contents($f);
    }
}