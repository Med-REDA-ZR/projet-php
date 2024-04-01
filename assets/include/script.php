<?php 
	session_start();

	include("config.php"); 

	// Add Appointments script
	if (isset($_POST['btn_add_app'])) {
			$idPat = $_POST['idPat'];
			$idDoctor = $_POST['idDoctor'];
			$phone = $_POST['phone'];
			$department = $_POST['department'];
			$date = $_POST['date'];
			$times = $_POST['times'];
			$injury = $_POST['injury'];

			// Perform the database query to insert the data
			$query = "INSERT INTO `appoiments` (`id_app`, `date_app`, `time_app`, `injury`, `id_pat`, `id_dr`, `id_dep`)
						VALUES (NULL, '$date', '$times', '$injury', '$idPat', '$idDoctor', '$department')";
		
			$cnx->query($query);
					header("location:../../pages/index.php?pages=appointments");
		}

	// Edit Appointments script
			if (isset($_POST['btn_edit_app'])) {
				$idapp = $_POST['idapp'];
				$name = $_POST['name'];
				$doctor = $_POST['doctor'];
				$phone = $_POST['phone'];
				$depart = $_POST['depart'];
				$date = $_POST['date'];
				$times = $_POST['times'];
				$injury = $_POST['injury'];
			
			$cnx->query("UPDATE appoiments AS app
						INNER JOIN patients AS p ON app.id_pat = p.id_pat
						INNER JOIN doctors AS dr ON app.id_dr = dr.id_dr
						INNER JOIN department AS dep ON app.id_dep = dep.id_dep
						SET 
						p.name_pat='$name',
						p.phone_pat='$phone',
						app.date_app='$date',
						app.id_app='$idapp',
						app.time_app='$times',
						app.injury='$injury',
						dr.name_dr='$doctor',
						dep.name_dep='$depart' 
						WHERE app.id_app=$idapp");
		
			header("location: ../../pages/index.php?pages=appointments");
		}
	
	// Delete Appointment script
	if(isset($_GET['id'])){

			$id = $_GET['id'];
			$cnx->query("DELETE FROM `appoiments` WHERE id_app = $id");		

			header("location:../../pages/index.php?pages=appointments");
	}
	// Add  Patients script==========

	if (isset($_POST['btn_add_pat'])) {
		//image scripts
		$targetDir = "../img/profils/";
		$targetName = basename($_FILES["image"]["name"]);
		$targetFile = $targetDir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;

		$targetNamex = $_FILES["image"]["name"];
		$imagetmp = $_FILES["image"]["tmp_name"];

		// Check if the file is an actual image
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check === false) {
			$message = "Error: File is not an image.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$uploadOk = 0;
		}
		// Check if file already exists
		if (file_exists($targetFile)) {
			$message = "Error: File already exists.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$targetNamex = rand( $min = 0 ,$max = 999999) . basename($_FILES["image"]["name"]);
			$targetFile = $targetDir . $targetName;
			$uploadOk = 1;
		}
		// Check file size (optional)
		if ($_FILES["image"]["size"] > 500000) {
			$message = "Error: File is too large.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$uploadOk = 0;
		}
		// Allow only specific image file formats (optional)
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$message = "Error: Only JPG, JPEG, PNG & GIF files are allowed.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$message = "Error: Your file was not uploaded.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		move_uploaded_file($imagetmp,$targetDir.'/'.$targetNamex);
		// end image scripts
		$name_pat = $_POST['name_pat'];
		$phone_pat = $_POST['phone_pat'];
		$age_pat = $_POST['age_pat'];
		$gender_pat = $_POST['gender_pat'];
		$adress_pat = $_POST['adress_pat'];
		$email_pat = $_POST['email_pat'];

		// Perform the database query to insert the data
		$query = "	INSERT INTO `patients`(`id_pat`, `name_pat`, `phone_pat`, `age_pat`, `gender_pat`, `adresse_pat`, `profile_pat`, `email_pat`) 
					VALUES (NULL,'$name_pat','$phone_pat','$age_pat','$gender_pat','$adress_pat','$targetNamex','$email_pat')";
	
		$cnx->query($query);
				header("location:../../pages/index.php?pages=appointments");
	}
	


	// Add  Patients script

// Delete Patients script
if (isset($_GET['ids'])) {
    $ids = $_GET['ids'];
    try {
        $cnx->beginTransaction();
        $cnx->query("DELETE FROM payments WHERE id_pat = $ids");
        $cnx->query("DELETE FROM appoiments WHERE id_pat = $ids");
        $cnx->query("DELETE FROM patients WHERE id_pat = $ids");
        $cnx->commit();
        header("location:../../pages/index.php?pages=patients");
    } catch (PDOException $e) {
        $cnx->rollback();
        echo "Error deleting patient: " . $e->getMessage();
    }
}
	// Add  doctor script-
	if (isset($_POST['btn_add_dr'])) {
		//image scripts
		$targetDir = "../img/profils/";
		$targetName = basename($_FILES["image"]["name"]);
		$targetFile = $targetDir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;

		$targetNamex = $_FILES["image"]["name"];
		$imagetmp = $_FILES["image"]["tmp_name"];

		// Check if the file is an actual image
		$check = getimagesize($_FILES["image"]["tmp_name"]);
		if($check === false) {
			$message = "Error: File is not an image.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$uploadOk = 0;
		}
		// Check if file already exists
		if (file_exists($targetFile)) {
			$message = "Error: File already exists.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$targetNamex = rand( $min = 0 ,$max = 999999) . basename($_FILES["image"]["name"]);
			$targetFile = $targetDir . $targetName;
			$uploadOk = 1;
		}
		// Check file size (optional)
		if ($_FILES["image"]["size"] > 500000) {
			$message = "Error: File is too large.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$uploadOk = 0;
		}
			// Allow only specific image file formats (optional)
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			$message = "Error: Only JPG, JPEG, PNG & GIF files are allowed.";
			echo "<script type='text/javascript'>alert('$message');</script>";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			$message = "Error: Your file was not uploaded.";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		move_uploaded_file($imagetmp,$targetDir.'/'.$targetNamex);	
		// end image scripts id_dr
		$name_dr = $_POST['name_dr'];
		$speciality = $_POST['speciality_dr'];
		$gender_dr = $_POST['gender_dr'];
		$adresse_dr = $_POST['adresse_dr'];
		$phone_dr = $_POST['phone_dr'];
		$email_dr = $_POST['email_dr'];

		// Perform the database query to insert the data
		$query = "	INSERT INTO `doctors`(`id_dr`, `name_dr`, `speciality_dr`, `phone_dr`, `adresse_dr`, `profile_dr`, `email_dr`, `gender_dr`) 
					VALUES  (NULL,'$name_dr','$speciality','$phone_dr','$adresse_dr','$targetNamex','$email_dr','$gender_dr')";

		$cnx->query($query);
		header("location:../../pages/index.php?pages=doctors");
	}
	// Delete Doctor script
