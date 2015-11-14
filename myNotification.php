<?php
/**
 * Created by PhpStorm.
 * User: lasith
 * Date: 11/14/15
 * Time: 12:39 PM
 */
require_once 'core/init.php';
$user = new User();
$myNotification = new Notification();
if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}
$myID = $user->data()->id;
$notArray = $myNotification->outNotifications($myID);
foreach($notArray as $notif){
    //echo($notif->nID);
    $myNotificationID = $notif->nID;
    $obj = $myNotification->printNotification($myNotificationID);
    foreach($obj as $o){
        echo($o->detail.'<br/>');
    }
//    print_r($obj);
}

?>