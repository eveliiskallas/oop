<?php
/**
 * Created by PhpStorm.
 * User: eveliis.kallas
 * Date: 12.02.2018
 * Time: 11:08
 */
//võtame kasutusele login.html faili
$loginForm = new template ('login');
//kasutaja andmete töötlusfaili link
$link = $http->getLink(array('control' =>'login_do'));
//lisame vajalikud andmed malli
$loginForm->set('link', $link);
$loginForm->set('kasutaja', 'Kasutaja nimi');
$loginForm->set('parool', 'Sisesta parool');
$loginForm->set('nupp', 'Logi sisse');
//nüüd tuleb see sisu väljastada peamalli sees
$mainTmpl->set('content', $loginForm->parse());