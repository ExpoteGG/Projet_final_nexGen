<?php
//Affichage d'une table



include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM chambre ";
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="images/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '';
	}
	/*  Nombre de record selon le nombre de table  */
	$sub_array = array();
	//col 1
	$sub_array[] = $image;
	//col 2
	$sub_array[] = $row["nom"];
	//col 3
	$sub_array[] = $row["description"];
	//col 4
	$sub_array[] = $row["place"];
	//col 5
	$sub_array[] = $row["status"];
	//col 6
	$sub_array[] = $row["date"];
	//col 7
	$sub_array[] = $row["prix"];
	//col 8
	$sub_array[] = '<button type="button" name="update" id="'.$row["id_chambre"].'" class="btn btn-warning btn-xs update"><i style="color:white" class="fa fa-pencil"></i></button>';
	//col 9
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id_chambre"].'" class="btn btn-danger btn-xs delete"><i style="color:white" class="fa fa-trash"></i></button>';
	$data[] = $sub_array;
	/*  --------------------------------           */
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>