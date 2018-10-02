<!DOCTYPE html>
<html>
<head>
	<title>Angular Simple </title>
 <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
<script type="text/javascript">
	
var app = angular.module('myApp',[]);

app.controller('myCtrl',function($scope){

$scope.employee = [{name:'abc',email:'abc@gmail.com',roll:345},
                 {name:'asbc',email:'asbc@gmail.com',roll:355}];

                 

});
</script>
</head>

<body>

<table width="400px" height="300px" border="1px solid" ng-App="myApp"  ng-controller="myCtrl">
<th>Name</th>
<th>Email</th>
<th>Roll</th>

<tr  ng-repeat="x in employee">
<td>{{x .name}}</td>
<td>{{x .email}}</td>
<td>{{x .roll}}</td>



</tr>
</table>




</body>
</html>