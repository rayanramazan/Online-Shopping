<?php 
include'include/nav.php';
include'include/modalUploadPost.php';

?>



<?php
    if(isset($_SESSION['PostSuccess'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['PostSuccess']; ?>",
    icon: "success",
    button: "باشە",
    });

    </script>
    <?php unset($_SESSION['PostSuccess']); } ?>

    <?php
    if(isset($_SESSION['LikeSuccess'])){?>
    <script>
    swal({
    title: "<?php echo $_SESSION['LikeSuccess']; ?>",
    icon: "success",
    button: "باشە",
    });
    </script>
    <?php unset($_SESSION['LikeSuccess']); } ?>
<div class="view-box">
        <div class="images">
            
<?php 

$postID = sec($_GET['postID']);

$query = mysqli_query($db , "SELECT * FROM `product` WHERE `id` = '$postID'");
while($row = mysqli_fetch_assoc($query)){

    $views = sec($row['view']) + 1;
    $count = "UPDATE `product` set `view` = '$views' where `id` = '$postID'";
    $query_count = mysqli_query($db , $count);

    $_SESSION['userId'] = $row['userID'];
    $_SESSION['ID'] = $row['id'];

    $image_1 = sec($row['image_1']);
    $image_2 = sec($row['image_2']);
    $image_3 = sec($row['image_3']);
    $image_4 = sec($row['image_4']);
    $image_5 = sec($row['image_5']);
    ?>
    <input type="text" id="postid" value="<?php echo sec($row['id']); ?>" hidden>
    <style>
        .active{
            display: block;
        }
    </style>
    

            <div class="image">
            <?php
    if(empty($image_1)){

    }else{?>
<img src="assets/post/<?php echo $image_1 ?>" class='img-slide' alt=''>
    <?php }

if(empty($image_2)){

}else{?>
<img src="assets/post/<?php echo $image_2 ?>" class='img-slide' alt=''>
<?php }

if(empty($image_3)){

}else{?>
<img src="assets/post/<?php echo $image_3 ?>" class='img-slide' alt=''>
<?php }

if(empty($image_4)){

}else{?>
<img src="assets/post/<?php echo $image_4 ?>" class='img-slide' alt=''>
<?php }

if(empty($image_5)){

}else{?>
<img src="assets/post/<?php echo $image_5 ?>" class='img-slide' alt=''>
<?php }
    ?>
            </div>
 
            <div onclick="side_slide(-1)" class="slide left">
                <span class="fas fa-angle-left"></span>
            </div>
            <div onclick="side_slide(1)" class="slide right">
                <span class="fas fa-angle-right"></span>
            </div>
            <div class="btn-sliders">
            <?php
    if(empty($image_1)){

    }else{?>
        <span onclick="btm_slide(1)"></span>
    <?php }

if(empty($image_2)){

}else{?>
<span onclick="btm_slide(2)"></span>
<?php }

if(empty($image_3)){

}else{?>
<span onclick="btm_slide(3)"></span>
<?php }

if(empty($image_4)){

}else{?>
<span onclick="btm_slide(4)"></span>
<?php }

if(empty($image_5)){

}else{?>
<span onclick="btm_slide(5)"></span>
<?php }
    ?>
            
            </div>
        </div>
        <script>
            var indexValue = 1;
            showImg(indexValue);
            function btm_slide(e){showImg(indexValue = e);}
            function side_slide(e){showImg(indexValue += e);}
            function showImg(e){
                var i;
                const img = document.querySelectorAll(".img-slide");
                const sliders = document.querySelectorAll(".btn-sliders span");
                if(e > img.length){indexValue = 1}
                if(e < 1){indexValue = img.length}
                for(i = 0 ; i < img.length; i++){
                    img[i].style.display = "none";
                }
                for(i = 0 ; i < sliders.length; i++){
                    sliders[i].style.background = "#F0B643";
                }
                img[indexValue-1].style.display = "block";
                sliders[indexValue-1].style.background = "white";
            }
        </script>
            <div class="title">
                <h1 class="price">
                $<?php echo sec($row['price']); ?>
                </h1>
                <h1>
                <?php echo sec($row['name']); ?>
                </h1>
            </div>
            <hr class="line-view">
            <div class="description">
                <h3>دەربارەى</h3>
                <p><?php echo sec($row['description']); ?> </p>
            </div>
            <hr class="line-view">
            <ul class="info-product">
                <li><?php echo sec($row['location']); ?> <i class="fas fa-location-circle"></i></li>
                <li><?php echo sec($row['date']); ?> <i class="fas fa-calendar-day"></i></li>
                <li><?php echo sec($row['view']); ?> بینەر <i class="fas fa-eye"></i></li>
                <li> <?php echo sec($row['n_phone']); ?>  <i class="fas fa-phone"></i> </li>
                <?php 
                    $nameUser = $_SESSION['userId'];
                    $query = mysqli_query($db , "SELECT * FROM `user` WHERE `id` = '$nameUser'");
                    while($row = mysqli_fetch_assoc($query)){?>
                <li><?php echo sec($row['fullname']); ?> <i class="fas fa-user-tie"></i></li>
                <?php } ?>
            </ul>
            <?php } ?>
            <hr class="line-view">
            <div class="box-comment">
                <div class="showcomm" id="showcom" style="width: 100%;">
                <div class="title-comment">
                    <?php 
                    $postID = $_SESSION['ID'];
                    $query = mysqli_query($db , "SELECT * FROM `comment` WHERE `postID` = '$postID' ORDER BY `id` DESC");
                    $row = mysqli_num_rows($query);?> 
                    <h1>کۆمێنت (<?php echo sec($row); ?>)</h1>
                    <input type="text" name="PostId" class="PostId" value="<?php echo sec($postID);?>" hidden>
                </div>

                <div class="comments">
                    <?php
                       $postID = $_SESSION['ID'];
                       $query = mysqli_query($db , "SELECT * FROM `comment` WHERE `postID` = '$postID' ORDER BY `id` DESC");
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
            </div>

                <?php 
                if(isset($_SESSION['userid'])){
                    $userId = $_SESSION['userid'];
                    ?>
                    <p class="error-comment d-none-comment"></p>
                <div class="form" style="margin-top: 20px;" >
                    <?php
                        $query = mysqli_query($db , "SELECT * FROM `user` WHERE `id` = '$userId'");
                        while($row = mysqli_fetch_assoc($query)){?>
                    <input type="text" id="userId" name="userId" value="<?php echo sec($row['id']); ?>" hidden>
                   <?php } ?> 
                    <button id="btncomment" name="btn-comment"><i class="fas fa-paper-plane"></i></button>
                    <input id="comment" name="comment" type="text" placeholder="<?php echo sec($lang['commentus']); ?>">
                        </div>
                <?php } ?>
            </div>
            <?php 
                if(isset($_SESSION['userid'])){
                    $userId = $_SESSION['userid'];
                    $query = mysqli_query($db , "SELECT * FROM `favorite` WHERE `userid` = '$userId' AND `postid` = '$postID'");
                    if($query){
                    ?>

            <form action="include/favorite.php" method="POST" class="btn-phone">
                <input type="text" name="PostId" value="<?php echo sec($postID);?>" hidden>
                <input type="text" name="UserId" value="<?php echo sec($userId);?>" hidden>
                
                <?php
                $FavQuey = mysqli_query($db , "SELECT * FROM `favorite` WHERE `userid` = '$userId' AND `postid` = '$postID'");
                if(mysqli_num_rows($FavQuey) > 0){?>
                    <button class="save" name="unfav"> <i class="far fa-heart"></i>لابردنی دڵخۆاز</button>
                <?php }else{?>
                    <button class="save" name="fav"> <i class="far fa-heart"></i> دڵخواز </button>
               <?php } ?>
            </form>
            <?php } }  ?>
            <script>
                $("#btncomment").on("click" , function(){
                    var comment = $("#comment").val();
                    var userId = $("#userId").val();
                    
                    $.post('include/send_comment.php' , {comment : comment , userId : userId} , function(response){
                   
                            $(document).ready(function() {
                                setInterval(function () {
                                    $('#showcom').load('new.php')
                                        }, 100);
                                });

                    });  
                });
            </script>
            <!-- <script>
                
                $('#save').click(function (event) {
                    var ItemID = $('#save').data('itemid');
                    var userid = $("#userId").val();
                    var postid = $("#postid").val();
                    event.preventDefault();
                    $.post('include/favorite.php', {
                        AddFavID: ItemID , userid : userid , postid : postid
                    }, function (response) {
                        document['getElementById']('save').id = 'RemoveFavoriteButton';
                    });
                });

                $('#RemoveFavoriteButton').click(function (event) {
                    var ItemID = $('#RemoveFavoriteButton').data('itemid');
                    var userid = $("#userId").val();
                    var postid = $("#postid").val();
                    event.preventDefault();
                    $.post('include/delFavorite.php', {
                        RemoveFavbidID: ItemID , userid : userid , postid : postid
                    }, function (response) {
                        alert(333);
                        document['getElementById']('RemoveFavoriteButton').id = 'save';
                    });
                });

               
            </script> -->
            <script>
                
            </script>
        </div>
    </div>
    <hr class="line-view">
    <div class="category">
    <div class="head-category">
        <h1>ڕیکلامێن هاوشێوە </h1>
        <a href=""> <i class="fas fa-chevron-left"></i> هەمى کەل و پەل </a>
    </div>
    <section>
        <div class="products">
            <?php
                $query = mysqli_query($db , "SELECT * FROM `product` ORDER BY `id` DESC LIMIT 8");
                while($row = mysqli_fetch_assoc($query)){?>
            <div class="product">
                <div class="image">
                    <a href="view.php?postID=<?php echo sec($row['id']); ?>"> <img src="assets/post/<?php echo sec($row['image_1']); ?>" alt="" srcset=""></a>
                </div>
                <div class="product-details">
                    <div class="price-product">
                        <i class="fal fa-shopping-cart"></i>
                        <h2><?php echo sec($row['price']); ?>$</h2>
                    </div>
                    <a href="">
                        <h3> <?php echo sec($row['name']); ?></h3>
                    </a>
                    <p><?php echo sec($row['location']); ?> <i class="fas fa-location-circle"></i></p>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</div>

<?php include'include/footer.php'; ?>