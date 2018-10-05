<!DOCTYPE html>
<html>

<head>
	<title>Show Reports</title>
<script type="text/javascript" src="script/delete_script.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>

<div id ="form" style="margin-top: 45px;"">

<form method="post" action="<?php echo base_url();?>test/insert">
FirstName:<input type="text" name="firstname" >
<br>
<br>
LastName:<input type="text" name="lastname">
<br>
<br>
Email:<input type="text" name="email">
<br>
<br>
Salary:<input type="text" name="salary">
<br>
<br>
<input type="submit" name="submit" value="submit" class="btn-success">
</form>

</div>

<div id ="report" style="margin-top: 45px;margin-left: 50px">

<table   style="width:400px"   style="border-color: black" border="1" align="middle">

<tr>
	<th></th>
	<th>Name</th>
	<th>Email</th>
	<th>Status  <input type="checkbox" name="status"></th>
</tr>
<?php 
foreach ($data as $key => $value) {
	
?>
<tr id="<?php echo $value["emp_id"]; ?>">
<td><input type="checkbox" class="emp_checkbox" data-emp-id="<?php echo $value["emp_id"]; ?>"></td>

<td><?php echo $value['firstname']; ?></td>

<td><?php echo $value['email']; ?></td>

<td><input type="checkbox" name="status" value="1" id="<?php echo $value["emp_id"]; ?>"><?php if($value['status'] =='1')
{
	echo "active";
}
else{
	echo "inactive";
}
 ?>
 	
 </td>


<?php 
 }
?>

</tr>
</table>
</div>

<div class="row" style="margin-top: 45px;margin-left: 50px">
<div class="col-md-2 well">
<span class="rows_selected" id="select_count">0 Selected</span>
<a type="button" id="delete_records" class="btn btn-primary pull-right">Delete</a>

</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
$("input").attr("name","status").click(function()
{
if($('input[type="checkbox"]').is(":checked"))
{
var val2 = $('input[type="checkbox"]:checked').val();
var id = $('input[type="checkbox"]:checked').attr('id');
alert(val2);
alert(id);

$.ajax({

type: "POST",
url: "<?php echo base_url();?>test/status",
cache:false,
data:{emp_id:id,status:val2,},
 
success: function(response) {
}
});
}


});

})

</script>

<script type="text/javascript">
$('#delete_records').on('click', function(e) {

var employee = [];
$(".emp_checkbox:checked").each(function() {

employee.push($(this).attr('data-emp-id'));
});
alert(employee);

if(employee.length <=0)
{

alert("Please select records.");
} 
else 
{ 

WRN_PROFILE_DELETE = "Are you sure you want to delete "+(employee.length>1?"these":"this")+" row?";


var checked = confirm(WRN_PROFILE_DELETE);

if(checked == true) {

var selected_values = employee.join(",");


alert(selected_values);

$.ajax({

type: "POST",

url: "<?php echo base_url();?>test/remove",

cache:false,

data: 'emp_id='+selected_values,

success: function(response) {
// remove deleted employee rows
var emp_ids = employee.split(",");

for (var i=0; i < emp_ids.length; i++ ) 
{ 
$("#"+emp_ids[i]).remove(); }
} 

});
}
} 
});
</script>
</body>
</html>