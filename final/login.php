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

<h1 style="padding-left: 120px;">Login!</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
<fieldset>
<label>Username</label>
<input type="text" name="UserName" value="<?php echo htmlspecialchars($UserName); ?>">
<label>Password</label>
<input type="password" name="Password" class="d-block">
<?php include('errors.php'); ?>
<button type="submit" name="login_user" class="m-t-1">Login</button>
<button type="button" onclick="window.location.href='
<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'">Reset</button>

</fieldset>
</form>

<p class="text-center italic" style="padding-left: 120px; margin-top: 16px;">Not yet a member? 
<a href="register.php">Sign up!</a></p>

<?php include('includes/footer.php'); ?>