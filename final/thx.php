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

<main>
<h1>Thank you for submitting the form!</h1>


</main>

<aside>
</aside>

<?php include('includes/footer.php'); ?>