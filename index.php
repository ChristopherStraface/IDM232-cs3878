<?php
// Page title
$title = "Recipes Home Page";

// Your recipe cards as PHP data
$recipes = [
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
    "Recipe Name Template",
];

// Filters (dynamic list if you expand later)
$filters = [
    "Vegetarian",
    "Dessert",
    "Under 30 minutes"
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href="screen.css">
</head>

<body>

    <div class="topnav">
        <div id="myLinks">
            <a href="index.php">Home</a>
            <a href="recipes.php">Recipes</a>
            <a href="filterresults.php">Filtered list</a>
            <a href="help.php">Help</a>
            <a href="resultsnotfound.php">Results Not Found</a>
        </div>
    </div>

    <br><br><br>

    <div class="searchandhelp">
        <div class="searchcontainer">
            <form action="filterresults.php" method="get">
                <input type="text" placeholder="Search..." name="search">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="helpbutton">
            <a href="help.php">
                <img src="Media/help.jpg" alt="Help Button">
            </a>
        </div>

        <div id="filterbutton-container">
            <button id="filterbutton">Filters</button>
        </div>
    </div>

    <!-- Filter Menu -->
    <div id="filter-menu" class="menu">
        <h3>Filter Recipes</h3>

        <?php foreach ($filters as $filter): ?>
            <button><?= $filter ?></button>
        <?php endforeach; ?>
    </div>

    <h1><?= $title ?></h1>
    <p>Welcome to the recipes website</p>

    <div class="recipeslist">
        <?php foreach ($recipes as $recipe): ?>
            <div class="recipesingle">
                <a href="recipes.php">
                    <img src="Media/recipe_image_template.jpg" alt="Template Food">
                    <p><?= $recipe ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

<script>
document.getElementById("filterbutton").addEventListener("click", () => {
  document.getElementById("filter-menu").classList.toggle("open");
});
</script>

</body>
</html>
