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
// kutsume tegevuste/kontrollerite halduse tööle
require_once 'control.php';
// reaalväärtuste määramine
$mainTmpl->set('site_lang', 'et');
$mainTmpl->set('site_title', 'PV');
$mainTmpl->set('user', 'Kasutaja');
$mainTmpl->set('title', 'Pealkiri');
$mainTmpl->set('lang bar', 'Keeleriba');
// lisame menüü failist
require_once 'menu.php';

// väljastame sisuga täidetud mall
echo $mainTmpl->parsel();
// kontrollime $http objekti
echo '<pre>';
print_r($http->vars);
echo '</pre>';
// kontrollime $db objekti tööd
$db->query('SELECT NOW()');
echo '<pre>';
print_r($db);
echo '</pre>';