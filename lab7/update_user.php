<?php
    include_once('config.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $name = mysqli_real_escape_string($db,$_POST['name']);
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db,$_POST['password']);
        $age = mysqli_real_escape_string($db,$_POST['age']);
        $email = mysqli_real_escape_string($db,$_POST['email']);
        $webpage = mysqli_real_escape_string($db,$_POST['webpage']);
        
        if($_SESSION['login_user'] == $username){
            
            $sql = "UPDATE users SET name='$name', username='$username', password='$password', age='$age', email='$email', webpage='$webpage' WHERE username = '$username'";
            if(mysqli_query($db,$sql))
            {
                echo "Your account information was updated successfully!";
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($db);
            }
        }
        else
        {
            echo "Username does not correspond to current session user!";
        }
    }


    mysqli_close($db);
    
?>