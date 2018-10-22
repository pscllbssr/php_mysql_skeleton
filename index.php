<h1>Datenbank-Beispiel</h1>

<?php

// Damit es funktioniert muss erst die Datei example.config.inc.php in config.inc.php umbenannt werden
include "config.inc.php";

// Verbindungsaufbau 
$verbindung = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verbindung überprüfen
if ($verbindung->connect_error) {
    die("Verbindung fehlgeschlagen: " . $verbindung->connect_error);
} 

// Query in Variable speichern
$sql = "SELECT * FROM user";

// Query an Datenbank senden
$resultat = $verbindung->query($sql);

// Überprüfung, ob Resultate vorhanden sind
if (@$resultat->num_rows > 0) {

    echo '<table border="1">';
    
    // Mit fetch_assoc() wird eine Zeile ausgelesen
    // In einer While-Schlaufe verpackt, wird das Resultat
    // solange ausgelesen, wie Zeilen vorhanden sind
    while($zeile = $resultat->fetch_assoc()) {
    
        // Die Ausgabe erfolgt normalerweise in HTML und kann irgendwo eingefügt werden
        // Die Felder können nach folgendem Schema abgerufen werden
        echo "<tr>";
        echo "<td>{$zeile["firstName"]}</td><td>{$zeile["lastName"]}</td><td>{$zeile["eMail"]}</td>";
        echo "</tr>";
          
    }

    echo '</table>';

} else {
    echo "0 Resultate";
}
    
// Die Verbindung wird wieder geschlossen
$verbindung->close(); 
    
?>
