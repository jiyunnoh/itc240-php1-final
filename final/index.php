<?php 
include('config.php');

session_start();

if(!isset($_SESSION['UserName'])) {
    $_SESSION['msg'] = 'You must log in first';
    header('Location: login.php');
}//end if isset

if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['UserName']);
    header('Location: login.php');
}//end if

include('includes/header.php');
?>



<header>
<div class="box">
<!-- notification message -->
<?php
if(isset($_SESSION['success'])) {
    echo '<p class="red italic"> '.$_SESSION['success'].'</p>';
    unset($_SESSION['success']);
}
?>

<!-- communicate to the logged in user -->
<?php
if(isset($_SESSION['UserName'])) : ?>
<p style="margin-bottom:0"><strong><?php echo $_SESSION['UserName']; ?></strong></p>
<p><a href="index.php?logout='1'">Logout</a></p>
<?php endif; ?>
</div> 

</header>

<nav>
<ul>
<?php echo makeLinks($nav); ?>
</ul>
</nav>

<div id="wrapper">

<h1 class="center">Welcome to Best 50 Cities to Live in U.S.</h1>
<img class="center" src="images/main.jpg" alt="Huntsville, Alabama">


<?php include('includes/footer.php'); ?>