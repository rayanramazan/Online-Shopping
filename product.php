
<?php 
include'include/nav.php';
include'include/modalUploadPost.php';
?>
    <div class="slides">
        <img src="assets/img/slide.png" alt="" srcset="">
    </div>
            <?php
            if(isset($_GET['post'])){
                $post = sec($_GET['post']);
                if(isset($_GET['page'])){
                    $page = sec($_GET['page']);
                    }
                    else{
                        $page = 1;
                    }
                    $num_per_page = 10;
                    $page = (float)$page;
                    $start_from = ($page-1)*10;
                    $allow = 1;
    
                $query = mysqli_query($db , "SELECT * FROM `product` WHERE `categoriesID` = '$post' AND `allow` = '$allow' ORDER BY `id` DESC LIMIT $start_from,$num_per_page");
                if(mysqli_num_rows($query) < 1){?>
                <div class='box-help'>
                    <i class='fas fa-info'></i>
                    <h1><?php echo sec($lang['emptyproducts']); ?></h1>
                    <a href='index.php'><?php echo sec($lang['backhome']); ?></a>
                </div>
                    <?php } else {?>
            <div class="category">
                <div class="head-category">
                    <h1> <?php echo sec($lang['newproducttitle']); ?> </h1>
                    <a href="product.php?all"> <i class="fas fa-chevron-left"></i> <?php echo sec($lang['allproduct']); ?> </a>
                </div>
                <section>
            <div class="products">
                <?php
                while($row = mysqli_fetch_assoc($query)){?>
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
                <?php } } }?>
                <?php

                    if(isset($_GET['all'])){

                        if(isset($_GET['page'])){
                            $page = sec($_GET['page']);
                            }
                            else{
                                $page = 1;
                            }
                            $num_per_page = 10;
                            $page = (float)$page;
                            $start_from = ($page-1)*10;
                            $allow = 1;
                            
                        $query = mysqli_query($db , "SELECT * FROM `product` WHERE `allow` = '$allow' ORDER BY `id` DESC LIMIT $start_from,$num_per_page");
                        if(mysqli_num_rows($query) < 1){?>
                            <div class='box-help'>
                                <i class='fas fa-info'></i>
                                <h1><?php echo sec($lang['emptyproducts']); ?></h1>
                                <a href='index.php'><?php echo sec($lang['backhome']); ?></a>
                            </div>
                        <?php } else {?>
                            <div class="category">
                                <div class="head-category">
                                    <h1> <?php echo sec($lang['newproducttitle']); ?> </h1>
                                    <a href="product.php?all"> <i class="fas fa-chevron-left"></i> <?php echo sec($lang['allproduct']); ?> </a>
                                </div>
                                <section>
                            <div class="products">
                        <?php
                        while($row = mysqli_fetch_assoc($query)){?>
                        <div class="product" style="margin-top: 20px;">
                            <div class="image">
                                <a href="view.php?postID=<?php echo sec($row['id']);?>"> <img src="img/<?php echo sec($row['image_1']); ?>" alt="" srcset=""></a>
                            </div>
                            <div class="product-details">
                                

                                    
                                <div class="price-product">
                                    <i class="fal fa-shopping-cart"></i>
                                    <h2>$<?php echo sec($row['price']); ?></h2>
                                </div>
                                <a href="">
                                    <h3> <?php echo sec($row['name']); ?></h3>
                                </a>
                                <p><?php echo sec($row['location']); ?> <i class="fas fa-location-circle"></i></p>
                            </div>
                        </div>
                    <?php } } } ?>
            </div>
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


        if (isset($_GET['all'])){
            $all = sec($_GET['all']);
            $pr_query = "SELECT * FROM `product`";
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
                    <a href='product.php?all&page=".($page-1)."'>
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
                    <a href='product.php?all&page=".$i."'>".$i."</a>
                <div>
                ";
            }

            if($i>$page){
                echo "
                <div 
                style='display: flex;
                align-item: center;
                justify-content: center;'>
                    <a href='product.php?all&page=".($page+1)."' class='btn-page'>
                        <i class='far fa-angle-right'></i>
                    </a>
                </div>
                ";
            }
        }
       ?>
        </section>
    </div>
    <?php include'include/footer.php'; ?>