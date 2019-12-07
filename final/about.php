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

<!-- communicate to the logged in user -->
<?php
if(isset($_SESSION['UserName'])) : ?>
<p style="margin-bottom:0"><strong><?php echo $_SESSION['UserName']; ?></strong></p>
<p style="margin-bottom:0">You are still logged on!</p>
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

<h1 class="center"> About our web site</h1>
<h2 class="center">Are you looking for the best city to move? Welcome!</h2>
<h3 class="center">We have top ranked cities to live in U.S.</h3>
<h3 class="center">And check out best cities in the world everyday!</h3>
<img class="center" src="images/4cities.jpg" alt="Cities">


<?php include('includes/footer.php'); ?>