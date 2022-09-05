<?php
include_once 'config/config.php';

$connInfo = [
    "host" => DB_HOST,
    "dbname" => DB_NAME,
    "user" => DB_USER,
    "password" => DB_PASSWORD
];
$connString = assembleInfo($connInfo);
$conn = pg_connect($connString)
          or die('Could not connect: ' . print_r(error_get_last()));
$query = "CREATE TABLE [IF NOT EXISTS] table_name (
    id SERIAL PRIMARY_KEY
    internal_id CHAR(9),
    rank INT,
    title VARCHAR(200),
    year INT,
    img VARCHAR(1500),
    crew VARCHAR(500),
    rating FLOAT,
    rating_count INT
 );";

 pg_query($conn, $query);

?>