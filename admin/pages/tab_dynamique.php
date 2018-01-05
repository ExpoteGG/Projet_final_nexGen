<div class="container box">
	<h1 align="center">Liste de nos chambres</h1>
	<br />
	<div class="table-responsive">
		<br />
		<div align="right">
			<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Ajouter une chambre</button>
		</div>
		<br /><br />
		<table id="user_data" style="text-align:center" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th width="10%">Image</th>
					<th width="10%">Nom</th>
					<th width="30%">Description</th>
					<th width="5%">Places</th>
					<th width="5%">Status</th>
					<th width="15%">Date</th>
					<th width="10%">Prix</th>
					<th width="5%">Editer</th>
					<th width="5%">Supprimer</th>
				</tr>
			</thead>
		</table>
		
	</div>
</div>

<!-- Modal pop up pour l'ajout et la modification d'une chambre -->
<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Ajouter une chambre</h4>
				</div>
				<div class="modal-body">
					<label>Nom de la chambre</label>
					<input type="text" name="nom" id="nom" class="form-control" />
					<br />
					<label>Description de la chambre</label>
					<input type="text" name="description" id="description" class="form-control" />
					<br />
					<label>Places de la chambre</label>
					<input type="text" name="place" id="place" class="form-control" />
					<br />
					<label>Status de la chambre</label>
					<input type="text" name="status" id="status" class="form-control" />
					<br />
					<label>Date de la chambre</label>
					<input type="date" name="date" id="date" class="form-control" />
					<br />
					<label>Prix de la chambre</label>
					<input type="text" name="prix" id="prix" class="form-control" />
					<br />
					<label>Sélectionner l'image de la chambre</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
//Reset du modal pour l'ajout d'une chambre
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Ajouter une chambre");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	//Paramétrage du plugin DataTable JQuery avec le table user_data
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"ordering": false,
		"paging": false,
		"searching": false,
		"info": false,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
	});

	// Insert d'une nouvelle chambre 
	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var nom = $('#nom').val();
		var description = $('#description').val();
		var place = $('#place').val();
		var status = $('#status').val();
		var date = $('#date').val();
		var prix = $('#prix').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Fichier invalide !");
				$('#user_image').val('');
				return false;
			}
		}	
		if(nom != '' && description != '' && place != '' && status != '' && date != '' && prix != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Merci de remplir tous les champs !");
		}
	});
	
	//Update d'une nouvelle chambre
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#nom').val(data.nom);
				$('#description').val(data.description);
				$('#place').val(data.place);
				$('#status').val(data.status);
				$('#date').val(data.date);
				$('#prix').val(data.prix);
				$('.modal-title').text("Editer la chambre");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	//Delete d'une nouvelle chambre
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Etes-vous sûr de vouloir suppirmer cette chambre ?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>