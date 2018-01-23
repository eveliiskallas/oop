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
$itemTmpl->set('name', 'esimene');
// lisame antud elemendi menüüsse
$menuItem = $itemTmpl->parsel(); // string, mis sisaldab ühe nimekirja elemendi lingiga
$menuTmpl->add('menu_items', $menuItem); // nüüd olemas paar 'menu_items'=>'<li>...</li>'

// loome veel ühe menüü element nimega esimene
$itemTmpl->set('name', 'teine');
// lisame antud elemendi menüüsse
$menuItem = $itemTmpl->parsel(); // string, mis sisaldab ühe nimekirja elemendi lingiga
$menuTmpl->add('menu_items', $menuItem); // nüüd olemas paar 'menu_items'=>'<li>...</li>'



// ehitame valmis menüü
$menu = $menuTmpl->parsel();

// lisame valmis menüü lehele
$mainTmpl->set('menu', $menu);