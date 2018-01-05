<?php
//Insertion ou update d'une nouvelle chambre selon la valeur de l'input operation



include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	//INSERTION CHAMBRE
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO chambre (image, nom, description, place, status, date, prix) 
			VALUES (:image, :nom, :description, :place, :status, :date, :prix)
		");
		$result = $statement->execute(
			array(
				':image'		=>	$image,
				':nom'			=>	$_POST["nom"],
				':description'	=>	$_POST["description"],
				':place'		=>	$_POST["place"],
				':status'		=>	$_POST["status"],
				':date'			=>	$_POST["date"],
				':prix'			=>	$_POST["prix"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	
	//UPDATE CHAMBRE
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE chambre 
			SET image = :image, nom = :nom,  description = :description, place = :place, status = :status, date = :date, prix = :prix
			WHERE id_chambre = :id
			"
		);
		$result = $statement->execute(
			array(
				':image'		=>	$image,
				':nom'			=>	$_POST["nom"],
				':description'	=>	$_POST["description"],
				':place'		=>	$_POST["place"],
				':status'		=>	$_POST["status"],
				':date'			=>	$_POST["date"],
				':prix'			=>	$_POST["prix"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}
?>