<?php
$conn = new mysqli("localhost", "root", "", "sqli_lab");

if ($_POST) {
    $user = $_POST['username'];
    $query = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Login Successful";
    } else {
        echo "Login Failed";
    }
}
?>

<form method="POST">
    <input name="username" placeholder="username">
    <button type="submit">Login</button>
</form>
