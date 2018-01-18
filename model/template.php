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
    // html vaade faili kontrollimine
    // ja kasutamisele võtmine
    function loadFile(){
        // kontrollime html vaadete kausta olemasolu
        if(!is_dir(VIEWS_DIR)){
            echo 'Kataloogi '.VIEWS_DIR.' ei ole leitud <br /´>';
            exit;
        }
        // kui html vaade faili nimi antakse kujul:
        // views/test.html
        $f = $this->file; // abiasendus
        if(file_exists($f) and is_file($f) and is_readable($f)){
            //loeme sisu failist
            $this->readFile($f);
        }
        // kui html vaade faili nimi antakse kujul:
        // test.html
        $f = VIEWS_DIR.$this->file;
        if(file_exists($f) and is_file($f) and is_readable($f)){
            $this->readFile($f);
        }
        // kui html vaade faili nimi antakse kujul:
        // test
        $f = VIEWS_DIR.$this->file.'.html';
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            //loeme sisu failist
            $this->readFile($f);
        }
        // kui html vaade faili nimi antakse kujul:
        // alamkaust.test - views/katsekaust/test.html
        $f = VIEWS_DIR.str_replace('.', '/', $this->file).'.html';
        if(file_exists($f) and is_file($f) and is_readable($f)) {
            //loeme sisu failist
            $this->readFile($f);
        }
        if($this->content === false){
            echo 'Ei suutnud lugeda faili '.$this->file.'<br />';
        }
    }
}