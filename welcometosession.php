<!DOCTYPE HTML>  
<html>
<head>
<style>
  .error {color: #ffffff;}
  h2 {
    background-color:#000000 ;
  border: 1px solid red;
  border-radius: 10px;
    margin: 2px;
    height: 100px;
    color: white;
    text-align: center; 
    font-size:40px;
    font-family: "Times New Roman", Times, serif;
    font-style: italic;
  }
  body {
    background-image: linear-gradient(to right, #000000 , #660000);
    margin: 0px;
    }
  span {
    display: inline-block;
    padding: 10px;
    

  }
  #form {
    text-align: center;
    display: block;
    margin: 0px;
  }
  .button {
    height: 30px;
    width: 80px;
  }
  .input {                                    
    width:250px;
    height:20px;
  }
</style>
</head>
<body>  
    <?php 
        session_start();
        if (isset($_post["logout"])){
            session_unset();
            session_destroy();
        }
    ?>
    
    
      <?php 
	if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"images/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      } 
   }
    ?> 
  

    <h2><br>Welcome</h2>
    <div class="form">
        <span>Your Username is:<?php echo $_SESSION["Username"] ?></span>
        <spna>Your Password is:<?php echo $_SESSION["Password"] ?></span>
    </div>
    <div class="form">
        <form action="IMAGE.php" method="post" enctype="multipart/form-data">
          <span>You can upload Your image<br></span>  
          <input type = "file" name = "image" >
          <input type = "submit" value = "Upload" name="submit">   
        </form>
          
          <img src = "<?php print $_SESSION['img']; ?>" alt = "IMG">
  
    </div>
    <form method="POST" action="Lauthorisation.php">
        <input type="submit" value="LOGOUT" name="logout">
    </form>
    
    
</body>
</html>