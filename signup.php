<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include '_dbconnect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    

    $existsSql = "SELECT * FROM `user_detail` WHERE username='$username'";
    $result = mysqli_query($conn, $existsSql);
    $numExistsRows = mysqli_num_rows($result);
    if($numExistsRows>0){
        $showError = "Username Already exists";
    }
else{
    if ($password == $confirmPassword) {
        $hash=password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user_detail` ( `username`, `email`, `password`) VALUES ( '$username', '$email', '$hash')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        }
    } else {
        $showError = "Password do not match";
    }}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<?php include 'navbar.php';?>
    <?php

    if ($showAlert) {
        echo '<div class="alert alert-success" role="alert">
        Registration Successfull
      </div>';
    }
    if ($showError) {
        echo '<div class="alert alert-danger" role="alert">
        '.$showError.'
      </div>';
    }

    ?>
    
    
    <div id="box">
        <div id="box1">
            <h1 style="margin-top: 50px; margin-left: 80px;">Sign Up</h1>
            <form id="signupForm" action="signup.php" method="post" onsubmit="return validateForm()">
                <div id="box11">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    <input class="field" type="email" name="email" placeholder="Enter Email" required>
                    <input class="field" type="text" name="username" placeholder="Enter Username" required>
                    <input class="field" type="password" name="password" placeholder="Enter Password " required>
                    <input class="field" type="password" name="confirmPassword" placeholder="Confirm Password "
                        required>
                    <div style="display: flex; flex-direction: row; margin-top: 10px;">
                        <p>Already have an account? </p><a style=" margin-left: 5px;"
                            href="login.php">Login here</a>
                    </div>

                    <input id="btn" type="submit" value="Submit">
                </div>
            </form>
        </div>
        <div id="box2">
            <img id="img" src="images/Sign up (4).gif" height="95%">
        </div>
    </div>


    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            // Basic email validation
            var emailRegex = /^\S+@\S+\.\S+$/;
            if (!emailRegex.test(email)) {
                alert('Please enter a valid email address.');
                return false;
            }

            // Basic username validation (length > 3)
            if (username.length < 4) {
                alert('Username must be at least 4 characters long.');
                return false;
            }

            // Basic password validation (length > 6)
            if (password.length < 7) {
                alert('Password must be at least 7 characters long.');
                return false;
            }

            // Password and confirm password match
            if (password !== confirmPassword) {
                alert('Password and Confirm Password must match.');
                return false;
            }

            // All validations passed
            return true;
        }
    </script>


</body>

</html>