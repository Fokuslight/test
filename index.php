<!DOCTYPE html>
<html lang="en">
<?php error_reporting(-1); ?>
<head>
	<meta charset="UTF-8">
	<title>Test</title>
</head>
<?php require_once 'connect.php'; ?>
<?php require_once 'funcs.php'; ?>
<?php if(!empty($_POST)) : 
	isset($_POST['submit_user']) ? insert_user() : insert_rolename();
	header("Location: {$_SERVER['PHP_SELF']}"); 
	exit(); 
endif; ?>
<?php $users = get_users_from_db(); ?>
<?php $roles = get_user_role_from_db(); ?>

<style>
	body{padding: 100px;}
	div{margin-bottom: 40px;}
</style>
<body>
	<?php if (!empty($roles)) : ?>
	<div>
		<form action="" method="post">
			<h3>Add custom user</h3>
			<input type="text" name="username" id="username">	
				<select name="role_id" id="role_id">						
					<?php foreach ($roles as $role) : ?>
						<option value="<?php echo $role['rolename']; ?>"><?php echo $role['rolename']; ?></option>
					<?php endforeach; ?>
				</select>						
			<input class="submit_user" type="submit" value="submit_user" name="submit_user">
		</form>
	</div>
	<?php endif; ?>
	<div>
		<form action="" method="post">
			<h3>Add custom role</h3>
			<input class="user_role_field" type="text" name="rolename" id="rolename">
			<input class="submit_user_role" type="submit" value="submit_user_role" name="submit_user_role">
		</form>
	</div>	
	<?php if (!empty($users)) : ?>
	<div class="result">
		<h3>All users</h3>		
		<?php foreach ($users as $user) : ?>
			<div>
				<p>User name: <?php echo $user['username']; ?></p>
				<p>User role: <?php echo $user['role_id']; ?></p>
			</div>
		<?php endforeach; ?>		
	</div>
	<?php endif; ?>
</body>
</html>