<link rel="stylesheet" href="index.css">
<?php
session_start(); 

if (!isset($_SESSION['logged_in'])) 
{
    header("Location: login.php");
    exit();
}

$con = mysqli_connect('localhost', 'root', '', 'Lab_5b');

if (!$con) 
{
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `users`";
$result = mysqli_query($con, $sql);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logout'])) 
{
    session_destroy();
    header("Location: login.php");
    exit();
}

echo "<div style='font-family: Arial, sans-serif; max-width: 80%; margin: 20px auto;'>";
echo "<h2 style='text-align: center; color: #4caf50;'>User List</h2>";

echo "<table border='1' style='width: 100%; border-collapse: collapse; margin-top: 20px;'>
        <tr style='background-color: #4caf50; color: white;'>
            <th style='padding: 10px;'>Matric</th>
            <th style='padding: 10px;'>Name</th>
            <th style='padding: 10px;'>Level</th>
            <th style='padding: 10px;'>Action</th>
            <th style='padding: 10px;'>Action</th>
        </tr>";

if (mysqli_num_rows($result) > 0) 
{
    while ($row = mysqli_fetch_assoc($result)) 
    {
        echo "<tr style='text-align: center;'>
                <td style='padding: 10px; border: 1px solid #ddd;'>{$row['matric']}</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>{$row['name']}</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>{$row['role']}</td>
                <td style='padding: 10px; border: 1px solid #ddd;'>
                    <a href='update_user.php?matric={$row['matric']}' style='text-decoration: none; color: #4caf50; font-weight: bold;'>Update</a>
                </td>
                <td style='padding: 10px; border: 1px solid #ddd;'>
                    <a href='delete_user.php?matric={$row['matric']}' onclick='return confirm(\"Are you sure you want to delete this user?\")' style='text-decoration: none; color: red; font-weight: bold;'>Delete</a>
                </td>
              </tr>";
    }
} 

else 
{
    echo "<tr>
            <td colspan='5' style='text-align: center; padding: 20px; border: 1px solid #ddd; color: #555;'>No users found</td>
          </tr>";
}

echo "</table>";
echo "<br>";

echo "<div style='text-align: center; margin-top: 20px;'>
        <form action='' method='POST'>
            <input type='submit' name='logout' value='Logout' style='padding: 10px 20px; background-color: red; color: white; border: none; cursor: pointer; font-size: 16px; border-radius: 5px;'>
        </form>
      </div>";

echo "</div>";

mysqli_close($con);
?>
