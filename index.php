<?php
include "db.php";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $exist = mysqli_query(
        $conn,
        "SELECT * FROM Student WHERE email='$email'"
    );

    if (mysqli_num_rows($exist) > 0) {
        echo 'Email already exist!';
    } else {

        mysqli_query(
            $conn,
            "INSERT INTO Student (name,email,password) VALUES ('$name','$email','$password')"
        );
        header("Location:login.php");
    }
} else {
    echo 'Register failed';
}

?>



<h1>Register Form</h1>
<form method="POST">
    <p>
        <label for="n">Enter name</label>
        <input type="text" name="name" id="n" placeholder="Enter your name">
    </p>

    <p>
        <label for="e">Enter email</label>
        <input type="email" name="email" id="e" placeholder="Enter email">
    </p>

    <p>
        <label for="p">Enter password</label>
        <input type="password" name="password" id="p" placeholder="*****">
    </p>

    <button name="register">Register</button>


</form>