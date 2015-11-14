<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/9/2015
 * Time: 9:01 PM

 */

require_once 'core/init.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Demo</title>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
</head>
<body>

<form action='' method='post'>
    Username: <input type='text' id="u" name='username' onkeypress="auto('u','search.php');" value="<?php Input::get('username')?>" class='auto'>
</form>

</body>
</html>