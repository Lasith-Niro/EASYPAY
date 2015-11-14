<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/20/2015
 * Time: 5:08 PM
 */
require_once 'core/init.php';



?>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
    <script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript">


    </script>

</head>
<body>
<div>
    <div>
        <input type="text" id="search" placeholder="Enter username to search" autocomplete="off" name="search" onkeyup="autoSuggest('res','search.php');"  />
    </div>
    <div id="res">

    </div>
</div>


</body>
</html>