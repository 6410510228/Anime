<?php 
include('../condb.php');



// exit();




if (isset($_POST['anime']) && $_POST['anime']=="add") {
 
	$a_name = mysqli_real_escape_string($condb,$_POST["a_name"]);
	$a_detail = mysqli_real_escape_string($condb,$_POST["a_detail"]);
	$a_episode = mysqli_real_escape_string($condb,$_POST["a_episode"]);
	$a_seasonal = mysqli_real_escape_string($condb,$_POST["a_seasonal"]);

	
	
	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$a_img = (isset($_POST['a_img']) ? $_POST['a_img'] : '');
	$upload=$_FILES['a_img']['name'];
	if($upload !='') { 
	
	  $path="../a_img/";
	  $type = strrchr($_FILES['a_img']['name'],".");
	  $newname =$numrand.$date1.$type;
	  $path_copy=$path.$newname;
	  // $path_link="../a_img/".$newname;
	  move_uploaded_file($_FILES['a_img']['tmp_name'],$path_copy);  
	}else{
	  $newname='';
	}

	$sql = "INSERT INTO tbl_anime
	(
	 a_name,
	 a_detail,
	 a_episode,
	 a_seasonal,
	 a_img
	)
	VALUES
	(
	'$a_name',
	'$a_detail',
	'$a_episode',
	'$a_seasonal',
	'$newname'
	)";
	
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	
	
	
	if($result){
		echo "<script type='text/javascript'>";
		// echo "alert('เพิ่มข้อมูลเรียบร้อย');";
		echo "window.location = 'list_anime.php?anime_add=anime_add'; ";
		echo "</script>";
		}else{
		echo "<script type='text/javascript'>";
		echo "window.location = 'list_anime.php?anime_add_error=anime_add_error'; ";
		echo "</script>";
		}

} elseif (isset($_POST['anime']) && $_POST['anime']=="edit") {

	$a_id = mysqli_real_escape_string($condb,$_POST["a_id"]);
	
	$a_name = mysqli_real_escape_string($condb,$_POST["a_name"]);
	
	$a_detail = mysqli_real_escape_string($condb,$_POST["a_detail"]);
	$a_episode = mysqli_real_escape_string($condb,$_POST["a_episode"]);
	$a_seasonal = mysqli_real_escape_string($condb,$_POST["a_seasonal"]);
	$a_img2 = mysqli_real_escape_string($condb,$_POST['a_img2']);


	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$a_img = (isset($_POST['a_img']) ? $_POST['a_img'] : '');
	$upload=$_FILES['a_img']['name'];
	if($upload !='') { 

		$path="../a_img/";
		$type = strrchr($_FILES['a_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		// $path_link="a_img/".$newname;
		move_uploaded_file($_FILES['a_img']['tmp_name'],$path_copy);  
	}else{
		$newname=$a_img2;
	}

	$sql = "UPDATE tbl_anime SET 
	
	a_name='$a_name',
	a_detail='$a_detail',
	a_episode='$a_episode',
	a_seasonal='$a_seasonal',
	a_img='$newname'
	WHERE a_id=$a_id" ;

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_anime.php?anime_edit=anime_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'a_edit.php?a_id=$a_id&&a_edit_error=a_edit_error'; ";
	echo "</script>";
	}


}elseif (isset($_GET['anime']) && $_GET['anime']=="del"){ 
  

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";



	$a_id  = mysqli_real_escape_string($condb,$_GET["a_id"]);
	$sql = "DELETE FROM tbl_anime WHERE a_id=$a_id";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());	
	//mysqli_close($condb);
	
	if($result) {
		echo "<script type='text/javascript'>";
		echo "window.location = 'list_anime.php?anime_del=anime_del'; ";
		echo "</script>";
	} else {
		echo "<script type='text/javascript'>";
		echo "window.location = 'list_anime.php?anime_no=anime_no';";
		echo "</script>";
	}
}
else{

	echo "<script type='text/javascript'>";
    echo "window.location = 'list_anime.php?anime_no=anime_no';";
    echo "</script>";

}

?>