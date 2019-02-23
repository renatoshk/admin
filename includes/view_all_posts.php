<?php

if(isset($_POST['checkBoxArray'])){
  foreach($_POST['checkBoxArray'] as $checkBoxValue) {

  $bulk_options = $_POST['bulk_options'];


  switch($bulk_options) {



      case 'Published':
              $query = "UPDATE topics SET topic_status = '{$bulk_options}' WHERE topic_id = {$checkBoxValue} ";
              $published_query = mysqli_query($conn, $query);
               break;



      case 'draft':
        $query = "UPDATE topics SET topic_status = '{$bulk_options}' WHERE topic_id = {$checkBoxValue} ";
               $draft_query = mysqli_query($conn, $query);
               break; 

       case 'delete':
               $query = "DELETE FROM topics WHERE topic_id = {$checkBoxValue} ";
               $delete_query = mysqli_query($conn, $query);
               break;       
  
  }




  }


}










?>                    















<form action="" method="post">
                            
                                                        
                                                                                                            
                             
 <table class = "table table-bordered table-hover">
                           

<div id="bulkOptionContainer" class="col-xs-4">

<select class = "form-control" name = "bulk_options" id="">
<option  value="">Select Options</option>
<option value="Published">Published</option>
<option value="draft">Draft</option>
<option value="delete">Delete</option>
<option value="clone">Clone</option>
</select>



<!-- Kodi js per te selectuar te gjitha postimet njeheresh -->
<script>    
    $(document).ready(function(){
    $('#selectAllBoxes').click(function(event){
     if(this.checked) {
       $('.checkBoxes').each(function(){
             this.checked = true;
              });
         
  }  
        
        else {
         
            $('.checkBoxes').each(function(){
             
             this.checked = false;
             
          }); 
     }
});
  
});
    
 </script>


</div>    
                          
<div class="col-xs-4">
    
    
    <input type="submit" name = "submit" class="btn btn-success" value="Apply">
    <a class = "btn btn-primary" href = "posts.php?source=add_posts">Add New</a>
    
    
    
</div>                          
                          
                             <thead>
                                <tr>
                                   <th><input id ="selectAllBoxes" type ="checkbox"></th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>View Post</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            
                            <tbody>


                                <?php
                                  $query = "SELECT * FROM topics";
                                  $select_posts_query = mysqli_query($conn, $query);

                                  if(!$select_posts_query){

                                    die("Failed" . mysqli_error($conn));
                                  }  

                                  while($row = mysqli_fetch_assoc($select_posts_query)){

                                      $topic_id = $row['topic_id'];
                                      $topic_author = $row['author'];
                                      $topic_title = $row['title'];
                                      $topic_category_id = $row['category_id'];
                                      $topic_status = $row['topic_status'];
                                      $topic_image = $row['topic_image'];
                                      $topic_tags = $row['tag'];

                                      $comment_count = $row['topic_comment_count'];
                                      $topic_date = $row['date_posted'];
                                      $topic_view = $row['views'];

                               echo "<tr>";  
                        ?>
<td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $topic_id; ?>'></td>
                         <?php    
                                echo "<td>$topic_id</td>";
                                echo "<td>$topic_author</td>";
                                echo "<td>$topic_title</td>";


                               $query = "SELECT * FROM categories WHERE cat_id = {$topic_category_id} ";
                               $select_category_query = mysqli_query($conn, $query);
                               if(!$select_category_query){
                                die("Failed" . mysqli_error($conn));
                               }

                               while($row = mysqli_fetch_assoc($select_category_query)){

                                $cat_id = $row['cat_id'];
                                $category_title = $row['category_title'];
                                echo"<td>$category_title</td>";
                               }

                                echo "<td>$topic_status</td>";
                                echo "<td><img width='100' src='./images/$topic_image' alt='image'></td>";
                                echo "<td>$topic_tags</td>";


                                

                          

                                 $query = "SELECT * FROM replies WHERE topic_id = $topic_id ";
                                 $send_comment_query = mysqli_query($conn, $query);

                                 $comment_count = mysqli_num_rows($send_comment_query); 

                                 echo "<td>$comment_count</td>";









                                echo "<td>$topic_date</td>";

                    echo "<td><a href ='../forum/forum_more.php?p_id={$topic_id}'>View Post</a></td>";
                    echo "<td><a href ='posts.php?source=edit_post&p_id={$topic_id}'>Edit</a></td>";
                    echo "<td><a onClick=\"Javascript: return confirm('Are you sure you want to delete this'); \" href='posts.php?delete={$topic_id}'>Delete</a></td>";
                                 echo "<td>$topic_view</td>";


                                








                        }





                                ?>




                                
                               
                               
                       
                        
                              
                               
                 </tbody>
        </table>
</form> 

<?php
if(isset($_GET['delete'])){

$the_topic_id = $_GET['delete'];
$query = "DELETE FROM topics WHERE topic_id = $the_topic_id ";
$delete_query = mysqli_query($conn, $query);
header("Location:posts.php");

if(!$delete_query){

    die("Failed" . mysqli_error($conn));
}


}

?>
          