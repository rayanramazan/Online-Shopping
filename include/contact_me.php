<?php
require "config.php";
        $name = sec($_POST['name']);
        $email = sec($_POST['email']);
        $subject = sec($_POST['subject']);
        $msg = sec($_POST['discription']);
        date_default_timezone_set('Asia/Baghdad');
        $date = date("Y-m-d h:i:sa");

        if(strlen($name) > 80)
            exit($lang['namelenghtcontatc']);         
        else if(strlen($subject) > 80)
            exit($lang['subjectlenghtcontact']);
        else if(empty($name) || empty($email) || empty($subject) || empty($msg)){
            exit($lang['emptycontact']);
        }
        $insert_data = "INSERT INTO `contact` (`name`, `email`, `subject` , `msg` , `date`)
        values('$name','$email','$subject','$msg' , '$date')";
        $data_check = mysqli_query($db, $insert_data);
        if($data_check){
            $_SESSION['PostSuccess'] = sec($lang['contactmsg']);
            exit("success");
        }else{
            exit("ببورە , زانیاریێن تە شاشیا ناڤدا");
        }
?>     