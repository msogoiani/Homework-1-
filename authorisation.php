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
$signinError="";


if (isset($_POST["login"])) {
  if($_POST["signinusername"]=="user" && $_POST["signinpassword"]=="user"){
      session_start();
      $_SESSION["Username"]=$_POST["signinusername"];
      $_SESSION["Password"]=$_POST["signinpassword"];
      header("Location:welcometosession.php ");
  }
  else {
      $signinError="Make sure all fields are filled in correctly";
  }
}


?>


<h2><br>SIGN IN</h2>
<div id="form">
  <form method="post" action="Lauthorisation.php">  
  <span><b>Username:</b></span> <input class="input" type="text" name="signinusername">
  <span><b>Password:</b></span> <input class="input" type="password" name="signinpassword">
  <span class="error"><b><?php echo $signinError; ?></b> </span>
  <input type="submit" name="login" value="Login" class="button">  
  <br>
  </form>
</div>

</body>
</html>