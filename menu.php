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

// koostame menüü ja sisu loomise päring
$sql = 'SELECT content_id, content, title '.
    'FROM content WHERE parent_id='.fixDB(0).
    ' AND show_in_menu='.fixDB(1);
$result = $db->getData($sql); // loeme andmed andmebaasist
// vaatame testkujul tulemus
echo '<pre>';
print_r($result);
echo '</pre>';


// loome  ühe menüü element nimega avaleht
$itemTmpl->set('name', 'avaleht');
// määrata menüüs väljastava elemendiga seotud link
// http://ek.ikt.khk.ee/oop_vs17/index.php?control=esimene
$link = $http->getLink(array('control'=>'avaleht'));
$itemTmpl->set('link', $link);
$menuTmpl->add('menu_items', $itemTmpl->parsel()); // nüüd olemas paar 'menu_items'=>'<li>...</li>'
// avalehe element on valmis

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