<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 31.01.2018
 * Time: 11:00
 */
$page_id = (int)$http->get('page_id'); // lehe id
// koostame päringu contenti jaoks
$sql = 'SELECT * FROM content '.
    'WHERE content_id='.fixDB($page_id);
// küsime andmed andmebaasist
$result = $db->getData($sql);
if($result == false){
    $sql = 'SELECT * FROM content '.
        'WHERE is_first_page='.fixDB(1);
    $result = $db->getData($sql);
}
if($result != false){
    $page = $result[0];
    $http->set('page_id', $page['content_id']);
    $mainTmpl->set('content', $page['content']);
}