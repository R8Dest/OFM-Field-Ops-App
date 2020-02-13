<?php
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	include_once "./get.php";
}
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	include_once "./post.php";
}
else if ($_SERVER["REQUEST_METHOD"] == "DELETE")
{
	include_once "./delete.php";
}
else if ($_SERVER["REQUEST_METHOD"] == "PUT")
{
	include_once "./put.php";
}
else if ($_SERVER["REQUEST_METHOD"] == "PATCH")
{
	include_once "./patch.php";
}