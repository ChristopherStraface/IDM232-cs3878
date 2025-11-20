<?php
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

