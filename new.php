<?php
include 'include/config.php';?>

<?php
    if(isset($_SESSION['CommentSuccess'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['CommentSuccess']; ?>",
    icon: "success",
    button: "باشە",
    });
    </script>
    <?php unset($_SESSION['CommentSuccess']); } ?>

		<div class="title-comment">
                    <?php 
                    $postID = $_SESSION['ID'];
                    $query = mysqli_query($db , "SELECT * FROM `comment` WHERE `postID` = '$postID' ORDER BY `id` DESC");
                    $row = mysqli_num_rows($query);?> 
                    <h1>کۆمێنت (<?php echo sec($row); ?>)</h1>
                </div>
                <div class="comments">
                    <?php
                       $postID = $_SESSION['ID'];
                       $query = mysqli_query($db , "SELECT * FROM `comment` WHERE `postID` = '$postID' ");
                       while($row = mysqli_fetch_assoc($query)){
                           $_SESSION['USERID'] = $row['userID'];
                           $USERID = $_SESSION['USERID'];
                            $nameUser = $_SESSION['userId'];
                            $query1 = mysqli_query($db , "SELECT * FROM `user` WHERE `id` = '$USERID'");
                            while($row1 = mysqli_fetch_assoc($query1)){?> 
                    <div class="comment">
                        <h2> <?php echo sec($row1['fullname']); ?> </h2>
                        <h5> <?php echo sec($row['date']); ?></h5>
                        <p><?php echo sec($row['msg']); ?></p>
                    </div>
                    <?php } } ?>
                </div>
	