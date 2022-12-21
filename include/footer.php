<script>
    setTimeout(function () {
        $('.loader_bg').fadeToggle();
    }, 1500)
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<footer>
    <div class="footer-main">
        <div class="help">
            <h3> <?php echo sec($lang['part']); ?></h3>
            <a href="login.php"> <?php echo sec($lang['partlogin']); ?><i class="fa-solid fa-link"></i></a>
            <a href="contact.php"><?php echo sec($lang['partcontact']); ?><i class="fa-solid fa-link"></i></a>
            <a href="about.php"><?php echo sec($lang['partabout']); ?><i class="fa-solid fa-link"></i></a>
        </div>
        <div class="social">
            <div class="head-socail">
                <h3><?php echo sec($lang['socialmedia']); ?></h3>
            </div>
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/bkarrhati/"><i class="fab fa-instagram"></i></a>
            <a href="https://www.snapchat.com/add/rayan.ramazan"><i class="fab fa-snapchat-ghost"></i></a>
            <a href=""><i class="fab fa-viber"></i></a>
            <a href="https://t.me/rayankrd"><i class="fab fa-telegram-plane"></i></a>
        </div>
        <div class="phone">
            <h3><?php echo sec($lang['partnumberphone']); ?></h3>
            <p>٠٧٥١٧١٠٠٩٤٤ <i class="fas fa-phone"></i></p>
            <p>٠٧٥٠٨٧٨٦١٥٣ <i class="fas fa-phone"></i></p>
        </div>
    </div>
    <hr>
    <div class="footer-bottom">
        <h3><i class="far fa-copyright"></i> 2020-2021 Bkarhati</h3>
        <h3>Developed By <a href="">Rayan Ramazan</a></h3>
    </div>
</footer>
</body>

</html>