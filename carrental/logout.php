<?php
session_start();
if (isset($_SESSION['email'])) {
	# code...
	unset($_SESSION['email']);
}
header("Location: index.html");
die;