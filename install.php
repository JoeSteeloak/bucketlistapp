<?php 
include("includes/config.php");

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

if ($db->connect_error) {
    die("Connection failed:". $db->connect_error);
}

// Skapa tabell
$sql = "
DROP TABLE IF EXISTS bucketlist;    
CREATE TABLE bucketlist(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    activity VARCHAR(50) NOT NULL,
    description VARCHAR(128) NOT NULL,
    priority INT(1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP()
);";

// Lägg till data
$sql .= "INSERT INTO bucketlist(activity, description, priority)VALUES('Bungeejump', 'Hoppa bungejump från en bro', '3');";

// Skicka SQL-frågan till server
if($db->multi_query($sql)) {
    echo"Tabell skapad OK!";
} else {    
    echo "Fel vid skapande av tabell!";
}