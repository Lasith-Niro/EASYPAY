<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/14/2015
 * Time: 8:13 PM
 */

require_once 'core/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | Dashboard</title>
    <link href="css/customCss.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="js/functions.js"></script>
    <!--    dropdown menu styles-->
<!--    <style>-->
<!--        #res{-->
<!--            cursor:pointer;-->
<!--            height:150px;-->
<!--            overflow-y:scroll;-->
<!--        }-->
<!--    </style>-->
</head>
<body>
<div id="wrapper">
    <?php
    include "header.php";
    ?>
</div>
<div class="backgroundImg">
    <?php
    include "adminSidebar.php";
    ?>
    <div class="container ">
        <br>

<?php

$user = new user();
if(Input::exists()) {
    $searchUser = Input::get('search');
    $tdb = DB::getInstance();
    $tdb->get('users',array('username','=',$searchUser));
    if(!$tdb->count()){
//        echo 'no user';
        $msg = "No Match Found";
    }else {
//            print_r($tdb->results());
        foreach($tdb->results()as $res){
            echo $user->data()->username;
            if($user->data()->username!=$res->username){
//                   echo $res->username.'<br>';
                echo "<a href='admin_searchUserResults.php?searchUser=$res->username'>$res->username</a>";
                echo "<br>";
            }else{
                echo $res->username.': This is your username<br>';
            }
        }
    }
}


?>

    <div class="jumbotron col-lg-6 col-lg-offset-1">
        <form action="" method="post">
            <div class="col-lg-6">
                <input class="form-control" type="text" id="search" placeholder="Enter username to search" autocomplete="off" name="search" value="<?php echo Input::get('search')?>" onkeyup="autoSuggest('res','search.php');"  />
            </div>
            <input class="btn btn-default" type="submit" value="Search">
            <div class="col-lg-6">
                <?php
                if(isset($msg)){
                    echo "<div class='alert alert-danger'>$msg</div>";
                }
                ?>
            </div>

        </form>

        <div id="res" class="col-lg-8 gap">

        </div>
    </div>
</div>
</div>
<?php
include "footer.php";
?>

</body>
</html>