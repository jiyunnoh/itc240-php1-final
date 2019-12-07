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



if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    header('Location: cities.php');
} //end if isset

$sql = 'SELECT * FROM Cities WHERE CityID = '.$id.'';

#connect to the database
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
die(myerror(__FILE__, __LINE__, mysqli_connect_error()));

#extract the data from the database
$result = mysqli_query($iConn, $sql) or
die(myerror(__FILE__, __LINE__, mysqli_connect_error($iConn)));

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $CityLocation = stripslashes($row['CityLocation']);
        $Rank = stripslashes($row['Rank']);
        $Population = stripslashes($row['Population']);
        $AvgSalary = stripslashes($row['AvgSalary']);
        $QualityOfLife = stripslashes($row['QualityOfLife']);
        $ValueIndex = stripslashes($row['ValueIndex']);
        $Description = stripslashes($row['Description']);
        $Feedback = '';
    } //end while loop
} else {
    $Feedback = 'Sorry, this city does not exist on our list';
} // end if statement

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

<main style="margin-bottom:32px;">
<h1><?php echo $CityLocation; ?></h1>
<img style="width:500px;" src="images/<?php echo $id; ?>.jpg" alt="<?php echo $CityLocation; ?>">

<?php
echo '<ul style="margin-bottom:16px;">';
echo '<li><strong>Rank: </strong>'.$Rank.'</li>';
echo '<li><strong>Population: </strong>'.$Population.'</li>';
echo '<li><strong>Average Salary: </strong>'.$AvgSalary.'</li>';
echo '<li><strong>Quality Of Life: </strong>'.$QualityOfLife.'</li>';
echo '<li><strong>Value Index: </strong>'.$ValueIndex.'</li>';
echo '</ul>';

echo '<p>'.$Description.'</p>';

echo '<a href="cities.php">Go Back</a>';
?>
</main>


<?php 
#release web server
@mysqli_free_result($result);

#close the connection
@mysqli_close($iConn);

include('includes/footer.php');
?>