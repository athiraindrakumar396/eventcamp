<?php

$host= "localhost";
$user= "root";
$password = "root";

$dbName = "eventcamp";

$conn = mysqli_connect($host, $user, $password, $dbName);

if (!$conn) {
	echo "Connection failed!";
}

$query = "CREATE TABLE IF NOT EXISTS USERS (
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	UNIQUE KEY email (email)
)";
$conn->query($query);