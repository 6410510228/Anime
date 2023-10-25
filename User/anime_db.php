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
		echo "alert('เพิ่มข้อมูลเรียบร้อย');";
		echo "window.location = 'list_anime.php?anime_add=anime_add'; ";
		echo "</script>";
		}else{
		echo "<script type='text/javascript'>";
		echo "window.location = 'list_anime.php?anime_add_error=anime_add_error'; ";
		echo "</script>";
		}

} elseif (isset($_POST['anime']) && $_POST['anime']=="edit") {



}elseif (isset($_GET['anime']) && $_GET['anime']=="del"){ 
  

	echo "<pre>";
print_r($_GET);
echo "</pre>";

exit();

	$p_id  = mysqli_real_escape_string($condb,$_GET["a_id"]);
	$sql = "DELETE FROM tbl_anime WHERE a_id=$p_id";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());	
	//mysqli_close($condb);
	
	
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_product.php?product_del=product_del'; ";
	echo "</script>";


}else{

  
}

?>