<?php
/**
 * Created by PhpStorm.
 * User: lasith
 * Date: 11/16/15
 * Time: 11:32 PM
 */
require_once 'core/init.php';
$notificate = new Notification();
$delID = $_SESSION['delID'];
$delnID = $_SESSION['delnID'];
$notificate->disAllowUser($delID,$delnID);
Redirect::to('notif_remove_users.php');