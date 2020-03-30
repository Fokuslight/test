<?php 
function clear() {
	global $db;
	foreach($_POST as $key => $value) {
		$_POST[$key] = mysqli_real_escape_string($db, $value);
	}
}

function insert_rolename() {
	global $db;
	clear();
	extract($_POST);
	$query = "INSERT INTO user_role (rolename) VALUES ('$rolename')";
	mysqli_query($db, $query);
}

function insert_user() {
	global $db;
	clear();
	extract($_POST);
	$query = "INSERT INTO user (username, role_id) VALUES ('$username', '$role_id')";
	mysqli_query($db, $query);
}

function get_user_role_from_db() {
	global $db;
	$query = "SELECT * FROM user_role ORDER BY id DESC";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function get_users_from_db() {
	global $db;
	$query = "SELECT * FROM user ORDER BY id DESC";
	$res = mysqli_query($db, $query);
	return mysqli_fetch_all($res, MYSQLI_ASSOC);
}