<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<title>Insert Data into database</title>

</head>

<body>
	<form method="post" action="<?php echo base_url();?>welcome/insert">

		<input type="text" name="fname">
		<input type="text" name="lname">
		<input type="text" name="email">
		
        <input type="submit" name="submit" class="btn btn-success">
		
	</form>

</body>

</html>