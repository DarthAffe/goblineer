<?php
$servername = '127.0.0.1';
$username = 'root';
$password = 'Andipeti@7';
$schema = 'wowah';
$apiKey = '6szbehcvdvjn8eccd2s496sr92956c87';
$realmName = 'ragnaros';
$realmRegion = 'eu';



$conn = new mysqli($servername, $username, $password, $schema);
$conn->set_charset('utf8');
if ($conn->connect_error) {
   die('Connection failed: ' . $conn->connect_error);
}
