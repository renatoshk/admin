 <table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                   
                                   
                                </tr>
                            </thead>
                            
                            <tbody>
                               
                               
                               
                        <?php
                                
                          $query = "SELECT * FROM users";
                          $select_users = mysqli_query($conn, $query);
                            
                            while($row = mysqli_fetch_assoc($select_users)){
                                $user_id= $row['user_id'];
                                $username = $row['username'];
                                $password = $row['password'];
                               
                                $email = $row['email'];
                                $user_image = $row['picture'];
                                $user_role = $row['role'];
                               
                        
                            echo "<tr>";
                            
                                 echo "<td>$user_id</td>";
                                 echo "<td>$username</td>";
                                 echo "<td>$email</td>";
                                echo "<td><img width='100' src ='./images/$user_image' alt='image'></td>";
                                 echo "<td>$user_role</td>";
                            
                           
                            
              echo "<td><a href ='users.php?change_to_admin={$user_id}'>Admin</a></td>";
              echo "<td><a href ='users.php?change_to_user={$user_id}'>User</a></td>";             
              echo "<td><a href = 'users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>"; 
              echo "<td><a href = 'users.php?delete={$user_id}'>Delete</a></td>";
                      
                                              

                            
                            echo "</tr>";
                            
                            
                             }    
                            
                                
                                
                                
                                
                     ?>
                               
                               
                                
                                
                            </tbody>
                            
                            
                            
                        </table>
                        
                       
<?php


if(isset($_GET['change_to_admin'])){

$the_user_id = $_GET['change_to_admin'];

$query = "UPDATE users SET role = 'Admin' WHERE user_id = $the_user_id ";
$change_to_admin_query = mysqli_query($conn, $query);
header("Location:users.php");
if(!$change_to_admin_query){

  die("Failed" . mysqli_error($conn));
}


}


if(isset($_GET['change_to_user'])){
$the_user_id = $_GET['change_to_user'];

$query = "UPDATE users SET role = 'user' WHERE user_id = $the_user_id ";
$change_to_user_query = mysqli_query($conn, $query);
header("Location:users.php");

if(!$change_to_user_query){

  die("Failed" . mysqli_error($conn)); 
}

}







if(isset($_GET['delete'])){

$the_user_id = $_GET['delete'];
$query = "DELETE FROM users WHERE user_id = $the_user_id";
$delete_user_query = mysqli_query($conn, $query);
header("Location:users.php");
if(!$delete_user_query){

die("error" . mysqli_error($conn));


}



}


?>

