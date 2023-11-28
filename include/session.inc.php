<?php
//I denne filen etableres ulik funksjonalitet for å forbedre sikkerheten til sessions for brukere i vårt system
//session skal kunn starte etter at en bruker har logget inn riktig 
//ini_set(); - Her setter jeg nye innstillinger for php.ini filen på serveren    
ini_set('session.use_only_cookies',1); //aktiverer use only_cookies slik at em session kun starter ETTER
                                      // at en cookie(informasjonskapsel) er oppdaget. (1 betyr true eller aktiv)  

ini_set('session.use_strict_mode',1);  //Å aktivere strict_mode sørge for at session-id bare godtas
                                       // hvis den kommer fra en session som er startet av samme server.


// her setter jeg parametere for å bestemme hvordan informasjonen 
//som blir samlet med cookies gjennom økten blir brukt 

session_set_cookie_params([
  
    'lifetime' => 1800, //en session skal avsluttes etter 1800 sek./30 min
   
    'domain' => 'localhost', //gjør at serveren bare får cookies fra localhost hvor nettsiden ligger ikke andre domener 
   
    'path'=> '/', // gjør at cookies blir tilgjengelig for hele nettstiden dvs. alle sider
    
    'secure'=> true,//Gjør cookies bare tilgjengelig over sikre (HTTPS) tilkoblinger, og ikke over usikre (HTTP) tilkoblinger.
    
    'httponly'=> true //gjør at cookies kun blir sendt med HTTP spørringer IKKE Javascript som brukere kan skrive for
    // å få tak i informasjonen i cookies
]);

session_start(); //Nå som sikkerheten ovenfor er etablert kan vi starte en session
echo "session started";
 
//denne funksjonen lagrer brukerinfo inni separate session varibler for jobbsøker og arbeidsgiver
function saveUserDataToSession($firstName, $lastName, $email, $city, $userType, $orgNumber = null) {
  session_start();
   if ($userType == 'Jobbsøker') {
       $_SESSION['user_data'] = array(
           'firstName' => $firstName,
           'lastName' => $lastName,
           'email' => $email,
           'city' => $city,
           'userType' => $userType,
           // You can omit 'orgNumber' for Jobbsøker
       );
   } elseif ($userType == 'Arbeidsgiver') {
       $_SESSION['user_data'] = array(
           'firstName' => $firstName,
           'lastName' => $lastName,
           'email' => $email,
           'city' => $city,
           'userType' => $userType,
           'orgNumber' => $orgNumber,
       );
   } 
}

if(!isset($_SESSION['last_regeneration'])){ //Hvis session variabel 'last_regeneration'ikke er satt kalles                           
    regenerate_session_id();               // funksjonen regenerate_session_id() for å generere på nytt session id.
                            
}
else{                                //Session id skal regenereres til en ny hver halvtime slik at
$timeInterval = 60 * 30;             //det er vanskelig for angripere å få tak i session id
if(time() - $_SESSION['last_regeneration']>=$timeInterval){
    regenerate_session_id();
}

  }

//funksjon for å regenerere session id
  function regenerate_session_id()
  {
    session_regenerate_id();
    $_SESSION['last_regeneration'] = time();
}
  
?>

