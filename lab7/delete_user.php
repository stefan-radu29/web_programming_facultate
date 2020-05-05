<?php
    include_once('config.php');
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = mysqli_real_escape_string($db,$_POST['username']);
        
        if($_SESSION['login_user'] != $username){
            
            $sql = "DELETE FROM users WHERE username = '$username'";
            if(mysqli_query($db,$sql))
            {
                echo "User account deleted successfully!";
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($db);
            }
        }
        else
        {
            $sql = "DELETE FROM users WHERE username = '$username'";
            if(mysqli_query($db,$sql))
            {
                mysqli_close($db);
                header('location: logout.php');
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($db);
            }
        }
    }
    mysqli_close($db);
?>