<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 12.02.2018
 * Time: 12:20
 */

class session
{
    // sessioni klassi muutujad
    var $sid = false; //sessiooni id
    var $vars = array(); // sessiooni ajal tekkinud andmed
    var $http = false; // otseühendus $http objektiga
    var $db = false; // otseühendus $db objektiga

    var $timeout = 1800; // sessiooni pikkus -30 minutit
    var $anonymous = true; //kas on lubatud anonüümsuse kasutamine

    /**
     * session constructor.
     * @param bool $http
     * @param bool $db
     */
    public function __construct(&$http, &$db)
    {
        $this->http = &$http;
        $this->db = &$db;
    }

    // sessiooni loomine
    function createSession($user = false){
        // kui kasutaja on anonüümne
        if($user == false){
            // loome anonüümse kasutaja andmed
            $user = array(
                'user_id' => 0,
                'role_id' => 0,
                'username' => 'Anonüümne'
            );
        }
        // loome sessiooni id
        $sid = md5(uniqid(time().mt_rand(1, 1000), true));
        //päring sessiooni andmete sisestamiseks andmjebaasi
        $sql = 'INSERT INTO session SET'.
            'sid='.fixDB($sid).', '.
            'user_id='.fixDB($user['user_id']).', '.
            'user_data='.fixDB(serialize($user)).', '.
            'login_ip='.fixDB(REMOTE_ADDR).', '.
            'created=NOW()';
        // Saadame päring andmebaasi
        $this->db->query($sql);
        // määrame sessioonile loodud id
        $this->sid = $sid;
        // paneme antud väärtuse ka veebi andmete sisse
        $this->http->set('sid', $sid);
    }

    // sessiooni tabeli puhastamine vananenud sessioonidest
    function clearSessions(){
        $sql = 'DELETE FROM session WHERE '.
            time().'- UNIX_TIMESTAMP(changed) > '.
            $this->timeout;
        $this->db->query($sql);
    }


}