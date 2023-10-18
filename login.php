<?php
   $login=false;
   $showError=false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include '_dbconnect.php';
    $username = $_POST["username"];

    $password = $_POST["password"];


    $sql = "Select * from user_detail where username='$username' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

 
    if ($num == 1) {
        while($row=mysqli_fetch_assoc($result)){

            if(password_verify($password, $row['password'])){
                $login = true;
                session_start();
                
                $_SESSION['loggedin'] =true;
                $_SESSION['username']=$username;
                header("location: game.php");
            }
            else {
                $showError = true;
            }

        }
       
        
    } else {
        $showError = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<?php include 'navbar.php';?>
    <?php

    if ($login) {
        echo '<div class="alert alert-success" role="alert">
    Login Successfull
  </div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger" role="alert">
    Invalid Username and Password
  </div>';
    }

    ?>
    
    
    <div id="box">
        <div id="box1">
            <h1 style="margin-top: 80px; margin-left: 80px;">Login</h1>
            <form name="f1" action="login.php" onsubmit="return validation()" method="POST">
                <div id="box11">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input class="field" type="text" name="username" id="username" placeholder="Enter Username "
                        required>
                    <input class="field" type="password" name="password" id="password" placeholder="Enter Password"
                        required>
                    <div style="display: flex; flex-direction: row; margin-top: 30px;">
                        <p>Don't have an account? </p><a style=" margin-left: 5px;"
                            href="signup.php">Singup here</a>
                    </div>

                    <input id="btn" type="submit" value="Submit">
                </div>
            </form>
        </div>
        <div id="box2">
            <img src="images/login.gif" id="img" height="90%">
        </div>
    </div>
    <script>
        function validation() {
            var id = document.f1.username.value;
            var ps = document.f1.password.value;
            if (id.length == "" && ps.length == "") {
                alert("User Name and Password fields are empty");
                return false;
            }
            else {
                if (id.length == "") {
                    alert("User Name is empty");
                    return false;
                }
                if (ps.length == "") {
                    alert("Password field is empty");
                    return false;
                }
            }
        }  
    </script>
</body>

</html>