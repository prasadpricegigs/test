<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Create simple website using codeigniter Demo - TryCatch Classes </title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <!-- Latest compiled and minified Jquery library -->
        <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
 
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
     
<body>
   <div class="container">
      <div class="row clearfix">
      <div class="col-md-12 column">
      <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="navbar-header">
	  <a class="navbar-brand" href="http://www.trycatchclasses.com"><img src="http://www.trycatchclasses.com/wp-content/uploads/2016/09/04.png" class="logo_main" alt="" height="50"></a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span></button> 
      <a class="navbar-brand" href="<?php echo base_url() ?>">CodeIgniter integration with php excel</a>
      </div>
    
    <ul class="nav navbar-nav pull-right">                            
	<li>
	<div id="fb-root"></div>
	<script></script>
	<div class="fb-like" data-href="https://www.facebook.com/TryCatchClasses" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
	</li>
	<li class="active"><a href="<?php echo base_url();?>/home/excel"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Export Excel</a>
    </li>
    </ul>      
    </nav>
    </div>
    </div>
    </div>    


<script>
$(document).ready(function(){
$('input[type="checkbox"]').click(function(){
if($(this).prop("checked") == true){
//alert("Checkbox is checked.");
var id =$(this).val();
//alert(id);
$.ajax({

type: "POST",
url: "<?php echo base_url();?>Home/status",
cache:false,
data:{id:id,status:1},
 
success: function(response) {
    location.reload(); 
}
});
}
else if($(this).prop("checked") == false){
//alert("Checkbox is unchecked.");
var id =$(this).val();
//alert(id);
$.ajax({
type: "POST",
url: "<?php echo base_url();?>Home/status",
cache:false,
data:{id:id,status:0},
success: function(response) {
location.reload(); 
}
});
}
});
});
</script>

<div class="container">
	<br/><br/><br/><br/>
	
    <div class="panel panel-primary">
	<div class="panel-heading">CodeIgniter integration with php excel</div>
    <table style="width: 100%" class="table">
    <thead>
    <th>S N</th>
    <th>Name</th>
    <th>Email</th>
    <th>Delete</th>
    </thead>
    <tbody>
    <?php foreach ($res as $row): ?>
     
    <tr>
    <td><?php echo $row['id']?></td>
    <td><?php echo $row['name'] ?></td>
    <td><?php echo $row['email']?></td>
    <td><a href="<?php echo base_url();?>Home/delete/<?php echo $row['id'];?>">Delete</a></td>
    <td>
       <input type="checkbox" name="status" id="status" value="<?php echo $row['id']?>" <?php if($row['status'] == 1) { echo 'checked="checked"'; }?> > <?php if($row['status'] == 1) { echo 'Active'; }   else{echo "Inactive";}?></td>

    </tr>
     
    <?php endforeach; ?>
    </tbody>
    </table>
	</div>
    </div>
 
 
</body>
</html>