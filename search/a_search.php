<?php 
// You can access the values posted by jQuery.ajax

require_once 'db_connect.php';

// through the global variable $_POST, like this:
$bar = isset($_POST['search']) ? $_POST['search'] : null;//JULAN - references to the 'Name' in the form field and puts it in a var



if(strlen($bar)>0){
$query = "SELECT * FROM books 
      INNER JOIN `authors` ON books.fk_author_id = authors.author_id
      INNER JOIN `publisher` ON books.fk_pub_id = publisher.pub_id
      INNER JOIN `genre` ON books.fk_genre_id = genre.genre_id
      WHERE title like '".$bar."%';";
      


$result = mysqli_query($connect,$query);
if($result->num_rows >0){
	while($row = $result->fetch_assoc()){
		echo "<div  class='col-lg-4 border top'>
        <div class='col-lg-3' style='width: 24rem;''>
        <img id='img' class='card-img-top' src = ".$row['image']." width=150px height=180px alt='Card image cap'>
        <h2>".$row['title']."</h2>
        <p>Author: ".$row['author_name']."</p>
        <p>Genre: ".$row['description']." </p>
        <hr>
        <small class=text-muted>published: ".$row['pub_name']."</small>
        <small class=text-muted><a href='publisher.php?book_id=".$row['book_id']."'> more</a></small></div></div>";
	}
}else {
	echo "no Entry";
}
	
}



?>