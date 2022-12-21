
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

<div class="title">
    <h1><?php echo sec($lang['titlecontact']); ?></h1>
</div>
    <div class="contact">
        <div class="tell-phone">
            <h1><?php echo sec($lang['simcontact']); ?></h1>
            <p> ٠٧٥١٧١٠٠٩٤٤ <i class="fas fa-phone"></i></p>
            <p> ٠٧٥٠٨٧٨٦١٥٣ <i class="fas fa-phone"></i></p>
            <h1 class="text-social"><?php echo sec($lang['socialmedia']); ?></h1>
            <ul>
                <li><a href="" class="fb"> فیس بۆک </a></li>
                <li><a href="https://www.instagram.com/bkarrhati/" class="ig"> ئینستگرام </a></li>
                <li><a href="https://www.snapchat.com/add/rayan.ramazan" class="sc"> سناپ چات </a></li>
                <li><a href="https://t.me/rayankrd" class="tt"> تێلیگڕام </a></li>
            </ul> 
        </div>
        <div class="form">
            <h1> <?php echo sec($lang['sendmsg']); ?> </h1>
                <p class="error d-none"></p>
                <input id="name" type="text" name="name" placeholder="<?php echo sec($lang['namecontact']); ?>" required>
                <input id="email" type="email" name="email" placeholder="<?php echo sec($lang['contactemail']); ?>" required>
                <input id="subject" name="subject" type="text" placeholder="<?php echo sec($lang['subjectcontact']); ?>" required>
                <textarea name="discription"  id="discription" rows="4" cols="50" placeholder="<?php echo sec($lang['descriptioncontact']); ?>"></textarea>
                <button type="submit" id="send"><?php echo sec($lang['msgbtncontact']); ?></button>
        </div>
    </div>

    
<?php include'include/footer.php'; ?>

<script>
      $("#send").on("click" , function(){
        var name = $("#name").val();
        var email = $("#email").val();
        var subject = $("#subject").val();
        var discription = $("#discription").val();
        $.post('include/contact_me.php' , {name : name , email : email , subject : subject , discription : discription} , function(response){
          if(response === "success"){
            window.location.href = "contact.php";
          } else {
            $(".error").removeClass("d-none");
            $(".error").html(response);
          }
        });
      });
</script>
