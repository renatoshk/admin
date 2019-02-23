<?php

if(isset($_POST['create_user'])){
    
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];
    $password = $_POST['password'];
    $user_role = $_POST['role'];

    move_uploaded_file($user_image_temp, "./images/$user_image");
    
    
    
    $query = "INSERT INTO users(username, email, picture, password, role ) ";
    $query .="VALUES('{$username}', '{$email}', '{$user_image}', '{$password}', '{$user_role}' ) "; 
    
    $create_user_query = mysqli_query($conn,$query);
   
    if(!$create_user_query){
      die("Failed". mysqli_error($conn));
    }
    
    
    
    
    echo "User Created: ". " ". "<a href = 'users.php'>View Users </a>";
    
    
    
    
    
    
}
    





?>
   

   
   
<form action="" method = "post" enctype ="multipart/form-data">
    
<!--
   
<div class="form-group">
    <label for="user_image">User Image</label>
    <input type="file" name="image">
</div>
  
  
-->
  
  
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name = "username">
</div>   
                                                                                                            
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" name = "email">

</div>  


<div class="form-group">
    <label for="user_image">User Image</label>
    <input type="file" name="image">
</div>

   
<div class="form-group">
    <label for="password">Password</label>
    <input type="password"  class="form-control" name = "password">

</div> 
   
   <div class="form-group">
   <select name="role" id="">
       <option value="user">Select Options</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>    

            
   </select>    
</div> 
   

   
   
<div class="form-group">
    <input class = "btn btn-primary" type="submit" name = "create_user" value = "Add User">
</div>                              
                                                                                                             
    
    
    
    
    
    
    
    
</form>


