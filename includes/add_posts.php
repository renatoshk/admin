<?php 
if(isset($_POST['create_post'])){

$topic_title = $_POST['title'];
$topic_category_id = $_POST['topic_category'];
$topic_status = $_POST['topic_status'];
$topic_author = $_POST['author'];

$topic_image = $_FILES['image']['name'];
$topic_image_temp = $_FILES['image']['tmp_name'];

$topic_content = $_POST['content'];
$topic_date = date('d-m-y');

$topic_tag = $_POST['tag'];

move_uploaded_file($topic_image_temp, "./images/$topic_image");




     $query = "INSERT INTO topics(category_id, title, topic_status, author, topic_image, content, date_posted, tag) ";
      $query .= "VALUES({$topic_category_id}, '{$topic_title}', '{$topic_status}', '{$topic_author}', '{$topic_image}', '{$topic_content}', now(), '{$topic_tag}' ) ";


$create_post_query = mysqli_query($conn, $query);
if(!$create_post_query){

    die("Failed" . mysqli_error($conn));

}

  $the_topic_id = mysqli_insert_id($conn); //funksion per t thirrur id e fundit qe esht perdorur
    
    //linku kur shton post
     echo "<p class='bg-success'>Post Created. <a href = '../forum/forum_more.php?p_id={$the_topic_id}'>View Post </a> OR <a href = 'posts.php?source=add_posts'>View  Posts</a></p>";



}





?>
   

   
   
<form action="" method = "post" enctype ="multipart/form-data">
    
    
<div class="form-group">
    
    <label for="title">Post Title</label>
    <input type="text" class="form-control" name = "title">
    
</div>   
   
    
<div class="form-group">
   <select name="topic_category" id="">

<?php

$query = "SELECT * FROM categories ";

$select_categories = mysqli_query($conn, $query);
if(!$select_categories){
    die("Failed" . mysqli_error($conn));
}

while($row = mysqli_fetch_assoc($select_categories)){

    $cat_id = $row['cat_id'];
    $category_title = $row['category_title'];


echo "<option value = '{$cat_id}'>$category_title</option>";

}

?>

       

       
       
   </select>    
</div> 
   
<div class="form-group">
    <label for="title">Post Author</label>
    <input type="text" class="form-control" name = "author">
    
</div>  
   
<div class="form-group">
   
    
    <select name="topic_status" id="">
        
        <option value="draft">Post Status</option>
        <option value="Published">Published</option>
        <option value="draft">Draft</option>
        
        
    </select>
       
</div>
   
   
   
   
   
<div class="form-group">
    <label for="topic_image">Post Image</label>
    <input type="file" name="image">
</div>
  
  
  
  
<div class="form-group">
    <label for="tag">Post Tags</label>
    <input type="text" class="form-control" name = "tag">
</div>   
                                                                                                            
<div class="form-group">
    <label for="content">Post Content</label>
    <textarea name="content" id="body" cols="30" rows="10" class="form-control"></textarea>
</div>                      
   
<div class="form-group">
    <input class = "btn btn-primary" type="submit" name = "create_post" value = "Publish">
</div>                              
                                                                                                             
  <script > 
   
$(document).ready(function () {
    ClassicEditor
        .create(document.querySelector( '#body' ) )
        .catch(error => {
            console.error(error);
        } );
    
} );
 </script> 
    
    
    
    
    
    
</form>


