<?php
	$pdo = new PDO('mysql:host=db;dbname=auth_DB', "root2", "passw");

	 $id = htmlspecialchars($_GET['id']);

	$query = "SELECT `name`, `content`
	 FROM `files`
	 WHERE `id` = :id;";
	 $stmt = $pdo->prepare($query);
	 $stmt->bindValue(':id', $id, PDO::PARAM_INT);
	 $stmt->bindColumn(1, $name);
	 $stmt->bindColumn(2, $pdf_doc, PDO::PARAM_LOB);
	 if ($stmt->execute() === FALSE) 
	 {
		 echo 'Could not display pdf';
		 echo "\nPDO::errorInfo():\n";
		 print_r($stmt->errorInfo());
	 } 
	 else {
		 $stmt->fetch(PDO::FETCH_BOUND);
		 header("Content-type: application/pdf"); 
		 header('Content-disposition: inline; filename="'.$name.'.pdf"');
		 header('Content-Transfer-Encoding: binary');
		 header('Accept-Ranges: bytes');
		 echo $pdf_doc; 
	 }

?>