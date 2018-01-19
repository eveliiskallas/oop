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

    /**
     * template constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file; // määrame html vaade faili nimi
        $this->loadFile(); //laadime html vaade faili sisu
    }
    // template klassi meetodid
    // html vaade faili sisu lugemine
    function readFile($file){
//        $fp = fopen($f, 'rb');
//        $this->content = fread($fp, filesize($f));
//        fclose($fp);
        $this->content = file_get_contents($file);
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
        $file = $this->file; // abiasendus
        if(file_exists($file) and is_file($file) and is_readable($file)){
            //loeme sisu failist
            $this->readFile($file);
        }
        // kui html vaade faili nimi antakse kujul:
        // test.html
        $file = VIEWS_DIR.$this->file;
        if(file_exists($file) and is_file($file) and is_readable($file)){
            $this->readFile($file);
        }
        // kui html vaade faili nimi antakse kujul:
        // test
        $file = VIEWS_DIR.$this->file.'.html';
        if(file_exists($file) and is_file($file) and is_readable($file)) {
            //loeme sisu failist
            $this->readFile($file);
        }
        // kui html vaade faili nimi antakse kujul:
        // alamkaust.test - views/katsekaust/test.html
        $file = VIEWS_DIR.str_replace('.', '/', $this->file).'.html';
        if(file_exists($file) and is_file($file) and is_readable($file)) {
            //loeme sisu failist
            $this->readFile($file);
        }
        if($this->content === false){
            echo 'Ei suutnud lugeda faili '.$this->file.'<br />';
        }
    }

    // $this->vars massiivi täiendamine väärtuste paaritega
    // kujul 'malli elemendi nimi'=>'reaalne väärtus'
    function set($name, $value){
        $this->vars[$name] = $value;
    }

    // malli elementide asendamine reaalväärtustega
    // vastavalt elementide nimedele
    function parsel(){
        $str = $this->content; // sisu, mis ei ole veel asendatud
        foreach ($this->vars as $name=>$value){
            $str = str_replace('{'.$name.'}', $value, $str);
            echo $str;
        }
        return $str; // tagastame asendatud sisu
    }

}