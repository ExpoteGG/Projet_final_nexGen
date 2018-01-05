<?php

include('db.php');
include("function.php");

if(isset($_POST["user_id"]))
{
	$image = get_image_name($_POST["user_id"]);
	if($image != '')
	{
		unlink("images/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM chambre WHERE id_chambre = :id_chambre"
	);
	$result = $statement->execute(
		array(
			':id_chambre'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'La chambre a bien été supprimée !';
	}
}



?>