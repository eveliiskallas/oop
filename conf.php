<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 18.01.2018
 * Time: 9:35
 */
// konfiguratsiooni fail

// loome vajalikud abikonstandid
define('MODEL_DIR', 'model/');
define('VIEWS_DIR', 'views/');
define('CONTROL_DIR', 'controllers/');

// nõuame vajalikkude failide olemasolu
require_once MODEL_DIR.'template.php'; //html vaade failide töötlus