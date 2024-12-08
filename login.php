<?php
session_start();

$con = mysqli_connect('localhost', 'root', '', 'Lab_5b');
if (!$con) 
{
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) 
{
    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `matric` = '$matric'";
    $result = mysqli_query($con, $sql);

    if ($result && mysqli_num_rows($result) > 0) 
    {
        $_SESSION['logged_in'] = true;
        $_SESSION['matric'] = $matric; 

        header("Location: view_users.php");
        exit();
    } 
    
    else
    {
        $error_message = "Invalid username or password.";
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php
        if (isset($error_message)) 
        {
            echo "<p class='error-message'>$error_message</p>";
        }
        ?>
        <form action="" method="POST" class="login-form">
            <label for="matric">Matric: </label>
            <input type="text" name="matric" id="matric" required><br><br>

            <label for="password">Password: </label>
            <input type="password" name="password" id="password" required><br><br>

            <input type="submit" name="login" value="Login" class="login-button">
        </form>
        <br>
        <a href="lab_5b.php" class="register-link">Register here</a> if you have not.
    </div>
</body>
</html>