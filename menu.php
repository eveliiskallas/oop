<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 23.01.2018
 * Time: 14:12
 */

// loome menüü ehitamiseks vajalikud objektid
$menuTmpl = new template('menu.menu'); // menüü mall
$itemTmpl = new template('menu.item'); // menüü elemendi mall

// loome üks menüü element nimega esimene
//määrame menüüs väljastava elemendi nime
$itemTmpl->set('name', 'esimene');
// määrata menüüs väljastava elemendiga seotud link
// http://ek.ikt.khk.ee/oop_vs17/index.php?control=esimene
$link = $http->getLink(array('control'=>'esimene'));
$itemTmpl->set('link', $link);
// lisame antud elemendi menüüsse
$menuItem = $itemTmpl->parsel(); // string, mis sisaldab ühe nimekirja elemendi lingiga
$menuTmpl->add('menu_items', $menuItem); // nüüd olemas paar 'menu_items'=>'<li>...</li>'

// loome veel ühe menüü element nimega esimene
$itemTmpl->set('name', 'teine');
// määrata menüüs väljastava elemendiga seotud link
// http://ek.ikt.khk.ee/oop_vs17/index.php?control=esimene
$link = $http->getLink(array('control'=>'teine'));
$itemTmpl->set('link', $link);
// lisame antud elemendi menüüsse
$menuItem = $itemTmpl->parsel(); // string, mis sisaldab ühe nimekirja elemendi lingiga
$menuTmpl->add('menu_items', $menuItem); // nüüd olemas paar 'menu_items'=>'<li>...</li>'



// ehitame valmis menüü
$menu = $menuTmpl->parsel();

// lisame valmis menüü lehele
$mainTmpl->set('menu', $menu);