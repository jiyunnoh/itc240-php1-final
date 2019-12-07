<?php 
include('server.php');
include('includes/header.php'); ?>

<header></header>

<nav>
<ul>
<?php echo makeLinks($nav); ?>
</ul>
</nav>

<div id="wrapper">

<h1 style="padding-left: 120px;">Register</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<label>First Name</label>
<input type="text" name="FirstName" value="<?php echo htmlspecialchars($_POST['FirstName']); ?>">
<label>Last Name</label>
<input type="text" name="LastName" value="<?php echo htmlspecialchars($_POST['LastName']); ?>">
<label>User Name</label>
<input type="text" name="UserName" value="<?php echo htmlspecialchars($_POST['UserName']); ?>">
<label>Email</label>
<input type="email" name="Email" value="<?php echo htmlspecialchars($_POST['Email']); ?>">
<label>Password</label>
<input type="password" name="Password_1">
<label>Confirm Password</label>
<input type="password" name="Password_2" class="d-block">
<button type="submit" name="reg_user" class="m-t-1">Register</button>

<?php include('errors.php'); ?>

</fieldset>
</form>

<p class="text-center italic" style="padding-left: 120px; margin-top: 16px;">Already a member? 
<a href="login.php">Sign in!</a></p>

<?php include('includes/footer.php'); ?>