<?php
session_start();
include('config.php');

$FirstName = '';
$LastName = '';
$UserName = '';
$Email = '';
$errors = array();

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

//register our user
if(isset($_POST['reg_user'])) {
    //we are going to receive input values from our form
        $FirstName = mysqli_real_escape_string($db, $_POST['FirstName']);
        $LastName = mysqli_real_escape_string($db, $_POST['LastName']);
        $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
        $Email = mysqli_real_escape_string($db, $_POST['Email']);
        $Password_1 = mysqli_real_escape_string($db, $_POST['Password_1']);
        $Password_2 = mysqli_real_escape_string($db, $_POST['Password_2']);

    //form validation - we want to make sure that form is filled out
    //array push
    if(empty($FirstName)) {
        array_push($errors, 'First Name is required');
    }//end if empty

    if(empty($LastName)) {
        array_push($errors, 'Last Name is required');
    }//end if empty

    if(empty($UserName)) {
        array_push($errors, 'User Name is required');
    }//end if empty

    if(empty($Email)) {
        array_push($errors, 'Email is required');
    }//end if empty

    if(empty($Password_1)) {
        array_push($errors, 'Password is required');
    }//end if empty

    if($Password_1 != $Password_2) {
        array_push($errors, 'Password does not match');
    }//end if

    //we need to make sure that the username or email does not exist
    $user_check_query = "SELECT * FROM users WHERE UserName = '$UserName' OR Email = '$Email' LIMIT 1 ";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    //if username or email already exist, errors
    if($user) {
        if($user['UserName'] == $UserName) {
            array_push($errors, 'Username already exists');
        }

        if($user['$Email'] == $Email) {
            array_push($errors, 'Email already exists');
        }
    } //end if user

    //if there are ZERO errors, Good to submit
    if(count($errors) == 0) {
        $Password = md5($Password_1); //encrypt the password before saving to the database
        $query = "INSERT INTO users (FirstName, LastName, UserName, Email, Password)
        VALUES ('$FirstName', '$LastName', '$UserName', '$Email', '$Password')";

        mysqli_query($db, $query);

        $_SESSION['UserName'] = $UserName;
        $_SESSION['success'] = 'Welcome! You are now logged in.';

        header('Location: index.php');
    } //end if count
} //end if isset

if(isset($_POST['login_user'])) {
    $UserName = mysqli_real_escape_string($db, $_POST['UserName']);
    $Password = mysqli_real_escape_string($db, $_POST['Password']);

    if(empty($UserName)) {
        array_push($errors, 'Username is required');
    }

    if(empty($Password)) {
        array_push($errors, 'Password is required');
    }

    //if we have zero errors, good to go
    if(count($errors) == 0) {
        $Password = md5($Password); //encrypting the password
        $query = "SELECT * FROM users WHERE UserName = '$UserName' AND password = '$Password'"; //button name is 'password'
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) == 1) {
            $_SESSION['UserName'] = $UserName;
            $_SESSION['success'] = 'Welcome back! You are now logged in.';
            header('Location: index.php');
        } else {
            array_push($errors, 'Wrong username/password combination');
        } //end else
    }//end if count
}//end if isset

?>