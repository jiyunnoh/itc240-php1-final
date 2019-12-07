<?php

ob_start(); //preventing header errors before reading the whole page
define('DEBUG', 'TRUE'); //We want to see all the errors
include('credentials.php');

function myerror($myFile, $myLine, $errorMsg) {
    if(defined('DEBUG') && DEBUG) {
        echo"Error in file: <b>".$myFile."</b> on line: <b>".$myLine."</b><br />";
        echo"Error Message: <b>".$errorMsg."</b><br />";
        die();
    } else {
        echo "I'm sorry, we have encountered an error. ";
        die();
    } //end if
} //end function myerror


define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily';
$nav['cities.php'] = 'Cities';
$nav['contact.php'] = 'Contact';

function makeLinks($nav) {
    $myReturn = '';
    foreach ($nav as $key => $value) {
        if(THIS_PAGE == $key) {
            $myReturn .= '<li><a class="active" href="'.$key.'">'.$value.'</a></li>';
            //   .= concatenation!!!!!!!!!!
        } else {
            $myReturn .= '<li><a href="'.$key.'">'.$value.'</a></li>'; 
        } //end if
    } //end foreach
    return $myReturn;
} //end function makeLinks


if(isset($_GET['today'])) {
    $today = $_GET['today'];
} else {
    $today = date('l');
} //end if isset



//SWITCH!!!

switch($today) {
    case 'Sunday':
    $day = 'Sunday';
    $place = 'Patagonia, Argentina and Chile';
    $pic = 'patagonia.jpg';
    $alt = 'Patagonia, Argentina and Chile';
    $switch = 'Best city to go camping in the world'; 
    $info = 'South America’s southern tip, spanning both Argentina and Chile, is as wild as it gets 
    and a great destination for anyone with an adventurous spirit. Follow the RN-40 
    to discover campsites with wide open skies and snow-capped mountain vistas; this pristine landscape begs 
    for outdoor exploration.';
    break;

    case 'Monday':
    $day = 'Monday';
    $place = 'Calgary, Canada';
    $pic = 'calgary.jpg';
    $alt = 'Calgary, Canada';
    $switch = 'Best cleanest city in the world'; 
    $info = 'Over 1.2 million people live in the city that is at the confluence of the Bow River 
    and the Elbow River. The city has ample parks, wonderfully clean streets and is a joy to walk around.';
    break;

    case 'Tuesday':
    $day = 'Tuesday';
    $place = 'Copenhagen, Denmark';
    $pic = 'copenhagen.jpg';
    $alt = 'Copenhagen, Denmark';
    $switch = 'Best city for artists in the world'; 
    $info = 'Many artist-run exhibition spaces Extensive support from the Danish Arts Foundation Copenhagen 
    consistently ranks high on lists of the most livable places in the world. But it also offers 
    a healthy art community with many artist-run exhibition spaces and artist collectives, 
    making it one of the top places for artists to live. Their number has been growing in recent years, 
    partly due to support programs. The Danish Arts Foundation, for example, offers to pay the running costs 
    of new exhibition spaces for up to two years.';
    break;

    case 'Wednesday':
    $day = 'Wednesday';
    $place = 'Vienna, Austria';
    $pic = 'vienna.jpg';
    $alt = 'Vienna, Austria';
    $switch = 'Best city for coffee in the world'; 
    $info = 'When it comes to coffee, Vienna goes hard: the city had its coffee shops listed as 
    “intangible heritage” by UNESCO in 2011. Vienna cafes pride themselves on their atmosphere, 
    taking the furnishings and decoration of shop interiors quite seriously. These spaces are great social 
    or people-watching atmospheres. Viennese particular enjoy cappuccinos and espresso drinks, 
    as well as the local Wiener Melange (“one espresso shot served in a large coffee cup topped 
    with steamed milk and milk foam“). Top places: Cafe Neko, Cafe Korb, Cafe Weimar ';
    break;

    case 'Thursday':
    $day = 'Thursday';
    $place = 'New York City, USA';
    $pic = 'newyork.jpg';
    $alt = 'New York City, USA';
    $switch = 'Best city to go shopping in the world'; 
    $info = 'It is considered to be the best all-round shopping destination of the world for a reason. 
    Lined up with hundreds of international brands, there are thousands of boutiques, vintage shops 
    which are exclusive to the city. Try out malls such as Time Warner Centre, SoHo boutiques, pop-up shops 
    in Byrant Park and Union Square for a majestic experience.';
    break;

    case 'Friday':
    $day = 'Friday';
    $place = 'Ibiza, Spain';
    $pic = 'ibiza.jpg';
    $alt = 'Ibiza, Spain';
    $switch = 'Best city to party in the world'; 
    $info = 'This place is home to tons of beaches and also to a lot of clubs. 
    This land of sunshine gives you the best clubs around the world to party. 
    With best DJs all around the year, you can easily find a place of your liking with 
    just the right type of music for you to dance to. The list of party places in Ibiza is endless 
    and one is hardly able to choose one over the other because all of them are top-notch. 
    Also known as ‘clubbing capital of the world’, this place has everything for a perfect party. 
    From great booze to countless clubs to beautiful beaches and some great music, you name it! 
    There are also a lot of underground parties happening at discrete locations. 
    You can get access to them in hippy markets.';
    break;

    case 'Saturday':
    $day = 'Saturday';
    $place = 'Paris, France in the world';
    $pic = 'paris.jpg';
    $alt = 'Paris, France';
    $switch = 'Best city to eat'; 
    $info = 'In the French capital, start with pastries for breakfast, go for lunch in a typical French 
    brasserie, enjoy macarons, caramels and chocolates in the afternoon, and finish the day with 
    a gourmet dinner at one of the many haute cuisine establishments.';
    break;

} // end switch



