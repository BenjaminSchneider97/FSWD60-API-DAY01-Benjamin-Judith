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
		echo "
                   <tr>
                        <td>".$row['ISBN']."</td>
                        <td>".$row['title']."</td>
                        <td>".$row['year_pub']."</td>
                        <td>".$row['pub_name']."</td>
                        <td>".$row['author_name']."</td>
                        <td>".$row['book_language']."</td>
                        <td><img id='img' class='card-img-top' src = ".$row['image']." width=150px height=180px alt='Card image cap'></td>
                        <td>".$row['description']."</td>
                        <td>".$row['stats']."</td>

                       <td>
                           <a href='update.php?book_id=".$row['book_id']."'><button type='button'>Edit</button></a>
                           <a href='delete.php?book_id=".$row['book_id']."'><button type='button'>Delete</button></a>
                       </td>
                   </tr>";
	}
}else {
	echo "no Entry";
}
	
}



?>