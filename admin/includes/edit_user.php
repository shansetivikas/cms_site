<?php
if(isset($_GET['edit_user']))
{
  $the_user_id=$_GET['edit_user'];
    
 $query="SELECT * FROM users WHERE user_id= $the_user_id";
 $select_users_query=mysqli_query($connection,$query);
 while($row=mysqli_fetch_assoc($select_users_query))
  {
     $user_id=$row['user_id'];
     $username=$row['username'];
     $user_password=$row['user_password'];
     $user_firstname=$row['user_firstname'];
     $user_lastname=$row['user_lastname'];
     $user_email=$row['user_email'];
     $user_image=$row['user_image'];
     $user_role=$row['user_role'];
  }
}

 
    if(isset($_POST['edit_user']))
    {
        /*$user_id=$_POST['user_id'];*/
       $user_firstname=$_POST['user_firstname'];
        $user_lastname=$_POST['user_lastname'];
        $user_role=$_POST['user_role'];
       /* $post_image=$_FILES['image']['name'];
        $post_image_temp=$_FILES['image']['tmp_name'];*/
        $username=$_POST['username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        
        
        /*$post_content=htmlspecialchars($_POST['post_content']);
        $post_date=date('d-m-y');
        
        
        move_uploaded_file($post_image_temp,"../images/$post_image");*/
       $query = "UPDATE users SET ";
       $query .="user_firstname='{$user_firstname}', ";
       $query .="user_lastname='{$user_lastname}', ";
       $query .="user_role='{$user_role}', ";
       $query .="username='{$username}', ";
       $query .="user_email='{$user_email}', ";
       $query .="user_password='{$user_password}' ";
       $query .="WHERE user_id='{$the_user_id}'";
       
        $edit_user_query=mysqli_query($connection,$query);
        if(!$edit_user_query)
        {
            die("Failed query".mysqli_error($connection));
        }
        
     
        
    }




?>
<form action="" method="post" enctype="multipart/form-data">
   <div class="form-group">
       <label for="post_category">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo  $user_firstname?>">
    </div>
    
    <div class="form-group">
       <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname"  value="<?php echo  $user_lastname?>">
    </div> 
   
    <div class="form-group">
    <select name="user_role" id="">
       <option value="subscriber"><?php echo $user_role ?></option>
        <?php
            if($user_role=='admin'){
                 echo "<option value='subscriber'>Subscriber</option>";
                
            }
               else
               {
                   echo "<option value='admin'>Admin</option>";
               }
        ?>
             
             
           
        
       </select>
       
    </div>
    
    <!--<div class="form-group">
       <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>-->
    
    <div class="form-group">
       <label for="post_tagsy">Username</label>
        <input type="text" class="form-control" name="username"  value="<?php echo  $username?>">
    </div>
    
    <div class="form-group">
       <label for="post_content">Email</label>
         <input type="text" class="form-control" name="user_email"  value="<?php echo  $user_email?>">
    </div>
    
     <div class="form-group">
       <label for="post_content">Password</label>
         <input type="password" class="form-control" name="user_password"  value="<?php echo  $user_password?>">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Add User">
    </div>



</form>