//FORM!!!!!!!
$name = $email = $gender = $factors = $region = '';
$nameErr = $emailErr = $genderErr = $factorsErr = $regionErr = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    if(empty($_POST['name'])) {
        $nameErr = '<p class="error">Please fill out your name.</p>';
    } else {
        $name = $_POST['name'];
    }

    if(empty($_POST['email'])) {
        $emailErr = '<p class="error">Please fill out your email.</p>';
    } else {
        $email = $_POST['email'];
    }

    if(empty($_POST['gender'])) {
        $genderErr = '<p class="error">Please check your gender.</p>';
    } else {
        $gender = $_POST['gender'];
    }

    if(empty($_POST['factors'])) {
        $factorsErr = '<p class="error">Please check your factors.</p>';
    } else {
        $factors = $_POST['factors'];
    }

    if($_POST['region'] == 'NULL') {
        $regionErr = '<p class="error">Please select your region.</p>';
    } else {
        $region = $_POST['region'];
    }

    if(isset($_POST['name'], $_POST['email'], $_POST['gender'], $_POST['factors'], $_POST['region'])) {

        function myFactors() {
            $myReturn = '';
            if(!empty($_POST['factors'])) {
                $myReturn = implode(',', $_POST['factors']);
            } return $myReturn;
        } // end function myFactors

        $to = 'ianjy1127@gmail.com, szemeo@mystudentswa.com';
        $subject = 'Test Email ' .date("m/d/y");
        $body = 'Hello, '.$name.'. Thank you for submitting the form.'.PHP_EOL.'';
        $body .= 'Your email: '.$email.''.PHP_EOL.'';
        $body .= 'Your gender: '.$gender.''.PHP_EOL.'';
        $body .= 'Your factors: '.myFactors().''.PHP_EOL.'';
        $body .= 'Your region: '.$region.'';
        $headers = array(
            'From' => 'no-reply@webdesignbyjy.com',
            'Reply to' => ''.$email.'' );

        if($_POST['name']!='' && $_POST['email']!='' && $_POST['gender']!='' && 
            $_POST['factors']!='' && $_POST['region']) {
                mail($to, $subject, $body, $headers);
                header('Location: thx.php');
        } // end if

    } // end if isset
} // end if server request


