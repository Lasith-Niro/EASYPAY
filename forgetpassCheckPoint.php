<?php
/**
 * Created by PhpStorm.
 * User: Shanika-Edirisinghe
 * Date: 12/08/15
 * Time: 14:10
 */
require_once 'core/init.php';
require 'SMS/sms.php';
require 'Files/accessFile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <header></header>
    <title>Login | page</title>
    <!--    <link rel="stylesheet" href=--><?php //echo $temp_var?><!-- >-->
    <!--    <link href="home/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="css/customCss.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</head>
<body>
<div>
    <?php
    include "header.php";
    ?>
</div>
<div class="container backgroundImg">
    <br>
    <div class="jumbotron col-lg-6 col-lg-offset-3">
<?php

$user = new User();
$notification = new smsNotification();
$file = new accessFile();
$randomValue = rand(1000, 9999);
$detailArray = $file->read('Files/RouterPhone');
$messageArray = $file->read_newLine('Files/messages');
$pNum = $_SESSION['phone'];
$to = '94'.substr($pNum,1,9);
$id = $_SESSION['id'];
$flag = $_SESSION['flag'];
if($flag === 1) {
    $notification->send($detailArray[0], $to, $messageArray[2] . " " . $randomValue, $detailArray[1]);
    $_SESSION['flag'] = 0;
}



$hiddenValue = Input::get('storeRandVal');

//echo $randomValue;

if(Input::exists()){
    if(Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'rand_number' => array(
                'required' => true,
                'min' => 4,
                'max' => 4,
            )
        ));
        if($validation->passed()){
            $input = htmlspecialchars(trim(Input::get('rand_number')));
            if($input == $hiddenValue){
                //Session::flash('home', 'Your code is correct.');
                Redirect::to('forgetpassCheckPoint2.php');
            } elseif ($randomValue != $hiddenValue) {
                Session::flash('home', 'you enter wrong key code.');
                Redirect::to('index.php');
            }
        } else {
            foreach ($validation->errors() as $error) {
                echo $error . '<br />';
            }
        }
    }
}
?>


        <form action="" method="post">
            <div class="field">
                <div class='alert alert-info'>Your phone number is *******<?php echo substr($pNum,7 , 9); ?></div>
            </div>

            <div class="field">
                <label>Enter your verification </label>
                <div class="gap">
                    <input class="form-control" type="number" name="rand_number" id="rand_number">
                </div>


            </div>

            <input type="hidden" name="storeRandVal" value="<?php echo $randomValue; ?>">
            <input class="btn btn-default" type="submit" value="Change">
            <input type="hidden" name="token" value="<?php echo Token::generate(); ?>">

        </form>
    </div>
</div>
<?php
include "footer.php";
?>

</body>
</html>