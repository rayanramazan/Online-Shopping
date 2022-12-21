
<?php 
include'include/nav.php';
include'include/modalUploadPost.php';
?>
    <div class="list-about">
        <div class="description-website">
            <h1 style="margin-bottom: 1rem;"> دەربارەى ماڵپەرى</h1>
            <p>
                <?php echo sec($lang['aboutwebsite']); ?>

            </p>
            <p>
                <?php echo sec($lang['descriptionwebsite']); ?>
            </p>
            <p>
            <?php echo sec($lang['tellme']); ?>
            </p>
            <br>
            <p>
                ٠٧٥١٧١٠٠٩٤٤ <i class="fas fa-phone"></i>
            </p>
            <p>
                ٠٧٨٠٨٢٠٣٩٠٠ <i class="fas fa-phone"></i>
            </p>

            <h1 style="margin-top: 1rem; margin-bottom: 1rem;"> خزمەتگوزارى </h1>
                <p><?php echo sec($lang['cancreateaccount']); ?></p>
                <p><?php echo sec($lang['canuploadpost']); ?></p>
                <p><?php echo sec($lang['canlike']); ?></p>
                <p><?php echo sec($lang['cancomment']); ?></p>

            <h1 style="margin-top: 1rem; margin-bottom: 1rem;"> <?php echo sec($lang['titlecondition']); ?> </h1>
                <p><?php echo sec($lang['accountofficial']); ?></p>
                <p><?php echo sec($lang['insertinfosuccess']); ?></p>
                <p> <?php echo sec($lang['uploadfivephoto']); ?></p>

            <h1 style="margin-top: 1rem; margin-bottom: 1rem;"> تێبینى </h1>
                <p><?php echo sec($lang['controlstaf']); ?></p>
                <p><?php echo sec($lang['reportme']); ?></p>


        </div>
        
    </div>




<?php include'include/footer.php'; ?>