<?php
/**
 * Created by PhpStorm.
 * User: lasith
 * Date: 11/15/15
 * Time: 1:54 AM
 */

require_once 'core/init.php';
$user = new User();
$notif = new Notification();

if(isset($_POST['searchVal'])){
    $searchUser = $_POST['searchVal'];
    $userDet = DB::getInstance();
    if($searchUser!=null){
        $userDet->get('users',array('username','LIKE',"%$searchUser%"));
    }
    if(!$userDet->count()){
        $output = 'No match found<br>';
        echo $output;
    }else{
        foreach($userDet->results() as $res){
            $output = $res->username;
            $return = $res->id;
//            echo "$output<br>";
            echo "<li><a href='notif_assign_users.php?user=$return'>$output</a></li>";
//            return $output;
        }
    }

}