<?php
/**
 * Created by PhpStorm.
 * User: lasith-niro
 * Date: 18/10/15
 * Time: 14:25
 */
require_once 'core/init.php';
$user = new User();
$notif = new Notification();
if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}
$myID = $_SESSION['dID'];
//check for admin
if ($user->hasPermission('admin')) {
//code here
    if(Input::exists()){
        if(Token::check(Input::get('token'))) {
            $Syear = Input::get('Nyear');
            //print_r($Syear);
            foreach($Syear as $y){
                $dataSt = $notif->getBatch($y);
                foreach($dataSt as $d){
                    echo $d->id.'<br/>';
                    $notif->assignBatch(array(
                       'nID' => $myID,
                       'uID' => $d->id
                    ));
                }
            }
        }
    }
} else {
    Redirect::to('index.php');
}

?>
<form action="" method="post">

    <label for="text1">Send to<br></label>
        <UL type="DISC">
            <li>Year wise:</li>
                <UL type="NONE">
                    <li><input type="checkbox" name="Nyear[]" value="<? echo escape('1')?>" /> First Years <br></li>
                    <li><input type="checkbox" name="Nyear[]" value="<? echo escape('2')?>" /> Second Years <br></li>
                    <li><input type="checkbox" name="Nyear[]" value="<? echo escape('3')?>" /> Third Years <br></li>
                    <li><input type="checkbox" name="Nyear[]" value="<? echo escape('4')?>" /> Fourth Years <br></li>
                </UL>
            <hr>

            <li>Selected students: </li>

        </UL>

    <div>
        <input class="btn btn-default" type="submit" name="Submit" value="Submit" />
        <input type = "hidden" name="token" value="<?php echo Token::generate(); ?>">
    </div>
</form>