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

<h1 style="padding-left: 120px;">Contact Us!</h1>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
<fieldset>
<label>Name</label>
<input type="text" name="name" value="<?php if(isset($_POST['name'])) {
    echo htmlspecialchars($_POST['name']); } ?>">
<span><?php echo $nameErr; ?></span>

<label>Email</label>
<input type="email" name="email" value="<?php if(isset($_POST['email'])) {
    echo htmlspecialchars($_POST['email']); } ?>">
<span><?php echo $emailErr; ?></span>

<label>Gender</label>
<ul>
<li><input type="radio" name="gender" value="female" <?php 
    if(isset($_POST['gender']) && $_POST['gender'] == 'female') {
        echo 'checked = "checked"'; } ?>>Female</li>
<li><input type="radio" name="gender" value="male" <?php 
    if(isset($_POST['gender']) && $_POST['gender'] == 'male') {
        echo 'checked = "checked"'; } ?>>Male</li>
</ul>
<span><?php echo $genderErr; ?></span>

<label>What factors to consider when moving to new place?</label>
<ul>
<li><input type="checkbox" name="factors[]" value="cost" <?php 
    if(isset($_POST['factors']) && in_array('cost', $factors)) {
        echo 'checked = "checked"'; } ?>>Cost of Living</li>
<li><input type="checkbox" name="factors[]" value="traffic" <?php 
    if(isset($_POST['factors']) && in_array('traffic', $factors)) {
        echo 'checked = "checked"'; } ?>>Traffic</li>
<li><input type="checkbox" name="factors[]" value="healthcare" <?php 
    if(isset($_POST['factors']) && in_array('healthcare', $factors)) {
        echo 'checked = "checked"'; } ?>>Healthcare</li>
<li><input type="checkbox" name="factors[]" value="safety" <?php 
    if(isset($_POST['factors']) && in_array('safety', $factors)) {
        echo 'checked = "checked"'; } ?>>Safety</li>
<li><input type="checkbox" name="factors[]" value="employment" <?php 
    if(isset($_POST['factors']) && in_array('employment', $factors)) {
        echo 'checked = "checked"'; } ?>>Employment</li>
<li><input type="checkbox" name="factors[]" value="education" <?php 
    if(isset($_POST['factors']) && in_array('education', $factors)) {
        echo 'checked = "checked"'; } ?>>Education</li>
<li><input type="checkbox" name="factors[]" value="weather" <?php 
    if(isset($_POST['factors']) && in_array('weather', $factors)) {
        echo 'checked = "checked"'; } ?>>Weather</li>
<li><input type="checkbox" name="factors[]" value="taxes" <?php 
    if(isset($_POST['factors']) && in_array('taxes', $factors)) {
        echo 'checked = "checked"'; } ?>>Taxes</li>
</ul>
<span><?php echo $factorsErr; ?></span>

<label>Region</label>
<select name="region">
<option value="NULL" <?php 
    if(isset($_POST['region']) && $_POST['region'] == 'NULL') {
        echo 'selected = "unselected"'; } ?>>Select your region</option>
<option value="west" <?php 
    if(isset($_POST['region']) && $_POST['region'] == 'west') {
        echo 'selected = "selected"'; } ?>>West</option>
<option value="southwest" <?php 
    if(isset($_POST['region']) && $_POST['region'] == 'southwest') {
        echo 'selected = "selected"'; } ?>>Southwest</option>
<option value="northeast" <?php 
    if(isset($_POST['region']) && $_POST['region'] == 'northeast') {
        echo 'selected = "selected"'; } ?>>Northeast</option>
<option value="southeast" <?php 
    if(isset($_POST['region']) && $_POST['region'] == 'southeast') {
        echo 'selected = "selected"'; } ?>>Southeast</option>
<option value="midwest" <?php 
    if(isset($_POST['region']) && $_POST['region'] == 'midwest') {
        echo 'selected = "selected"'; } ?>>Midwest</option>
<option value="N/A" <?php 
    if(isset($_POST['region']) && $_POST['region'] == 'N/A') {
        echo 'selected = "selected"'; } ?>>N/A</option>
</select>
<span><?php echo $regionErr; ?></span>

<input type="submit" name="submit" value="Submit">
<input type="button" onclick="window.location.href=
'<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>'" value="Reset">

</fieldset>
</form>    



<?php include('includes/footer.php'); ?>