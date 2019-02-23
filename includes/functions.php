<?php

function addCategories(){

	global $conn;

	if(isset($_POST['submit'])){
     $category_title = $_POST['category_title'];

     if($category_title == '' || empty($category_title)){

    echo "Fields cannot be empty";

     }


     else {

    $query = " INSERT INTO categories(category_title) ";
    $query.= " VALUE('{$category_title}') ";

    $create_category_query = mysqli_query($conn, $query);

    if(!$create_category_query){

    	die("Failed" . mysqli_error($conn));
        }

      }

   }

}






function FindAllcategories(){
 global $conn;

 $query = "SELECT * FROM categories";
 $find_all_categories = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($find_all_categories)){

	$cat_id = $row['cat_id'];
	$category_title = $row['category_title'];


echo "<tr>";
		    echo "<td>{$cat_id}</td>";
		    echo "<td>{$category_title}</td>";
		    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
		    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
echo"</tr>";

  
   }
}


function Delete_Categories(){
    global $conn;
    
    
    if(isset($_GET['delete'])){
                                               
      $the_cat_id = $_GET['delete'];
                                               
      $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
      $delete_query = mysqli_query($conn, $query);
      header("Location: categories.php");

     }
                                           
    
    
    
}






?>




