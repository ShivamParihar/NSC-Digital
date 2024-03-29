<!DOCTYPE html>
<html>
<head>
	<title>How to Import Excel Data into Mysql in Codeigniter</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	<script src="<?php echo base_url(); ?>assets/js/core/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<br />
		<h3 align="center">How to Import Excel Data into Mysql in Codeigniter</h3>
		<form method="post" id="import_form" enctype="multipart/form-data">
			<p><label>Select Excel File</label>
			<input type="file" name="file" id="file" required accept=".xls, .xlsx" /></p>
			<br />
			<input type="submit" name="import" value="Import" class="btn btn-info" />
		</form>
		<br />

		</div>
	</div>
</body>
</html>

<script>
$(document).ready(function(){

	$('#import_form').on('submit', function(event){
		event.preventDefault();
		$.ajax({
			url:"<?php echo base_url(); ?>index.php/excel_import/import",
			method:"POST",
			data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data){
				$('#file').val('');
				alert(data);
			}
		})
	});

});
</script>
