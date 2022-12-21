<?php
require "config.php";
//if user signup button
if(isset($_POST['fullname'])){
    $fullname = sec($_POST['fullname']);
    $email = sec($_POST['email']);
    $password = sec($_POST['password']);
    date_default_timezone_set('Asia/Baghdad');
    $date = date("Y-m-d h:i:sa");
    if(empty($fullname) || empty($email) || empty($password)){
        exit(sec($lang['fillall']));
    }
    if(strlen($email) < 18){
        exit("please email ...");
    }
    if(!preg_match("/^[a-zA-Z ]*$/",$fullname)){
        exit(sec($lang['preg_match']));
    }
    if(strlen($fullname) > 20){
        exit(sec($lang['lengthfullname']));
    }
    if(strlen($fullname) < 10){
        exit(sec($lang['lengthlowfullname']));
    }
    if(strlen($password) < 8){
        exit(sec($lang['passmorethan']));
    }
    $email_check = "SELECT * FROM user WHERE email = '$email'";
    $res = mysqli_query($db, $email_check);
    if(mysqli_num_rows($res) > 0){
        exit(sec($lang['haveemail']));
    }
    
    $encpass = md5($password);
    $insert_data = "INSERT INTO `user` (`fullname`, `email`, `password` , `date`)
    values('$fullname','$email','$encpass' , '$date')";
    $data_check = mysqli_query($db, $insert_data);
    if($data_check){
        $_SESSION['PostSuccess'] = sec($lang['thankyou']); 
        exit("success");
    }else{
        exit(sec($lang['dataerror']));
    }
    }
    
?>