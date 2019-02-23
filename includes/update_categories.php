<form action="" method = "post">
                               
                               <div class="form-group">
                                   
                                   <label for = "cat-title">Update Category</label>

                                   <?php

                                 if(isset($_GET['edit'])){

                                 	$cat_id = $_GET['edit'];

                                 	$query = "SELECT * FROM categories WHERE cat_id = {$cat_id} ";
                                 	$select_categories_id = mysqli_query($conn, $query);

                                 	while($row = mysqli_fetch_assoc($select_categories_id)){

                                 		$cat_id = $row['cat_id'];
                                 		$category_title = $row['category_title'];
                                       ?>


                                  <input value = "<?php if(isset($category_title)){echo $category_title;}?>" type="text"  class ="form-control"
                                    name ="category_title">


                               <?php }}?>
                                   
                                <?php

                                if(isset($_POST['update_category'])){

                                	$the_cat_title = $_POST['category_title'];

                                	$query = "UPDATE categories SET category_title = '{$the_cat_title}' WHERE cat_id =  {$cat_id} ";
                                	$update_category = mysqli_query($conn, $query);
                                }


                                ?>
                                  
                                
                                   
                                   
                            
                                   
                             
                                   
                              </div>
                                  
                                  
                                  <div class="form-group">
                                   <input type = "submit" class = "btn btn-primary" name = "update_category" value = "Update Category">                               
                                          
                                          </div>
                                          
                            </form>
                                                
                                      