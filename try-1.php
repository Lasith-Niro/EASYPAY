<?php
/**
 * Created by PhpStorm.
 * User: lasith
 * Date: 11/15/15
 * Time: 11:38 AM
 */

if ($user->hasPermission('admin')) {
    if(Token::check(Input::get('token'))) {
        if(Token::check(Input::get('token_batch'))) {
            if(Input::exists()){
                //validations here
                if (!empty($_POST['Submit-batch'])) {
                    //do something here;
                    $Syear = Input::get('Nyear');
                    //print_r($Syear);
                    foreach($Syear as $y){
                        $dataSt = $notif->getBatch($y);
                        //print_r($Syear);
                        foreach($dataSt as $d){
                            $userid = $d->id;
                            //echo $d->id.'<br/>';
//                    if($notif->checkWithUser($d->id, $myNotifyID)){
//                        $notif->assignBatch(array(
//                           'nID' => $myNotifyID,
//                           'uID' => $d->id
//                        ));
//                        continue;
//                    } else {
//                        $tmpUser = new User();
//                        $tmpUser->find($d->id);
//                        echo "This notification has been already send to " . $tmpUser->data()->username . "<br />";
//                    }
                            $notif->sendNotification($notif,$userid,$myNotifyID);
                        }
                    }
                }
            }
        }
    }
} else {
    Redirect::to('index.php');
}

if ($user->hasPermission('admin')) {
//code here
    if(Input::exists()){
        if(Token::check(Input::get('token_repeat-all'))) {
            //code here
        }
    }
} else {
    Redirect::to('index.php');
}

if ($user->hasPermission('admin')) {
//code here
    if(Input::exists()){
        if(Token::check(Input::get('token_selected_student'))) {
            //code here
        }
    }
} else {
    Redirect::to('index.php');
}
