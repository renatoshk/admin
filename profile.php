<?php include "includes/admin_header.php"; ?>







 


    <div id="wrapper">

        <!-- Navigation -->
        <?php  include "includes/admin_navigation.php";   ?>
        
        
        
        
        
        

        <div id="page-wrapper">

            <div class="container-fluid">

                
                
                
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        
                        
<form action="" method = "post" enctype ="multipart/form-data">
    
    
<div class="form-group">
    <label for="title">Firstname</label>
    <input type="text" value="<?php // echo $user_firstname; ?>" class="form-control" name = "user_firstname">
    
</div>  
   
<div class="form-group">
    
   <label for="post_status">Lastname</label>
   <input type="text" value="<?php //echo $user_lastname; ?>"  class="form-control" name = "user_lastname">       
</div>
     
   
  
    
      
        
          
              
<div class="form-group">
   <select  name="user_role" id="">
   
<option value="subscriber"><?php //echo //$user_role ?></option>
      
      <?php
       
    // if($user_role == 'admin'){
        
    //  echo "<option value='subscriber'>subscriber</option>";    

        
    // }   
       
    // else {
        
    //     echo "<option value='admin'>admin</option>";
        
    // }
    
    
    
       
       ?>

      
        
            
   </select>    
</div> 
   

   
   
   
<!--
   
<div class="form-group">
    <label for="user_image">User Image</label>
    <input type="file" name="image">
</div>
  
  
-->
  
  
<div class="form-group">
    <label for="username">Username</label>
    <input type="text" value="<?php// echo $username; ?>" class="form-control" name = "username">
</div>   
                                                                                                            
<div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" value="<?php// echo $user_email; ?>"  class="form-control" name = "user_email">

</div>                      
   
   <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" value="<?php //echo $user_password; ?>" class="form-control" name = "user_password">

</div> 
   
   
   
   
<div class="form-group">
    <input class = "btn btn-primary" type="submit" name = "edit_user" value = "Update Profile">
</div>                              
                                                                                                             
    
    
    
    
    
    
    
    
</form>
                        
                        
                        
                        

                        
                        
                        
                        
                                   
                    </div>
                               
                               
                          
                            
                            
                            
                            
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                
                
                </div>
                
                
                
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

    
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php"; ?>