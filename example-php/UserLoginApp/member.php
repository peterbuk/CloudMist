<html>
    <head>
        <title>Member</title>		
    </head>
    
    <body bgcolor="#FFFFCC">
        <?php  

        session_start();
        require_once 'connect.php';   

        //3. If the form is submitted or not.
        //3.1 If the form is submitted
        if (isset($_POST['username']) and isset($_POST['password']))
        {
            //3.1.1 Assigning posted values to variables.
            $username = $_POST['username'];
            $password = $_POST['password'];
            //3.1.2 Checking the values are existing in the database or not
            $query = "SELECT * FROM user WHERE username='$username' and password='$password'";

            $result = mysqli_query($con,$query) or die(mysqli_error());
            $count = mysqli_num_rows($result);
            
            //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
            if ($count == 1){
                $_SESSION['username'] = $username;
            } else{
                //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
                echo "Invalid Login Credentials.";
            }
        }
        
        //3.1.4 if the user is logged in Greets the user with message
        if (isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            echo "Hai " . $username . "<br>";
            echo "This is the Members Area <br>";
            echo "<a href='logout.php'>Logout</a>"; 
            
            echo "<br><br>"
            . "<form method='get' action='member.php'>"
                . "<input type='submit' name='view' value='View my Profile'>"
            . "</form>";
            
            echo "<br><br>"
            . "<form method='post' action='member.php'>"
            .   "<input type='submit' name='changepwd' value='Change my Password'>"
            . "</form>";
            
            if (isset($_GET['view'])) 
            {
                $query = "SELECT * FROM user WHERE username='$username'";
                $result = mysqli_query($con, $query) or die(mysqli_error());
                $row = mysqli_fetch_assoc($result);
                echo "<table border='1px'>"
                        . "<tr>"
                        .   "<td>Username</td>"
                        .   "<td>".$row['username']."</td>"
                        . "<tr>"
                        .   "<td>Email</td>"
                        .   "<td>".$row['email']."</td>"
                        . "</tr>"
                        . "</tr>"
                . "</table>";
            }
            
            if (isset($_POST['changepwd'])) 
            {
                echo "<form method='post' action='member.php'>"
                    . "Verify your old password: "
                    . "<input type='password' name='oldpassword' value=''>"
                    . "Enter your new password: "
                    . "<input type='password' name='newpassword' value=''>"
                    . "<input type='submit' name='changepwd-form' value='Submit'>"
                    . "</form>";
            }
            if (isset($_POST['changepwd-form'])) 
            {
                if (isset($_POST['oldpassword']) && isset($_POST['newpassword']))
                {
                    $oldpassword = $_POST['oldpassword'];
                    $newpassword = $_POST['newpassword'];

                    $query = "UPDATE user SET password='$newpassword' WHERE username='$username' AND password='$oldpassword'";

                    $result = mysqli_query($con, $query) or die(mysqli_error());

                    echo $result;

                    echo "Password is changed! :D";
                }
            }
            
            
        } else {
            header("Location: login.php");
        } 
         ?>
    </body>
</html>