<?php
/**
 * Created by PhpStorm.
 * User: Anjana
 * Date: 11/2/2015
 * Time: 1:21 PM
 */

require_once 'core/init.php';?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>About | Us</title>
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

<?php
include "header.php";
?>
<div class="backgroundImg">
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="section-heading">Who are we?</h1>
                <p class="lead section-lead">The easiest way to make payments for UCSC.</p>
                <p class="section-paragraph">Easy-pay is an online payment system which is in partnership with Dialog Axiata PLC. We facilitate students to make payments to the University of Colombo School of Computing (UCSC) just by a click of a button! The 3 basic types of payments which Easy-pay facilitates are; </p>

                <ul>
                    <li>UCSC registration fee</li>
                    <li>Registration fee for a new academic year</li>
                    <li>Repeat examination fee</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<aside class="image-bg-fixed-height"></aside>

<!-- Content Section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--<h1 class="section-heading">Section Heading</h1> -->
                <h1 class="section-heading"> How to make a payment? </h1>
                <p class="lead section-lead">No more queues! Transaction within seconds!!</p>

                <p class="section-paragraph"> It's easy like never before! Any student who is going to be or is already an undergraduate of the UCSC can get registered with the Easy-pay system by creating a profile. All a registered student should have to make a payment is a Dialog eZ Cash account or a friend who has a Dialog eZ Cash account. </p>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--<h1 class="section-heading">Section Heading</h1> -->
                <h1 class="section-heading"> How to Register with eZ cash?</h1>
                <img src="images/ez.png"  class="img-responsive img-thumbnail"  alt="register with ez cash" style="width:608px;height:456px;">

            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section><br>
    <br>
</div>
<?php
    include "footer.php";
?>
    </body>
</html>