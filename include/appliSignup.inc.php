<?php
include "../include/session.inc.php";


//sjekker at brukeren har sendt formen ved hjelp av post metode
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit"])){


        //tar tak i data fra arbeidsgiver og putter dem inn i variabler som jeg kan sjekke 
        $firstName = htmlentities($_POST["firstName"], ENT_QUOTES, 'UTF-8');
        $lastName = htmlentities($_POST["lastName"], ENT_QUOTES, 'UTF-8');
        $email = htmlentities($_POST["email"], ENT_QUOTES, 'UTF-8');
        $city = htmlentities($_POST["city"], ENT_QUOTES, 'UTF-8');
        $password = htmlentities($_POST["password"], ENT_QUOTES, 'UTF-8');
        $cpassword = htmlentities($_POST["cpassword"], ENT_QUOTES, 'UTF-8');

        //initialiserer appliSignup controller klassen fra kontrolleren
require_once "../include/dbConfig.inc.php";
include "../classes/applSignup.class.php";
include "../controllers/appliSignup.con.php";


$appliSignup= new appliSignupController($firstName, $lastName, $email, $city,$password, $cpassword);


//validering av input
$appliSignup->signupUser(); //signupUser function from the controller

}




 


?>