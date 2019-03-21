<?php
ob_start();
session_start();
require_once 'actions/db_connect.php';

// if session is not set this will redirect to login page
if( !isset($_SESSION['user']) ) {
 header("Location: index.php");
 exit;
}

// if a user is marked as an admin he will be redirected to home-admin page

?>



<!DOCTYPE html>
 <html>
 <head>
  <head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> 
  <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah|Karla" rel="stylesheet">
  

  <link rel="stylesheet" type="text/css" href="css/style01.css">
  <title>Search Media</title>

</head>
   

   

 </head>
 <body>
  <div class="container">
  <div class="row gradient">
    <header>
      <div class="col-lg-1">
        <img id ="logo" src="img/fresh_logo_color.png">
      </div>
      <div class="col-lg-9 col-lg-offset-2 data" id="headingdata">
        <h1>Search my Big Library</h1>
      </div>
    </header>
  </div>
  <div class="row">
    <nav class="navbar navbar-inverse">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="index.html"></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home_usr.php">Home</a></li>
          <!-- <li><a href="create.php">Create Media</a></li>
            <li><a href="delete.php">Delete Delete</a></li> -->
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
           
          <li><a href="logout.php?logout">Sign Out</a></li>
        </div>
      </nav>
    </div>
    <h2 class="text-center">Search for Media !</h2></br>
        <form id="test">
        <div class="search">
                    <div style="width: 70%;" >
                    <input id="search" style="width: 100%;"  type="text" name="search" placeholder="Enter any keywords" value='' />
                    </div>
                    <!-- <div  style="width: 30%;" >
                    <input style="width: 100%; " class="btn-sm btn-secondary" type="submit" name="search"
                           value="Search"/>
                    </div> /JULAN: not needed since search should work on key up -->
            </div>
        </form>
            <hr>
            <div id="content">
              
            </div>
            <script>
// Variable to hold request
var request;

// Bind to the submit event of our form
$("#test").keyup(function(event){

   // Prevent default posting of form - put here to work in case of errors
   event.preventDefault();

   // Abort any pending request
   if (request) {
       request.abort();
   }
   // setup some local variables
   var $form = $(this);

   // Let's select and cache all the fields
   var $inputs = $form.find("input, select, button, textarea");//JULAN - always name all to be safe

   // Serialize the data in the form
   var serializedData = $form.serialize();

   // Let's disable the inputs for the duration of the Ajax request.
   // Note: we disable elements AFTER the form data has been serialized.
   // Disabled form elements will not be serialized.
   $inputs.prop("disabled", true);

   // Fire off the request to /form.php ->JULAN or the php file you are working on
   request = $.ajax({
       url: "actions/a_search.php",
       type: "post",
       data: serializedData
   });

   // Callback handler that will be called on success
   request.done(function (response, textStatus, jqXHR){
       // Log a message to the console
        document.getElementById("content").innerHTML=response;
     });

   // Callback handler that will be called on failure
   request.fail(function (jqXHR, textStatus, errorThrown){
       // Log the error to the console
       /*console.error(
           "The following error occurred: "+
           textStatus, errorThrown,jqXHR
       );*/
   });

   // Callback handler that will be called regardless
   // if the request failed or succeeded
   request.always(function () {
       // Reenable the inputs
       $inputs.prop("disabled", false);
   });
});
</script>
</body>
</html>