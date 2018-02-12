<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 12.02.2018
 * Time: 11:22
 */
// küsime vormi poolt tulnud andmed
$username = $http->get('username');
$password = $http->get('password');
// koostame SQL päring kasutaja kontrollimiseks
$sql = 'SELECT * FROM user '.
    'WHERE username='.fixDB($username).
    'AND password='.fixDB(md5($password));
$result = $db->getData($sql);
echo '<pre>';
print_r($result);
echo '</pre>';