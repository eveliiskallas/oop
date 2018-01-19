<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 19.01.2018
 * Time: 14:17
 */
// nõuame konfiguratsiooni faili
require_once 'conf.php';

$mainTmpl = new template('main');

// väljastame objekti sisu test kujul
echo'<pre>';
print_r($mainTmpl);
echo'</pre>';