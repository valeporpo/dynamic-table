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
/*$query = "CREATE TABLE imdb_movies (
    id SERIAL,
    internal_id CHAR(9),
    rank INT,
    title VARCHAR(200),
    year INT,
    img VARCHAR(1500),
    crew VARCHAR(500),
    rating FLOAT,
    rating_count INT,
    date DATE
 );";*/


 //$query = "DROP TABLE imdb_movies";
 //pg_query($conn, $query);
 //echo pg_last_error($conn);
// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "https://imdb-api.com/en/API/Top250Movies/k_n0syenze");
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// grab URL and pass it to the browser
$output=curl_exec($ch);
$output=json_decode($output, 1);
$output=$output['items'];
/*echo '<pre>';
var_dump($output);
echo '</pre>';*/
// close cURL resource, and free up system resources
curl_close($ch);

$query = "INSERT INTO 
          imdb_table(
            internal_id, rank, title, year, img, crew, rating, rating_count
          ) VALUES ";
for($i=0; $i<count($output); $i++)
{
    $query .= "('".$output[$i]["id"]."', ";
    $query .= $output[$i]["rank"].", ";
    $query .= "'".$output[$i]["title"]."', ";
    $query .= $output[$i]["year"].", ";
    $query .= "'".$output[$i]["image"]."', ";
    $query .= "'".$output[$i]["crew"]."', ";
    $query .= $output[$i]["imDbRating"].", ";
    $query .= $output[$i]["imDbRatingCount"]."), ";
}

$query = substr($query, 0, strlen($query)-2);
echo $query; 
pg_query($conn, $query);
echo pg_last_error($conn);
?>