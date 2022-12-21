<?php
$error = "";
if(isset($_POST['login'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    if (empty($email) || empty($password)){
        $error = sec($lang['emptyemailpassword']);
    }
    $password = md5($password);
    $check_email = "SELECT * FROM `user` WHERE `email` = '$email' AND `password` = '$password'";
    $res = mysqli_query($db, $check_email);
    $count = mysqli_num_rows($res);
    if($count == 1){
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if($password == $fetch_pass){
            $_SESSION["userid"] = $fetch["id"];
            $_SESSION["userLogin"] = "login";
            header('Location: index.php');
            
        }else{
            $error = sec($lang['passemailwrong']);
        }
    }else{
        $error  = sec($lang['passemailwrong']);
    }
}
?>