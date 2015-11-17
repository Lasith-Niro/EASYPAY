<?php
/**
 * Created by PhpStorm.
 * User: lasith
 * Date: 11/14/15
 * Time: 2:33 PM
 */
require_once 'core/init.php';
$user = new User();
if(!$user->isLoggedIn()){
    Redirect::to('index.php');
}
//check for admin
if ($user->hasPermission('admin')) {
    ?>

    <table class="table table-striped table-bordered table-hover " width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
        <?php
        //$user_id = $_SESSION['userid'];   // get usr id
        $notification = DB::getInstance()->getAll('SELECT *','user_notification','ASC');
        if(!$notification->count()){
            echo 'No notifications';
        }else{
        ?>
        <thead>
        <tr>
            <th>#</th>
            <th>User Name</th>
            <th>Notification</th>
            <th>Send Date and time</th>
            <th>Settings</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $counter = 0;
        $uIDArray= array();
        $nIDArray = array();

        foreach($notification->results() as $t){
//                                    print_r($t);
//                                    echo'<br>';

            $counter+=1;
            $tID = $t->uID;
            $tmp = new User();
            $tmp->find($tID);
            $name = $tmp->data()->username;
            $o=$t->nID;
            $not = new Notification();
            $not->find($o);
            $mess = $not->data()->detail;
            $mData = $t->send_date;
            $_SESSION['delID'] = $tID;
            $_SESSION['delnID'] = $o;
            $uIDArray[$counter-1] = $tID;
            $nIDArray[$counter-1] = $o;
            echo"<tr>";
            echo "<td width=6% align=center bgcolor=#E6E6E6>".$counter."</td>";
            echo "<td width=6% align=center bgcolor=#E6E6E6>".$name."</td>";
            echo "<td width=20% align=center bgcolor=#E6E6E6>".$mess."</td>";
            echo "<td width=5% align=center bgcolor=#E6E6E6>".$mData."</td>";
            echo "<td width=5% align=center bgcolor=#E6E6E6 data-color='red'><a href=notif_remove_me.php>Delete</a><BR>

        </td>";
            echo "</tr>";
        }
        }
        ?>
        </tbody>




    </table>
    </div>
    </div>
    </div>
<?php
} else {
    Redirect::to('index.php');
}