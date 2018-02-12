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
define('LIB_DIR', 'lib/');

// lisame vaikimisi kontrolleri faili nimi
define('DEFAULT_CONTROL', 'default');

// nõuame abifunktsioonide olemasolu
require_once LIB_DIR.'utils.php';

// lisame rakendusel kasutatavad kasutajate rollid
define ('ROLE_NONE', 0);
define ('ROLE_USER', 1);
define ('ROLE_ADMIN', 2);


// nõuame vajalikkude failide olemasolu
require_once MODEL_DIR.'template.php'; //html vaade failide töötlus
require_once MODEL_DIR.'http.php'; // HTTP töötlus klass
require_once MODEL_DIR.'linkobject.php'; // Lingi töötluse klass

require_once MODEL_DIR.'mysql.php'; //DB Töötlus klass

// nõuame vajalikke konfiguratsioonide olemasolu
require_once 'db_conf.php';

// loome vajalikud objektid, mis on pidevalt töös
$http = new linkobject(); // http ja lingi objekt
// andmebaasi objekt
$db = new mysql(DB_HOST, DB_USER,   DB_PASS, DB_NAME);

