<?php 
if(isset($_GET['edit_user'])){

$the_user_id = $_GET['edit_user'];

$query = "SELECT * FROM users WHERE user_id = $the_user_id ";
$select_user = mysqli_query($conn, $query);
if(!$select_user){
  die("error". mysqli_error($conn));
}


while($row = mysqli_fetch_assoc($select_user)){

  $user_id = $row['user_id'];
  $username = $row['username'];
  $user_email = $row['email'];
  $user_role = $row['role'];
  $password = $row['password'];
}

}

if(isset($_POST['edit_user'])){

 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    $password = $_POST['password'];
    $user_role = $_POST['role'];

    move_uploaded_file($user_image_temp, "./images/$user_image");



    $query = "UPDATE users SET ";
    $query.= "username = '{$username}', ";
    $query .= "email = '{$email}', ";
    $query .= "picture = '{$user_image}', ";
    $query .= "password = '{$password}', ";
    $query .= "role = '{$user_role}' ";
    $query .= "WHERE user_id = {$the_user_id} ";

    $update_user_query = mysqli_query($conn, $query);
    if(!$update_user_query){
      die("failed" . mysqli_error($conn));
    }




  echo "User Updated: ". " ". "<a href = 'users.php'>View Users </a>";

}







?>

   
   
<form action="" method = "post" enctype ="multipart/form-data">
    
    






  
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" value="<?php echo $username; ?>" class="form-control" name = "username">
</div>  


                                                                                                    
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" value="<?php echo $user_email; ?>"  class="form-control" name = "email">

</div>                      


<div class="form-group">
    <label for="user_image">User Image</label>
    <input type="file" name="image">
</div>
  
    

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" value="<?php echo $password; ?>" class="form-control" name = "password">

</div> 
   
   
   



   
  
<div class="form-group">
   <select  name="role" id="">
   
<option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
<?php
if($user_role == admin){

  echo "<option value ='user'>user</option>";
}
else {

  "<option value = 'admin'>admin</option>";
}



?>
      
     
        
            
   </select>    
</div> 
   

   
<div class="form-group">
    <input class = "btn btn-primary" type="submit" name = "edit_user" value = "Edit User">
</div>                              
                                                                                                             
    
    
    
    
    
    
    
    
</form>


