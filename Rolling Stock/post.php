<?php
if (!isset($_POST["username"]) || !isset($_POST["password"]))
{
	// bad data
	http_response_code(400);
	die("Invalid data....missing parameters");
}
else
{
    $username = $_POST["username"];
	$password = $_POST["password"];
	if("$password" == "secret")
	   header("Location: ./selection.html");
	   //echo 'SHA-512 (with rounds): ' . crypt("$password", '$6$rounds=1000$YourSaltyStringz$');
    else
        header("Location: /Rolling Stock");
}
