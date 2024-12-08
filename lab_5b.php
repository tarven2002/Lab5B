<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <form action="connect.php" method="POST">
        <label for="matric">Matric: </label>
        <input type="text" name="matric" id="matric" required>
        <br>

        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required>
        <br>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" required>
        <br>

        <label for="role">Role: </label>
        <select name="role" id="role" required>
            <option value="" disabled selected>Select option</option>
            <option value="student">Student</option>
            <option value="lecturer">Lecturer</option>
        </select>
        <br>
        
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
