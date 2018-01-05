<?php
//Affichage d'une chambre via son ID dans le modal pop up lors d'une update



include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM chambre 
		WHERE id_chambre = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nom"] = $row["nom"];
		$output["description"] = $row["description"];
		$output["place"] = $row["place"];
		$output["status"] = $row["status"];
		$output["date"] = $row["date"];
		$output["prix"] = $row["prix"];
		if($row["image"] != '')
		{
			$output['user_image'] = '<img src="images/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
		}
		else
		{
			$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
		}
	}
	echo json_encode($output);
}
?>