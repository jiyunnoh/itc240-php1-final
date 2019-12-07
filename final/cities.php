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


$sql = 'SELECT * FROM Cities';

#connect to the database
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
die(myerror(__FILE__, __LINE__, mysqli_connect_error()));

#extract the data from the database
$result = mysqli_query($iConn, $sql) or
die(myerror(__FILE__, __LINE__, mysqli_connect_error($iConn)));

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
<h1>Check out best cities to live in U.S.</h1>

<?php
if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<ul class="list">';
        echo '<li><h3 style="margin-bottom: 8px;">More info about <a href="cities-view.php?id='.$row['CityID'].'"> '.$row['CityLocation'].' </a></h3></li>';
        echo '<li><strong>Rank: </strong> '.$row['Rank'].' </li>';
        echo '<li><strong>Population: </strong> '.$row['Population'].' </li>';
        echo '<li><strong>Average Salary: </strong> '.$row['AvgSalary'].' </li>';
        echo '<li><strong>Quality of Life: </strong> '.$row['QualityOfLife'].' </li>';
        echo '<li><strong>Value Index: </strong> '.$row['ValueIndex'].' </li>';
        echo '</ul>';
    } //end while loop
} else {
    echo 'Sorry, the list of movies is empty!';
} // end if statement
?>

</main>

<aside>
<h4>What's in the 5th place?</h4>
<img style="width:300px;" src="images/5.jpg" alt="Des Moines, Iowa">
<h3><a href="cities-view.php?id=5">Visit Des Moines, Iowa</a></h3>
</aside>

<?php 
#release web server
@mysqli_free_result($result);

#close the connection
@mysqli_close($iConn);

include('includes/footer.php');
?>