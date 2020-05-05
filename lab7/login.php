<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id, role FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      if (!$result) {
        printf("Error: %s\n", mysqli_error($db));
        exit();
      }
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      if(isset($_SESSION['role']))
      {
        $role = $row['role'];
      }
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         $_SESSION['login_user'] = $username;
         $role = $row['role'];
         $_SESSION['role'] = $role;
         mysqli_close($db);
         header("location: welcome.php");
      }else {
         echo "Invalid username/password";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
    <body>
        <div class="center_screen">
        <h1><b>Login<b></h1>
        <form action = "" method = "post">
            <label>Username  :</label><input type = "text" name = "username" class = "box"/><br /><br />
            <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
            <input type = "submit" value = " Submit "/><br />
        </form>
        </div>
   </body>
</html>