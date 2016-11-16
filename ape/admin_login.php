

<?php 

 include 'dbFunction.php';
include_once 'dbConnect.php';

$funObj = new dbFunction($conn);
  if(isset($_POST['login']))
  {
    
    $username = $_POST['username'];
    $password =$_POST['password'];
    $data = $funObj->getthat($username,$password);
    $d = $funObj->enc();
    
    if($data['username']==$d['u'] && $data['password']==$d['p'])
    {
      $_SESSION['username'] = "Admin";
      
      header("Location: admin.php");

    }
    else
    {
    	echo "Incorrect username or password";
    }

  }

 

?>
<html>
<head>
  <meta charset="utf-8">
   
    
    <link rel="stylesheet" href="style.css">

</head>
<body style="background: #2c3338;
  color: #606468;">
   <div id="login">
   <h1 style=" color: White ; font-family: sans-sherif"><center>Admin Login</center></h1>
 
      <form name='form-login' method="post" action="">

       
          <input type="text" id="user" name= "username"  placeholder="Username" required="required">
       
        
          <input type="password" id="pass" name="password"  placeholder="Password" required="required">
        
        <input type="submit" value="Login" name="login">
         

      </form>
   
    </div>
</body>
   
</html>