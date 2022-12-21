<?php 
include'include/nav.php';
include'include/modalUploadPost.php';
?>
<div class="slides">
        <img src="assets/img/slide.png" alt="" srcset="">
    </div>
            <?php
            if(isset($_SESSION['userid'])){
                $userid = sec($_SESSION['userid']);
                if(isset($_GET['page'])){
                    $page = sec($_GET['page']);
                    }
                    else{
                        $page = 1;
                    }
                    $num_per_page = 10;
                    $page = (float)$page;
                    $start_from = ($page-1)*10;
                    $one = 1;
   
                $query = mysqli_query($db , "SELECT * FROM `favorite` WHERE `userid` = '$userid' LIMIT $start_from,$num_per_page");
                if (mysqli_num_rows($query) < 1){?>
                <div class='box-help'>
                        <i class='fas fa-info'></i>
                        <h1><?php echo sec($lang['emptyfav']); ?></h1>
                        <a href='index.php'><?php echo sec($lang['backhome']); ?></a>
                        </div>
                    <?php } else {?>
                        <div class="category">
                        <div class="head-category" id="favorite-title">
                            <h1> <?php echo sec($lang['myfavoruit']); ?> </h1>
                        </div>
                        <section>
                        <div class="products">
                        <?php 
                        while($favrow = mysqli_fetch_assoc($query)){
                            $favid = sec($favrow['postid']);
                        
                        $PrQuery = mysqli_query($db , "SELECT * FROM `product` WHERE `id` = '$favid'");
                while($row = mysqli_fetch_assoc($PrQuery)){
                    $img = sec($row['image_1']);
                    $price = sec($row['price']);
                    $name = sec($row['name']);
                    $location = sec($row['location']);
                    $id = sec($row['id']);
                    ?>
                    
                        
                        
                        <div class="product" style="margin-top: 20px;">
                            <div class="image">
                                <a href="view.php?postID=<?php echo sec($row['id']);?>"> <img src="assets/post/<?php echo sec($row['image_1']); ?>" alt="" srcset=""></a>
                            </div>
                            <div class="product-details">
                                
        
                                    
                                <div class="price-product">
                                    <i class="fal fa-shopping-cart"></i>
                                    <h2>$<?php echo sec($row['price']); ?></h2>
                                </div>
                                <a href="view.php?postID=<?php echo sec($row['id']);?>">
                                    <h3> <?php echo sec($row['name']); ?></h3>
                                </a>
                                <p><?php echo sec($row['location']); ?> <i class="fas fa-location-circle"></i></p>
                            </div>
                        </div>
                <?php }  } } } else {
                    echo "
                    <div class='box-help'>
                    <i class='fas fa-info'></i>
                    <h1>".sec($lang['pleaseregister'])."</h1>
                    <a href='login.php'>".sec($lang['loginregister'])."</a>
                    </div>";
                } ?>
            </div>
            <style>
                .box-help{
                    width: 100%;
                    height: 30vh;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    flex-direction: column;
                    margin-top: 2rem;
                }
                .box-help i{
                    font-size: 10rem;
                    margin-bottom: 20px;
                    color: tomato;
                }
                .box-help a{
                    color: rgb(69, 221, 55);
                    text-decoration: none;
                    font-size: 1.2rem;
                }
            </style>

            <style>
                .btn-page a{margin: 20px 10px;color: #111; border: none;
                background: #F0B643; padding: 4px; transition: .4s;
                border-radius: 5px; width: 30px; text-align: center;}
                .btn-page a:hover{background: #ffb31a;color: #fff;}
                .num-page a{margin: 20px 10px;border: 1px solid #F0B643;
                color: #111; background: none; padding: 4px;
                transition: .4s; border-radius: 5px;}
                .num-page a:hover{background: #F0B643; color: #fff;}
            </style>

            <?php
            if(isset($_GET['post'])){
                
            $pr_query = "SELECT * FROM `product` WHERE `categoriesID` = '$post'";
            $pr_result = mysqli_query($db,$pr_query);
            $total_record = mysqli_num_rows($pr_result);

            $total_page = ceil($total_record/$num_per_page);


            if($page>1){
                echo "
                <div 
                style='display: flex;
                align-item: center; 
                justify-content: center; 
                margin-top: 2.5rem;' class='btn-page'>
                    <a href='product.php?post=".sec($post)."&page".($page-1)."'>
                        <i class='far fa-angle-left'></i>
                    </a>
                <div>
                ";
            }
            for($i=1;$i<$total_page;$i++){
                echo "
                <div 
                style='display: flex; 
                align-item: center; 
                justify-content: center;' class='num-page'>
                    <a href='product.php?post=".sec($post)."&page=".$i."'>".$i."</a>
                <div>
                ";
            }

            if($i>$page){
                echo "
                <div 
                style='display: flex;
                align-item: center;
                justify-content: center;'>
                    <a href='product.php?post=".sec($post)."&page=".($page+1)."' class='btn-page'>
                        <i class='far fa-angle-right'></i>
                    </a>
                </div>
                ";
            }
        }


        include 'include/footer.php';
        ?>