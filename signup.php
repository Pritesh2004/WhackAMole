<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
   

    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $conn =new mysqli('localhost','root','','whack_a_mole','3306');
    if($conn->connect_error){
        die('Connection failed :'.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into signup(username,email,password,confirmPassword)values(?,?,?,?)");
        $stmt->bind_param("ssss",$username,$email,$password,$confirmPassword);
        $stmt->execute();
        echo "Registration successfull.....";
        $stmt ->close();
        $conn->close();
    }

?>