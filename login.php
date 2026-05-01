<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $email=$_POST['email'];
    $password=$_POST['password'];

    $result=mysqli_query($conn,
        "SELECT * FROM Student WHERE email='$email'"
    );

    $user=mysqli_fetch_assoc($result);

    if($user && password_verify($password,$user['password'])){

    $_SESSION['user']=$user['name'];
    
    header("Location:dashboard.php");

    }else{
        echo 'Invalid email or password';
    };
}
?>
<h1>Login form</h1>

<form method="POST">

    <p>
        <label for="e">Enter email</label>
        <input type="email" name="email" id="e">
    </p>

    <p>
        <label for="p">Enter password</label>
        <input type="password" name="password" id="p">
    </p>


    <button name="login">Login</button>


</form>