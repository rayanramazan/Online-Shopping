<?php 
include'include/nav.php';
include'include/userLogin.php';
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

<div class="main">
		<div class="card">
			<div class="card-title">
				<h3><i class="fa fa-user-circle-o" aria-hidden="true"></i> <span id="action_title"><?php echo sec($lang['login']);?></span></h3>
			</div>
			<div class="card-body">
				<div class="card-body-top">
					<button id="login" class="btn" name="login" onclick="login()"><?php echo sec($lang['login']);?></button>
					<button id="register" class="btn" name="register" onclick="register()"><?php echo sec($lang['signup']);?></button>
					<div id="pointer-btn"></div>
				</div>
				<div class="card-body-login">
					<form id="login-form" action="login.php" method="POST">
					<p class="errors" style="margin: 14px 0; color: tomato;"><?php echo $error; ?></p>
						<input class="input-form" name="email" type="email" placeholder="<?php echo sec($lang['writeemail']);?>" required><br><br>
						<input class="input-form" name="password" type="password" placeholder="<?php echo sec($lang['writepassword']);?>" required><br><br><br>
						<input class="submit-form" name="login" type="submit" value="<?php echo sec($lang['login']);?>">
					</form>
					<div id="register-form">
						<p class="error d-none" style="margin: 14px 0; color: tomato;">
					    </p>
						<input class="input-form" id="fullname" name="fullname" type="name" placeholder="<?php echo sec($lang['writename']);?>" required><br><br>
						<input class="input-form" id="email" name="email" type="email" placeholder="<?php echo sec($lang['writeemail']);?>" required><br><br>
						<input class="input-form" id="password" name="password" type="password" placeholder="<?php echo sec($lang['writepassword']);?>" required><br><br>
						<input class="submit-form" id="signup" name="signup" type="submit" value="<?php echo sec($lang['signup']);?>">
                    </div>
				</div>
			</div>
		</div>
	</div>
    <script>
		var x = document.getElementById("login-form");
		var y = document.getElementById("register-form");
		var z = document.getElementById("pointer-btn");
		var l = document.getElementById("login");
		var r = document.getElementById("register");
		var ac = document.getElementById("action_title");

		function register(){
			x.style.left = "-450px";
			y.style.left = "25px";
			z.style.left = "215px";
			l.style.color = "#848484";
			r.style.color = "#F0B643";
			ac.textContent = "<?php echo sec($lang['signup']);?>";
		}

		function login(){
			x.style.left = "25px";
			y.style.left = "450px";
			z.style.left = "30px";
			l.style.color = "#F0B643";
			r.style.color = "#848484";
			ac.textContent = "<?php echo sec($lang['login']);?>";
		}		
	</script>

	
<?php include'include/footer.php'; ?>

<script>
	$("#signup").on("click" , function(){
		var fullname = $("#fullname").val();
		var email = $("#email").val();
		var password = $("#password").val();
		
		$.post('include/userRegister.php' , {fullname : fullname , email : email , password : password} , function(response){
			if(response === "success"){
				window.location.href = "login.php";
			} else {
				$(".error").removeClass("d-none");
				$(".error").html(response);
			}
		});
	});
</script>