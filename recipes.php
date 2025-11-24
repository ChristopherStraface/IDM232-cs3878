<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


include 'connect.php';

// Make sure an ID was sent
if (!isset($_GET['id'])) {
    die("No recipe selected.");
}

$id = intval($_GET['id']); // sanitize

// Query database for THIS recipe
$sql = "SELECT * FROM idm232_recipes___sheet1 WHERE id = $id";
$result = mysqli_query($connection, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    die("Recipe not found.");
}

$recipe = mysqli_fetch_assoc($result);

mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($recipe['recipe_name']); ?> - Recipe</title>
    <link rel="stylesheet" href="screen.css">
</head>

<body>

    <div class="topnav">
        <div id="myLinks">
            <a href="index.php">Home</a>
            <a href="recipes.php?id=<?php echo $recipe['id']; ?>">Recipe</a>
            <a href="filterresults.html">Filtered list</a>
            <a href="help.html">Help</a>
        </div>
    </div>

    <h1><?php echo htmlspecialchars($recipe['recipe_name']); ?></h1>

    <p><?php echo nl2br(htmlspecialchars($recipe['recipe_description'])); ?></p>

    <h2>Ingredients</h2>
    <ul>
        <?php
        $ingredients = explode("\n", $recipe['ingredients']);
        foreach ($ingredients as $ingredient) {
            echo "<li>" . htmlspecialchars($ingredient) . "</li>";
        }
        ?>
    </ul>

    <h2>Steps</h2>
    <p><?php echo nl2br(htmlspecialchars($recipe['steps'])); ?></p>

    <h2>Images</h2>
    <div class="recipepreviewbig">
        <img src="<?php echo htmlspecialchars($recipe['images']); ?>" alt="Recipe Image">
    </div>

</body>

</html>
