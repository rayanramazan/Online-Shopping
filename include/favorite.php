<?php
require "config.php";

if(isset($_POST['fav'])){
    $PostId = sec($_POST['PostId']);
    $UserId = sec($_POST['UserId']);

    $insert_data = "INSERT INTO `favorite`(`userid` , `postid`) VALUES('$UserId' , '$PostId')";
    $data_check = mysqli_query($db, $insert_data);
    if($data_check){
        $_SESSION['LikeSuccess'] = sec($lang['addfavorite']);
        header("Location: ../view.php?postID=".$PostId);
    }
}

if(isset($_POST['unfav'])){
    $PostId = sec($_POST['PostId']);
    $UserId = sec($_POST['UserId']);

    $delete_data = "DELETE FROM `favorite` WHERE `userid` = '$UserId' AND  `postid` = '$PostId'";
    $delete_check = mysqli_query($db, $delete_data);
    if($delete_check){
        $_SESSION['LikeSuccess'] = sec($lang['deletefavorite']);
        header("Location: ../view.php?postID=".$PostId);
    }
}

?>     