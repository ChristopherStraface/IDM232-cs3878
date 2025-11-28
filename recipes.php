<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'connect.php';

if (!isset($_GET['id'])) {
    header("Location: resultsnotfound.php");
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM idm232_recipes___sheet1 WHERE id = $id";
$result = mysqli_query($connection, $sql);

if (!$result || mysqli_num_rows($result) == 0) {
    header("Location: resultsnotfound.php");
    exit;
}

$recipe = mysqli_fetch_assoc($result);

$recipeFolder = "images/" . $recipe['recipe_name'] . "/";
$imageList = array_map('trim', explode("\n", $recipe['images']));

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
            <!-- <a href="recipes.php">Recipes</a>
            <a href="filterresults.php">Filtered list</a> -->
            <a href="help.php">Help</a>'
            <a href="resultsnotfound.php">Results Not Found</a>
        </div>
    </div>
    <br>
    <br>
    <div class="recipe-page">
        <h1><?php echo htmlspecialchars($recipe['recipe_name']); ?></h1>
        <img src="<?php echo $recipeFolder . $imageList[0]; ?>" alt="Recipe Image 1">


        <p><?php echo nl2br(htmlspecialchars($recipe['recipe_description'])); ?></p>
        <img src="<?php echo $recipeFolder . $imageList[1]; ?>" alt="Recipe Image 2">


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
        <?php
        $steps = htmlspecialchars($recipe['steps']);
        $steps = nl2br($steps);

        $steps = preg_replace_callback('/\[IMG(\d+)\]/', function ($match) use ($recipeFolder, $imageList) {
            $index = intval($match[1]);
            if (isset($imageList[$index])) {
                $imgPath = $recipeFolder . $imageList[$index];
                return '<br><img src="' . $imgPath . '" class="step-image"><br>';
            }
            return '';
        }, $steps);

        echo "<p>$steps</p>";
        ?>
    </div>


</body>

</html>