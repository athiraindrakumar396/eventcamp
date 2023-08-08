<?php

$host= "localhost";
$user= "root";
$password = "root";

$dbName = "eventcamp";

$conn = mysqli_connect($host, $user, $password, $dbName);

if (!$conn) {
	echo "Connection failed!";
}

$query = "CREATE TABLE IF NOT EXISTS users (
	id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	password varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id),
	UNIQUE KEY email (email)
)";
$conn->query($query);

$postQuery = "CREATE TABLE IF NOT EXISTS posts (
	id int(11) NOT NULL AUTO_INCREMENT,
	user_id int(11) NOT NULL ,
	title varchar(255) NOT NULL,
	content LONGTEXT NOT NULL,
	logo varchar(255) NOT NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
)";
$conn->query($postQuery);