<?php
 function checkSignupErrors(){

    if(isset($_SESSION["signup_errors"])){
        $errors= $_SESSION["signup_errors"];

echo "<br>";

foreach($errors as $error ){
echo "<p>". $error."</p>";
}

        unset($_SESSION["signup_errors"]);
    }
    else if(isset($_GET["signup"]) && $_GET["signup"] ==="success"){
echo "<br>";
echo "signup Success";


    }
  }
?>