<?php
      if(isset($_SESSION['userid'])){
      $userid = $_SESSION['userid'];
      $UserQuery = mysqli_query($db , "SELECT * FROM `user` WHERE `id` = '$userid'");
      while($UserRow = mysqli_fetch_assoc($UserQuery)){
        //   $_SESSION['productUserId'] = sec($row['id']);
          ?>
    <div class='uploads'>
        <div class='upload' id='open-popup-btn'>
            <p class='view-modal-upload'><i class="fa-solid fa-circle-plus"></i> <?php echo sec($lang['uploadproduct']); ?> </p>
        </div>
    </div>
    <div class='popup-overlay2'></div>
    <div class='popup2'>
        <div class='head-popup2'>
            <h1><?php echo sec($lang['uploadproduct']); ?></h1>
            <div class='popup-close-btn2'>&times;</div>
        </div>
        <hr class='line'>
        <form action='include/upload_product.php' method='POST' enctype='multipart/form-data'>
            <input type='text' name='userid' value="<?php echo sec($UserRow['id']); ?>" hidden>
            <input type='text' name='names' placeholder='<?php echo sec($lang['nameproduct']); ?>'>
            <input type='number' name='price' placeholder='<?php echo sec($lang['price']); ?>'>
            <input type='text' name='location' placeholder='<?php echo sec($lang['location']); ?>'>
            <input type='text' name='phone' placeholder='<?php echo sec($lang['numberphone']); ?>'>
            <select name="categories">
                <option value="">جۆرێ کەل و پەلى دیار بکە</option>
                <?php 
                    $query = mysqli_query($db , "SELECT * FROM `categories`");
                    while($rowCate = mysqli_fetch_assoc($query)){?>
                <option value="<?php echo sec($rowCate['id']); ?>"><?php echo sec($rowCate['name-ba']); ?></option>
                <?php } ?>
            </select>
            <textarea rows='4' name='description' cols='40' placeholder='<?php echo sec($lang['aboutproduct']); ?>'></textarea>
            <style>
                .d-none{
                    display: none;
                }
            </style>
            <input type='file' name='image_one' id='file' class='file1'>
            <label for='file' class='chose d-nones'>
              <i class='fas fa-upload'></i>
              <p>  <?php echo sec($lang['photoone']); ?> </p>
            </label>
            <input type='file' name='image_two' id='file1'>
            <label for='file1' class='chose d-none1'>
              <i class='fas fa-upload'></i>
              <p class='d-none1'>  <?php echo sec($lang['phototwo']); ?>  </p>
            </label>
            <input type='file' name='image_three' id='file2' class='file1'>
            <label for='file2' class='chose d-none2'>
              <i class='fas fa-upload'></i>
              <p>  <?php echo sec($lang['photothree']); ?>  </p>
            </label>
            <input type='file' name='image_four' id='file3' class='file1'>
            <label for='file3' class='chose d-none3'>
              <i class='fas fa-upload'></i>
              <p>  <?php echo sec($lang['photofour']); ?>  </p>
            </label>
            <input type='file' name='image_five' id='file4' class='file1'>
            <label for='file4' class='chose d-none4'>
              <i class='fas fa-upload'></i>
              <p> <?php echo sec($lang['photofive']); ?>  </p>
            </label>
            <button name='send'> <?php echo sec($lang['sendproduct']); ?> </button>
        </form>  
    </div>
<script>
    var openPopupBtn = document.querySelector('#open-popup-btn');
    var closePopupBtn = document.querySelector('.popup-close-btn2');

    openPopupBtn.addEventListener('click' , function(){
        document.body.classList.add('popup2-active');
    });
    closePopupBtn.addEventListener('click' , function(){
        document.body.classList.remove('popup2-active');
    });
</script>
<script>
    $('.d-nones').on('click' , function(){
        $('.d-none1').addClass('active');
    })
    $('.d-none1').on('click' , function(){
        $('.d-none2').addClass('active');
    })
    $('.d-none2').on('click' , function(){
        $('.d-none3').addClass('active');
    })
    $('.d-none3').on('click' , function(){
        $('.d-none4').addClass('active');
    })
</script>
<?php } } else{?>
<div class='uploads'>
    <div class='upload' >
        <p class='view-modal-upload' id='open-popup-btn'><i class="fa-solid fa-circle-plus"></i> <?php echo sec($lang['uploadproduct']); ?> </p>
    </div>
</div>
<div class='popup-overlay2'></div>
<div class='popup2'>
    <div class='head-popup2'>
      <h1><?php echo sec($lang['uploadproduct']); ?></h1>
      <div class='popup-close-btn2'>&times;</div>
    </div>
<hr style='margin: 20px 0;'>
    <style>
        .fail{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
        }
        .fail .fa-meh{
        font-size: 3.5rem;
        margin-bottom: 10px;
        }
        .fail a{
            margin-top: 10px;
            color: tomato;
        }
    </style>
    <form class='fail'>
        <i class='far fa-meh'></i>
        <p><?php echo sec($lang['msgerrorupload']); ?></p>
        <a href="login.php"><?php echo sec($lang['loginregister']); ?></a>
    </form>
</div>

<script>
        var openPopupBtn = document.querySelector('#open-popup-btn');
        var closePopupBtn = document.querySelector('.popup-close-btn2');

        openPopupBtn.addEventListener('click' , function(){
            document.body.classList.add('popup2-active');
        });
        closePopupBtn.addEventListener('click' , function(){
            document.body.classList.remove('popup2-active');
        });
</script>

<?php }  ?>
