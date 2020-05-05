<?php
    session_start();

    if(!isset($_SESSION['login_user'])){
        header("location:login.php");
        die();
    }
?>
<html>
   
   <head>
      <title>Welcome </title>
      <script>
        function clearForms()
        {
            var i;
            for (i = 0; (i < document.forms.length); i++) {
                document.forms[i].reset();
            }
        }
        
        function showUsersByRole(str) {
            if (str == "") {
                document.getElementById("usersByRole").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("usersByRole").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","get_user.php?q="+str,true);
                xmlhttp.send();
            }
        }
        
        function searchUser(str) {
            if (str == "") {
                document.getElementById("searchUserDiv").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("searchUserDiv").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","search.php?q="+str,true);
                xmlhttp.send();
            }
        }

        </script>
        <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   
   <body onload="clearForms()" onunload="clearForms()">
        <div class='center_screen'>
            <h1>Welcome <?php echo $_SESSION['login_user']; ?></h1>
            <h2><?php echo $_SESSION['role']; ?></h2>
            <br>
    </div>
        <h2>Browse Users</h2>
        <form>
            <select name="roles" onchange="showUsersByRole(this.value)">
            <option value="">Select a role</option>
            <option value="admin">admin</option>
            <option value="employee">employee</option>
            </select>
        </form>
        <br>
        <div id="usersByRole"></div>
        <br>
        
        <h2>Search</h2>
        <form>
        <input type="text" size="30" onkeyup="searchUser(this.value)">
        </form>
        <br>
        <div id="searchUserDiv"></div>
        <br>

        <h2>Update User Information</h2>
        <form id="updateUser" action="update_user.php" method='POST'>
            <label >name</label><br>
            <input type="text" name="name"><br>
            <label >username</label><br>
            <input type="text" name="username"><br>
            <label >password</label><br>
            <input type="text" name="password"><br>
            <label >age</label><br>
            <input type="text" name="age"><br>
            <label >email</label><br>
            <input type="text" name="email"><br>
            <label >webpage</label><br>
            <input type="text" name="webpage"><br>
            <input id="updateSubmit" type="submit" value=" Update information ">
        </form>
        <br>

        <?php if($_SESSION['role'] == 'admin'){ ?>
            <h2>Add User</h2>
            <form id="addUser" action="add_user.php" method='POST'>
                <label >name</label><br>
                <input type="text" name="name"><br>
                <label >username</label><br>
                <input type="text" name="username"><br>
                <label >password</label><br>
                <input type="text" name="password"><br>
                <label >age</label><br>
                <input type="text" name="age"><br>
                <label >role</label><br>
                <select name="role">
                    <option value="">Select a role</option>
                    <option value="admin">admin</option>
                    <option value="employee">employee</option>
                </select><br>
                <label >email</label><br>
                <input type="text" name="email"><br>
                <label >webpage</label><br>
                <input type="text" name="website"><br>
                <input id="addSubmit" type="submit" value=" Add user ">
            </form>
            <br>

            <h2>Delete User</h2>
            <form id="deleteUser" action="delete_user.php" method='POST'>
                <label >username</label><br>
                <input type="text" name="username"><br>
                <input id="deleteSubmit" type="submit" value=" Delete user ">
            </form>
            <br>
        <?php } ?>
        
   </body>
   <footer><a href = "logout.php">Sign Out</a></footer>
   
</html>