if (isset($_GET['idd'])) {
    $idd = $_GET['idd'];
    try {
        $cnx->beginTransaction();
        $cnx->query("DELETE FROM payments WHERE id_dr = $idd");
        $cnx->query("DELETE FROM department WHERE id_dr = $idd");
        $cnx->query("DELETE FROM doctors WHERE id_dr = $idd");
        $cnx->commit();
        header("location:../../pages/index.php?pages=doctors");
    } catch (PDOException $e) {
        $cnx->rollback();
        echo "Error deleting doctor: " . $e->getMessage();
    }
}
	//add department---------------------------------------

	if (isset($_POST['add_dep'])) {
		//image scripts
		$targetDir = "../img/profils/";
		$targetName = basename($_FILES["image"]["name"]);
		$targetFile = $targetDir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;

		$targetNamex = $_FILES["image"]["name"];
		$imagetmp = $_FILES["image"]["tmp_name"];

		
		// Check if file already exists
		if (file_exists($targetFile)) {
			$targetNamex = rand( $min = 0 ,$max = 999999) . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
		}	
		move_uploaded_file($imagetmp,$targetDir.'/'.$targetNamex);
		// end image scripts dep
		$name_dep = $_POST['name_dep'];
		$desc_dep = $_POST['desc_dep'];
		$id_dr = $_POST['id_dr'];
		//$photo_dep = $_POST['photo_dep'];
		

		// Perform the database query to insert the data
		$query = "	INSERT INTO `department`(`id_dep`, `name_dep`, `desc_dep`, `photo_dep`, `id_dr`) 
					VALUES  (NULL,'$name_dep','$desc_dep','$targetNamex','$id_dr')";

		$cnx->query($query);
				header("location:../../pages/index.php?pages=departments");
	}
	





	if(isset($_POST['add_pay'])){

		// Get the payment data from the form inputs
		$id_app = $_POST['id_app'];
		$date_pay = $_POST['date_pay'];
		$total_pay = $_POST['total_pay'];
		$id_patt = 0;
		$id_doc = 0;
		echo ("$date_pay");
		foreach ($cnx->query("SELECT pat.id_pat,dr.id_dr FROM  appoiments as app INNER JOIN doctors as dr on (app.id_dr = dr.id_dr) INNER JOIN patients as pat on(app.id_pat=pat.id_pat) WHERE app.id_app=$id_app") as $app){
			$id_patt = $app['id_pat'];
            $id_doc = $app['id_dr'];
		}


		// Prepare the SQL query
		$query = "INSERT INTO payments (id_pay, date_pay,id_pat,id_dr, total) VALUES
		 (null,'$date_pay','$id_patt','$id_doc', '$total_pay')";
		 $cnx->query($query);
		 header("location:../../pages/index.php?pages=payments");
	}


// Add Command script
if (isset($_POST['btn_add_command'])) {
	$idProd = $_POST['idProd'];
	$idDoctor = $_POST['idDoctor'];
	$date = $_POST['date'];
	$times = $_POST['times'];
	$qty_cmd = $_POST['qty_cmd'];
	$old_Qty = 0;
	$qty_cmd2 = 0;
	foreach ($cnx->query("SELECT `qty_prod` FROM `products` WHERE `id_prod`=$idProd") as $dr){
		$old_Qty = $dr['qty_prod'];
		if ($old_Qty >= $qty_cmd) {
			$qty_cmd2 = $old_Qty - $qty_cmd;
		}else $qty_cmd2=0;
		
	}
	

	// Perform the database query to update Qty in Product
	$query1 ="UPDATE `products` SET `qty_prod`='$qty_cmd2' WHERE `id_prod`='$idProd'";
	$cnx->query($query1);

	// Perform the database query to insert the data
	$query2 = "INSERT INTO `command`(`id_cmd`, `product_id_cmd`, `doctor_id_cmd`, `date_cmd`, `time_cmd`, `qty_cmd`)
				VALUES (NULL, '$idProd', '$idDoctor', '$date', '$times', '$qty_cmd')";

	$cnx->query($query2);
	header("location:../../pages/index.php?pages=stocks");
}








	// Session Out 
	if(isset($_GET['logout'])){
		session_destroy();
		header("location:../../pages/index.php");
	}

?>