<?php
  $host = 'localhost';
  $user = 'root';
  $password = 'root';
  $database = 'idm232_recipes';
  $connection = mysqli_connect($host, $user, $password, $database);
  if (!$connection) {
   die("Connection failed: " . mysqli_connect_error());
  }
  echo "Connected successfully";

  
  $sql_query = "SELECT * FROM idm232_recipes";
  $result = mysqli_query($connection, $sql_query);
  if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
   echo "Recipe Name: " . $row["recipe_name"]. " - Description: " . $row["recipe_description"]. " - Steps: " . $row["steps"]. "<br>";
   }
  } else {
   echo "0 results";
  }
  mysqli_close($connection);

  ?>