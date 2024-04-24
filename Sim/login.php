<?php
require 'config.php';
if(isset($_POST["submit"]))
{
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM person WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){
        if($password == $row["password"])
        {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: index.php");
        }
        else{
            echo "<script>alert('Wrong Password');</script>";
        }
    }
    else{
        echo "<script>alert('Username not Registered');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
        <meta charset="urf-8">
        <title>Login Page</title>
        <link rel="stylesheet" href="style.css">
</head>
    <body>
        <h3> Login Here!</h3>
        <form class="" action=""method="post" autocomplete="off">
            <label for="usernameemail">Username or Email : </label>
            <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
            <label for="password">Password : </label>
            <input type="password" name="password" id = "password" required value=""> <br>
            <button type="submit" name="submit"> Submit</button>
        </form>
        <br>
        <a href="registration.php">Register</a>
    </body>
</html>