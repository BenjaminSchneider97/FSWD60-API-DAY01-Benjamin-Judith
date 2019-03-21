<?php 
// You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
$bar = isset($_POST['test']) ? $_POST['test'] : null;//JULAN - refernces to the 'Name' in the form field and puts it in a var

$host= "localhost";
$username="root";
$password="";
$dbname="ajaxtest";

$conn = mysqli_connect($host,$username,$password,$dbname);


if(strlen($bar)>0){
$query= "SELECT name FROM `example` WHERE name like '".$bar."%';";
$result = mysqli_query($conn,$query);
if($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		echo $row["name"]."<br>";
	}
}else {
	echo "no int";
}
	
}



?>