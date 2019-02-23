 <table class = "table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                 
                                    <th>Status</th>
                                    <th>In response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                             
                                
                                
                          

                           <?php
                            $query = "SELECT * FROM replies ";
                            $replies_query = mysqli_query($conn, $query);
                            if(!$replies_query){

                                die("Failed" . mysqli_error($conn));
                            }

                            while($row = mysqli_fetch_assoc($replies_query)){

                             $reply_id = $row['reply_id'];
                             $reply_category_id = $row['category_id'];
                             $reply_topic_id = $row['topic_id'];
                             $reply_author = $row['author'];
                             $reply_comment = $row['comment'];
                             $reply_status = $row['reply_status'];
                             $reply_date = $row['date_posted'];



                              echo "<tr>";
                              echo "<td>$reply_id</td>";
                              echo "<td>$reply_author</td>";
                              echo "<td>$reply_comment</td>";
                              echo "<td>$reply_status </td>";



                             $query = "SELECT * FROM topics WHERE topic_id = $reply_topic_id ";
                             $reply_topic_query = mysqli_query($conn, $query);
                             if(!$reply_topic_query){
                                die("Failed " . mysqli_error($conn));
                             } 

                              while($row = mysqli_fetch_assoc($reply_topic_query)){
                                       
                             $topic_id = $row['topic_id'];
                             $topic_title = $row['title']; 


                             echo "<td><a href='../forum/forum_more.php?p_id=$topic_id'>$topic_title</a></td>";

                            }

                            echo"<td>$reply_date</td>";


                            echo "<td><a href='comments.php?approve=$reply_id'>Approve</a></td>";
                            echo "<td><a href='comments.php?unapprove=$reply_id'>Unapprove</a></td>";
                            echo "<td><a href='comments.php?delete=$reply_id'>Delete</a></td>";


                            echo "</tr>";
                             

                          }





                           ?>






                            
                            
                          </tbody>    
                            
                        </table>

<?php 

if(isset($_GET['approve'])){

 $the_reply_id = $_GET['approve'];

 $approve_query = "UPDATE replies SET reply_status = 'approved' WHERE reply_id = $the_reply_id ";
 $approve_reply_query = mysqli_query($conn, $approve_query);
 header("Location:comments.php");
 if(!$approve_reply_query){

    die("Failed" . mysqli_error($conn));
 }

}

if(isset($_GET['unapprove'])){

    $the_reply_id = $_GET['unapprove'];
    $unapprove_query = "UPDATE replies SET reply_status = 'unapproved' WHERE reply_id = $the_reply_id ";
    $unapprove_query = mysqli_query($conn, $unapprove_query);
    header("Location:comments.php");
    if(!$unapprove_query){
        die("Failed" . mysqli_error($conn));
    }
 }


if(isset($_GET['delete'])){

    $the_reply_id = $_GET['delete'];

    $delete_query = "DELETE FROM replies WHERE reply_id = $the_reply_id ";
    $delete_reply_query = mysqli_query($conn, $delete_query);
    header("Location:comments.php");
    if(!$delete_query){

        die("Failed " . mysqli_error($conn));
    }


}






?>                        
                        
