<?php
    include_once("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $name = mysqli_real_escape_string($db,$_POST['name']);
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db,$_POST['password']);
        $age = mysqli_real_escape_string($db,$_POST['age']);
        $role = mysqli_real_escape_string($db,$_POST['role']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $website = mysqli_real_escape_string($db,$_POST['website']);
            
        
        $sql = "INSERT INTO users(name, username, password, age, role, email, webpage) VALUES ('$name', '$username', '$password', '$age', '$role', '$email', '$website')";
        if(mysqli_query($db,$sql))
        {
            echo "User " . $username . "" .  " was added successfully!";
        }
        else
        {
            echo "Error: " . $sql . "" . mysqli_error($db);
        }
    }

    mysqli_close($db);
?>

<html>
   
   <head>
      <title>Add User Result Page</title>
   </head>
    <body>
   </body>
</html>