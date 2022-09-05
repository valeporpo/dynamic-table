<?php

include_once 'config/config.php';

$connInfo = [
  "host" => DB_HOST,
  "dbname" => DB_NAME,
  "user" => DB_USER,
  "password" => DB_PASSWORD
];
//$connString = assembleInfo($connInfo);

$string = "";

foreach($connInfo as $key => $value)
{
      $string .= $key . "=" . $value . " ";
    }

$conn = pg_connect($string)
          or die('Could not connect: ' . print_r(error_get_last()));
/*
$query = "DROP TABLE imdb_movies";
pg_query($conn, $query);

$query = "CREATE TABLE imdb_movies (
    id SERIAL,
    internal_id VARCHAR(10),
    rank INT,
    title VARCHAR(200),
    year INT,
    img VARCHAR(1500),
    crew VARCHAR(500),
    rating FLOAT,
    rating_count INT,
    date DATE
 );";
 pg_query($conn, $query);
if(pg_last_error($conn))
die(pg_last_error($conn)) ;*/

 //$query = "DROP TABLE imdb_movies";
 //pg_query($conn, $query);
 //echo pg_last_error($conn);
// create a new cURL resource
/*pg_query($conn, "TRUNCATE imdb_movies");
if(pg_last_error($conn))
die(pg_last_error($conn));

$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, "https://imdb-api.com/en/API/Top250Movies/k_n0syenze");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$output=curl_exec($ch);
$output=json_decode($output, 1);
$output=$output['items'];

curl_close($ch);

$query = "INSERT INTO 
          imdb_movies(
            internal_id, rank, title, year, img, crew, rating, rating_count, date
          ) VALUES ";
for($i=0; $i<count($output); $i++)
{
    $query .= "('".str_replace("'", "''", $output[$i]["id"])."', ";
    $query .= $output[$i]["rank"].", ";
    $query .= "'".str_replace("'", "''", $output[$i]["title"])."', ";
    $query .= $output[$i]["year"].", ";
    $query .= "'".str_replace("'", "''", $output[$i]["image"])."', ";
    $query .= "'".str_replace("'", "''", $output[$i]["crew"])."', ";
    $query .= $output[$i]["imDbRating"].", ";
    $query .= $output[$i]["imDbRatingCount"].", ";
    $query .= "'".date('Y-m-d')."'), ";
}

$query = substr($query, 0, strlen($query)-2);
echo $query; 
pg_query($conn, $query);
if(pg_last_error($conn))
die(pg_last_error($conn)) ;
die('here');*/

$select = pg_query($conn, "SELECT * FROM imdb_movies");
while($row=pg_fetch_assoc($select))
{
    print_r($row);
}
?>