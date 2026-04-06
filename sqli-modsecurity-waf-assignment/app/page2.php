<?php
$conn = new mysqli("localhost", "root", "", "sqli_lab");

if ($_POST) {
    $user = $_POST['username'];
    $query = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($query);

    echo ($result->num_rows > 0) ? "Login Successful" : "Login Failed";
}
?>

<form method="POST">
    <input name="username">
    <button type="submit">Login</button>
</form>
