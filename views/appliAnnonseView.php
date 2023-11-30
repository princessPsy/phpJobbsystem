<?php include "..\include\header.inc.html"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body>
    <!--ikke ferdig-->
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hent den valgte stillingen fra skjemaet
    $valgtStilling = $_POST["stilling"];

    // Simulerer henting av stillingsinformasjon fra en database eller annen kilde
    $stillingInfo = array(
        "webutvikler" => array("tittel" => "Webutvikler", "sted" => "Oslo", "beskrivelse" => "Vi søker en erfaren webutvikler."),
        "markedsforing" => array("tittel" => "Markedsføringsansvarlig", "sted" => "Bergen", "beskrivelse" => "Ansvarlig for markedsføringsstrategier."),
        "prosjektleder" => array("tittel" => "Prosjektleder", "sted" => "Trondheim", "beskrivelse" => "Ledelse av prosjekter innen teknologi."),
    );

    // Sjekk om valgt stilling eksisterer i $stillingInfo-arrayen
    if (array_key_exists($valgtStilling, $stillingInfo)) {
        // Vis informasjon om valgt stilling
        $stilling = $stillingInfo[$valgtStilling];
        echo "<h2>{$stilling['tittel']}</h2>";
        echo "<p><strong>Sted:</strong> {$stilling['sted']}</p>";
        echo "<p><strong>Beskrivelse:</strong> {$stilling['beskrivelse']}</p>";
    } else {
        echo "Ugyldig stilling valgt.";
    }
}
?>
