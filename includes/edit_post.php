<?php
if(isset($_GET['p_id'])){

  $the_topic_id = $_GET['p_id'];
}
$query = "SELECT * FROM topics WHERE topic_id = $the_topic_id ";
$select_posts_query = mysqli_query($conn, $query);
if(!$select_posts_query){
  die("Failed" . mysqli_error($conn));
}

while ($row = mysqli_fetch_assoc($select_posts_query)){

      $topic_id = $row['topic_id'];
      $topic_author = $row['author'];
      $topic_title = $row['title'];
      $topic_category_id = $row['category_id'];
      $topic_status = $row['topic_status'];
      $topic_image = $row['topic_image'];
      $topic_content = $row['content'];
      $topic_tags = $row['tag'];
      $topic_date = $row['date_posted'];
      $topic_view = $row['views'];

}

if(isset($_POST['update_post'])){

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


 
    if(empty($topic_image)){
        
        $query = "SELECT * FROM topics WHERE topic_id = $the_topic_id ";
        $select_image = mysqli_query($conn, $query);
         
        
        while($row = mysqli_fetch_assoc($select_image)){
            
            $topic_image = $row['topic_image'];
            
        }
        


}


 $query = "UPDATE topics SET ";
    $query .="title = '{$topic_title}', ";
    $query .="category_id = '{$topic_category_id}', ";
    $query .="date_posted = now(), ";
    $query .="author = '{$topic_author}', ";
    $query .="topic_status = '{$topic_status}', ";
    $query .="tag = '{$topic_tags}', ";
    $query .="content = '{$topic_content}', ";
    $query .="topic_image = '{$topic_image}' ";
    $query .= "WHERE topic_id = {$the_topic_id} ";
    
    $update_query = mysqli_query($conn, $query);
    if(!$update_query){

      die("Failed" . mysqli_error($conn));
    }
   
    
    
    
    
    echo "<p class='bg-success'>Post Updated. <a href = '../post.php?p_id={$the_topic_id}'>View Post </a> OR <a href = 'posts.php'>Edit More Posts</a></p>";













}



?>




  

    
      
        
          
              
<form action="" method = "post" enctype ="multipart/form-data">
    
    
<div class="form-group">
    
    <label for="title">Post Title</label>
    <input value = "<?php echo $topic_title; ?>" type="text" class="form-control" name = "title">
    
</div>   
   
    
<div class="form-group">
   <select name="topic_category" id="">

    <?php
    $query = "SELECT * FROM categories ";
    $select_category_query = mysqli_query($conn, $query);
    if(!$select_category_query){
      die("Failed" . mysqli_eror($conn));
    }

    while($row = mysqli_fetch_assoc($select_category_query)){

      $cat_id = $row['cat_id'];
      $category_title = $row['category_title'];

      echo "<option value ='{$cat_id}'>{$category_title}</option>";
    }


    ?>
       

       
       
       
       
      
       
       
       
       
   </select>    
</div> 
   
<div class="form-group">
    <label for="author">Post Author</label>
    <input value = "<?php echo $topic_author; ?>" type="text" class="form-control" name = "author">
    
</div>  
   
   
   <div class="form-group">
   <select name="topic_status" id="">
       
       <option value='<?php echo $post_status;?>'><?php echo $topic_status;?></option>

    <?php
       if($topic_status == 'Published'){
           
           echo "<option value = 'draft'>Draft</option>";
           }
       else{
            echo "<option value = 'Published'>Published</option>";
           
       }
       
       
       ?>
     
       
   </select>
   
    </div>
   
   

   
   
   
   
<div class="form-group"> 
    <img width="100" src = "./images/<?php echo $topic_image; ?>" type="file" name = "topic_image">
    <input  type="file" name = "image">
</div>
  
  
  
  
<div class="form-group">
    <label for="tag">Post Tags</label>
    <input value =  "<?php echo $topic_tags; ?>" type="text" class="form-control" name = "tag">
</div>   
                                                                                                            
<div class="form-group">
    <label for="content">Post Content</label>
   <textarea name="content" id="body" cols="30" rows="10" class="form-control"><?php echo $topic_content; ?>
       
    </textarea>
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
    
  
  
  
  
   
<div class="form-group">
    <input class = "btn btn-primary" type="submit" name = "update_post" value = "Update Post">
</div>                              
                                                                                                             
    
    
    
     
    
    
    
    
</form>