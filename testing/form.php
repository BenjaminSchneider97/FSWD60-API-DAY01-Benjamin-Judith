<?php 
// You can access the values posted by jQuery.ajax
// through the global variable $_POST, like this:
$bar = isset($_POST['bar']) ? $_POST['bar'] : null;//JULAN - refernces to the 'Name' in the form field and puts it in a var

$host= "localhost";
$username="root";
$password="";
$dbname="ajaxtest";

$conn = mysqli_connect($host,$username,$password,$dbname);

if($conn){
        echo "success";
}

$query= "INSERT INTO `example` (name) VALUES ('$bar');";
if(mysqli_query($conn,$query)){
        echo "insert success";
}

?>