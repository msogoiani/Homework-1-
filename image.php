 <?php
 session_start();
    $userdir = $_SESSION["Username"];
    $target_dir = "images/";


    
    if (!mkdir($currentdir = $target_dir . $userdir) && !is_dir($currentdir)){
        throw new \RuntimeExeption(sprintf('Directory "%s" was not created',$currentdir));
    }
    $target_file = $target_dir . $userdir . '/' . basename($_FILES["image"]["name"]);
    $uploaded = 1;
    $imageFileType = $_FILES["image"]["type"];
    if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["image"]["tmp_name"]);
          if($check !== false) {
              echo "File is an image - " . $check["mime"] . ".";
              $uploaded = 1;
          } else {
              echo "File is not an image.";
              $uploaded = 0;
          }
      }
      if ($_FILES["image"]["size"] > 500000) {
          echo "Your file is too large.";
          $uploaded = 0;
      }
      if($imageFileType !== 'image/jpeg') {
          echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
          $uploaded = 0;
      }
      if ($uploaded == 0) {
          echo "Sorry, your file was not uploaded.";

      } else {
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $_SESSION['img']=$target_file;
                header("Location: welcometosession.php");
          } else {
                echo "Sorry, there was an error uploading your file.";
          }
      }
      

    ?>