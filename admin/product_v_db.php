<?php 
include('../condb.php');



if (isset($_POST['product']) && $_POST['product']=="add") {
    // echo "add";
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_GET);
    // echo "</pre>";
    // exit();

	$pv_l_id = mysqli_real_escape_string($condb,$_POST["pv_l_id"]);

    $p_vloca = mysqli_real_escape_string($condb,$_POST["p_vloca"]);
	$p_vsize = mysqli_real_escape_string($condb,$_POST["p_vsize"]);
	$p_vlength = mysqli_real_escape_string($condb,$_POST["p_vlength"]);
	$p_vdetail = mysqli_real_escape_string($condb,$_POST["p_vdetail"]);




	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	// $p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	// $upload=$_FILES['p_img']['name'];
	// if($upload !='') { 

	// 	$path="../p_img/";
	// 	$type = strrchr($_FILES['p_img']['name'],".");
	// 	$newname =$numrand.$date1.$type;
	// 	$path_copy=$path.$newname;
	// 	// $path_link="../p_img/".$newname;
	// 	move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  
	// }else{
	// 	$newname='';
	// }

    
	$sql = "INSERT INTO tbl_vproduct

	(
	 pv_l_id, p_vloca, p_vsize, p_vlength, p_vdetail
	)
	VALUES
	(
	'$pv_l_id',

	'$p_vloca',
	'$p_vsize',
	'$p_vlength',
	'$p_vdetail'
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");

	
	//exit();
	//mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('เพิ่มข้อมูลเรียบร้อย');";
	echo "window.location = 'list_v_product.php?product_add=product_add'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_v_product.php?product_add_error=product_add_error'; ";
	echo "</script>";
	}




} elseif (isset($_POST['product']) && $_POST['product']=="edit") {
	// echo "edit";
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_GET);
    // echo "</pre>";
    // exit();

	
	$p_vid = mysqli_real_escape_string($condb,$_POST["p_vid"]);
	$pv_l_id = mysqli_real_escape_string($condb,$_POST["pv_l_id"]);
	
	$p_vloca = mysqli_real_escape_string($condb,$_POST["p_vloca"]);
	$p_vsize = mysqli_real_escape_string($condb,$_POST["p_vsize"]);
	$p_vlength = mysqli_real_escape_string($condb,$_POST["p_vlength"]);
	$p_vdetail = mysqli_real_escape_string($condb,$_POST["p_vdetail"]);


	
	$sql = "UPDATE tbl_vproduct SET 
			  pv_l_id = '$pv_l_id', 	

			  p_vloca = '$p_vloca', 
			  p_vsize = '$p_vsize', 
			  p_vlength = '$p_vlength', 
              p_vdetail = '$p_vdetail'
   
	
	
	WHERE p_vid=$p_vid" ;

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'product_v_edit.php?p_vid=$p_vid&&product_edit=product_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'product_v_edit.php?p_vid=$p_vid&&product_edit_error=product_edit_error'; ";
	echo "</script>";
	}


}elseif (isset($_GET['product']) && $_GET['product']=="del"){ 
	// echo "del";
	// echo "<pre>";
	// print_r($_GET);
	// echo "</pre>";
	// exit();

	$p_vid  = mysqli_real_escape_string($condb,$_GET["p_vid"]);
	$sql = "DELETE FROM tbl_vproduct WHERE p_vid=$p_vid";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());	
	//mysqli_close($condb);
	
	
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_v_product.php?product_del=product_del'; ";
	echo "</script>";

}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_v_product.php?product_no=product_no';";
	echo "</script>";
  
}

?>