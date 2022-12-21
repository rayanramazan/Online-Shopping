<?php
include'config.php';
if(isset($_POST['send'])){
    
    $userid = sec($_POST['userid']);
    $names = sec($_POST['names']);
    $price = sec($_POST['price']);
    $location = sec($_POST['location']);
    $phone = sec($_POST['phone']);
	date_default_timezone_set('Asia/Baghdad');
    $dateTime = sec($_POST['date']);
    $description = sec($_POST['description']);
	$categories = sec($_POST['categories']);
	$allow = 0;
	// $productUserId = $_SESSION['productUserId'];

    $date = date("Y-m-d h:i:sa");

    $file = $_FILES['image_one'];
	$fileName = $file['name'];
	$fileType = $file['type'];
	$fileTmpName = $file['tmp_name'];
	$fileError = $file['error'];
	$fileSize = $file['size'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));
	$fileAllowed = array('png' , 'jpg' , 'jpeg' , 'svg' , 'gif');

	if(in_array($fileActualExt , $fileAllowed)){
		if($fileError === 0){
			if($fileSize < 10000000){

				$fileNewName = rand().".".$fileActualExt;
				$fileDestinition = "../assets/post/$fileNewName";
				move_uploaded_file($fileTmpName , $fileDestinition);
			}
		}
	}

    $file1 = $_FILES['image_two'];
	$fileName1 = $file1['name'];
	$fileType1 = $file1['type'];
	$fileTmpName1 = $file1['tmp_name'];
	$fileError1 = $file1['error'];
	$fileSize1 = $file1['size'];

	$fileExt1 = explode('.', $fileName1);
	$fileActualExt1 = strtolower(end($fileExt1));
	$fileAllowed1 = array('png' , 'jpg' , 'jpeg' , 'svg' , 'gif');

	if(in_array($fileActualExt1 , $fileAllowed1)){
		if($fileError1 === 0){
			if($fileSize1 < 10000000){

				$fileNewName1 = rand().".".$fileActualExt1;
				$fileDestinition1 = "../assets/post/$fileNewName1";
				move_uploaded_file($fileTmpName1 , $fileDestinition1);
			}
		}
	}

    $file2 = $_FILES['image_three'];
	$fileName2 = $file2['name'];
	$fileType2 = $file2['type'];
	$fileTmpName2 = $file2['tmp_name'];
	$fileError2 = $file2['error'];
	$fileSize2 = $file2['size'];

	$fileExt2 = explode('.', $fileName2);
	$fileActualExt2 = strtolower(end($fileExt2));
	$fileAllowed2 = array('png' , 'jpg' , 'jpeg' , 'svg' , 'gif');

	if(in_array($fileActualExt2 , $fileAllowed2)){
		if($fileError2 === 0){
			if($fileSize2 < 10000000){

				$fileNewName2 = rand().".".$fileActualExt2;
				$fileDestinition2 = "../assets/post/$fileNewName2";
				move_uploaded_file($fileTmpName2 , $fileDestinition2);
			}
		}
	}

    $file3 = $_FILES['image_four'];
	$fileName3 = $file3['name'];
	$fileType3 = $file3['type'];
	$fileTmpName3 = $file3['tmp_name'];
	$fileError3 = $file3['error'];
	$fileSize3 = $file3['size'];

	$fileExt3 = explode('.', $fileName3);
	$fileActualExt3 = strtolower(end($fileExt3));
	$fileAllowed3 = array('png' , 'jpg' , 'jpeg' , 'svg' , 'gif');

	if(in_array($fileActualExt3 , $fileAllowed3)){
		if($fileError3 === 0){
			if($fileSize3 < 10000000){

				$fileNewName3 = rand().".".$fileActualExt3;
				$fileDestinition3 = "../assets/post/$fileNewName3";
				move_uploaded_file($fileTmpName3 , $fileDestinition3);
			}
		}
	}

    $file4 = $_FILES['image_five'];
	$fileName4 = $file4['name'];
	$fileType4 = $file4['type'];
	$fileTmpName4 = $file4['tmp_name'];
	$fileError4 = $file4['error'];
	$fileSize4 = $file4['size'];

	$fileExt4 = explode('.', $fileName4);
	$fileActualExt4 = strtolower(end($fileExt4));
	$fileAllowed4 = array('png' , 'jpg' , 'jpeg' , 'svg' , 'gif');

	if(in_array($fileActualExt4 , $fileAllowed4)){
		if($fileError4 === 0){
			if($fileSize4 < 10000000){

				$fileNewName4 = rand().".".$fileActualExt4;
				$fileDestinition4 = "../assets/post/$fileNewName4";
				move_uploaded_file($fileTmpName4 , $fileDestinition4);
			}
		}
	}

    if(empty($names) || empty($fileNewName) || empty($price) || empty($location) || empty($phone) || empty($description)){
		$_SESSION['Empty'] = sec($lang['fillall']);
		header('Location: ../index.php');
	}
	else{
        $PhotoQuery = mysqli_query($db , "INSERT INTO 
		`product`(`name`, `userID`, `categoriesID`, `price`,`description`, `location`, `date`, `view`, `n_phone`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5` , `allow`)
		 VALUES('$names', '$userid', '$categories' , '$price', '$description' , '$location', '$date' , 1, '$phone','$fileNewName','$fileNewName1','$fileNewName2','$fileNewName3','$fileNewName4' , '$allow')");
		if($PhotoQuery){
			$_SESSION['PostSuccess'] = sec($lang['verifyubook']);
			header('Location: ../index.php?success');
	    }
    }
}
?>