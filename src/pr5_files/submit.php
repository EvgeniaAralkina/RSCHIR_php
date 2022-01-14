<?php
if ($_FILES['pdf_file']['size'] > 0) {
	 if ($_FILES['pdf_file']['error'] != 0) {
	 	echo 'Something wrong with the file.';
	 } 
	 else { 
		 $name = $_FILES['pdf_file']['name'];
		 $file_name = $_FILES['pdf_file']['name'];
		 $file_tmp = $_FILES['pdf_file']['tmp_name'];
		 if ($pdf_blob = fopen($file_tmp, "rb")) {
			 try {
			 	$pdo = new PDO('mysql:host=db;dbname=auth_DB', "root2", "passw");
				 $insert_sql = "INSERT INTO files (name, content) VALUES(?, ?);";
				 $stmt = $pdo->prepare($insert_sql);
				 $stmt->bindParam(1, $name);
				 $stmt->bindParam(2, $pdf_blob, PDO::PARAM_LOB);
				 $pdo->beginTransaction();
				 if ($stmt->execute() === FALSE) {
				 	echo 'Could not save information to the database';
				 	echo "\nPDO::errorCode(): ", $stmt->errorCode();
				 	echo "\nPDO::errorInfo():\n";
    				print_r($stmt->errorInfo());
				 } 
				 else {
				 	$pdo->commit();
				 	header('Location: http://localhost/pr5_files/allFiles.php');
				 }
			 } 
			 catch (PDOException $e) {
				 echo 'Database Error '. $e->getMessage(). ' in '. $e->getFile().
				 ': '. $e->getLine();
			 }
		 } 
		 else {
		 	echo 'Could not open the attached pdf file';
		 }
	 }
}