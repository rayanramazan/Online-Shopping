
<?php
require "config.php";

        $postID =  $_SESSION['ID'];
        $userID = sec($_POST['userId']);
        $comment = sec($_POST['comment']);
        date_default_timezone_set('Asia/Baghdad');
        $date = date("Y-m-d h:i:sa");

        if(empty($comment)){
            exit("خانا کۆمێنتێ خالى نەهێلە");
        }
        $insert_data = "INSERT INTO `comment` (`postID`, `userID` ,`date`,`msg`) VALUES('$postID', '$userID' ,'$date','$comment')";
        $data_check = mysqli_query($db, $insert_data);
        if($data_check){
            $_SESSION['CommentSuccess'] = sec($lang['sendcomment']); 
            
        }else{
            exit(sec($lang['dataerror']));
        }
    

?>