<?php
/**
 * Created by PhpStorm.
 * User: lahiru
 * Date: 10/11/2015
 * Time: 9:45 PM
 */

require_once 'core/init.php';
require_once 'browser/browserconnect.php';

$user = new User();
$tra = new Transaction();

if(!$user->isLoggedIn()) {
    Redirect::to('index.php');
}

$prefix = 'easyID_';
$lastID = (integer)$tra->lastID();
$newID = $lastID + 1;
$transactionID = $tra->encodeEasyID($prefix, $newID);
echo $transactionID . '<br />';
$_SESSION['tId'] = $transactionID;

$date1 = strtotime('2015-12-19');
$today = time();
$dayLimit = $date1-$today;
$dayLimit = floor($dayLimit/(60*60*24));
echo "You have {$dayLimit} days for this payment." . '<br /> <br /> <br />';

$uID = $user->data()->id;
$uRegID = $user->data()->regNumber;

if(!$uRegID){
    echo "You have not submitted your registration number." . '<br />';
} else {
    echo "Your registration number is " . $uRegID . '<br />';
}
echo "You have to pay Rs.25 per paper." . '<br /> <br /> <br />';

$de_transactionID = $tra->decodeEasyID($transactionID);



/////////////////////////// getting form details////////////////////
$semester   = Input::get('examSem');
$index      = Input::get('indexNo');
$init_name  = Input::get('initName');
$full_name  = Input::get('fullName');
$mobilePhone = Input::get('mobileNo');
$fixedPhone = Input::get('fixedNo');
$subCode = Input::get('subjectCode');
$subName = Input::get('subjectName');
$assignmentComplete = Input::get('assignmentCom');
$gradeFirst = Input::get('l1Grade');
$gradeSecond= Input::get('l2Grade');
$gradeThird = Input::get('l3Grade');

////////////////////
//echo "$semester<br>$index<br>$init_name<br>$full_name<br>$mobilePhone<br>$fixedPhone<br>";

////////////////////// creating a associative array for each subject//////////////////
$numForms = count($subCode);
for($i = 0;$i<$numForms;$i++){
    $j = $i+1;
    ${"subject$j"} = array(
        'subjectCode'=>$subCode[$i],
        'subjectName'=>$subName[$i],
        'assignmentCom'=>$assignmentComplete[$i],
        'gradeFirst'=>$gradeFirst[$i],
        'gradeSecond'=>$gradeSecond[$i],
        'gradeThird'=>$gradeThird[$i]
    );
}

//////printing subject array///
//for($i=0;$i<$numForms;$i++){
//    $j=$i+1;
//    print_r(${"subject$j"});
//    echo "<br>";
//}

///////////////////////// creating transaction array and insert data////////////////

if(Token::check(Input::get('token'))){
    for($i = 0;$i<$numForms;$i++){
        $j=$i+1;
        $tra->createRepeatExam(array(
            'transactionID'=> $de_transactionID,
            'Year' => $user->data()->year,
            'Semester' => $semester,
            'subjectCode' => ${"subject$j"}['subjectCode'],
            'indexNumber' => $index,
            'nameWithInitials' => $init_name,
            'fullName' => $full_name,
            'fixedPhone' => $fixedPhone,
            'subjectName' => ${"subject$j"}['subjectName'],
            'AssignmentComplete' => ${"subject$j"}['assignmentCom'],
            'gradeFirst' => ${"subject$j"}['gradeFirst'],
            'gradeSecond' => ${"subject$j"}['gradeSecond'],
            'gradeThird' => ${"subject$j"}['gradeThird'],
            'status' => 0
        ));
    }
    Redirect::to('p_repeatExam.php');
} else {
    foreach ($validation->errors() as $error) {
        echo $error, '</ br>';
    }
}






//
//
//
//
//    if(Token::check(Input::get('token'))) {
//        $semester   = Input::get('examSem');
//        $index      = Input::get('indexNo');
//        $init_name  = Input::get('initName');
//        $full_name  = Input::get('fullName');
//        $fixedPhone = Input::get('fixedNo');
//        $subCode    = Input::get('subjectCode');
//        $subName    = Input::get('subjectName');
//        $assignmentComplete = Input::get('assignmentCom');
//        $gradeFirst = Input::get('l1Grade');
//        $gradeSecond= Input::get('l2Grade');
//        $gradeThird = Input::get('l3Grade');
//
//        $tra->createRepeatExam(array(
//            'transactionID'=> $de_transactionID,
//            'Year' => $user->data()->year,
//            'Semester' => $semester,
//            'subjectCode' => $subCode,
//            'indexNumber' => $index,
//            'nameWithInitials' => $init_name,
//            'fullName' => $full_name,
//            'fixedPhone' => $fixedPhone,
//            'subjectName' => $subName,
//            'AssignmentComplete' => $assignmentComplete,
//            'gradeFirst' => $gradeFirst,
//            'gradeSecond' => $gradeSecond,
//            'gradeThird' => $gradeThird,
//            'status' => 0
//        ));
//        Redirect::to('p_repeatExam.php');
//    } else {
//        foreach ($validation->errors() as $error) {
//            echo $error, '</ br>';
//        }
//    }
