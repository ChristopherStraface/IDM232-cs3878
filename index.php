<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Site cs3878</title>
    <link rel="stylesheet" href="screen.css">
</head>

<body>

<div class="topnav">
    <div id="myLinks">
        <a href="index.php">Home</a>
        <a href="help.php">Help</a>
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

<div id="filter-menu" class="menu">
    <h1>Filter Recipes</h1>
    <button class="filteroption" data-filter="Vegetarian">Vegetarian</button>
    <button class="filteroption" data-filter="Pasta">Pasta</button>
    <button class="filteroption" data-filter="Sandwiches">Sandwiches</button>
    <button class="filteroption" data-filter="Cheesy">Cheesy</button>
    <button class="filteroption" data-filter="Meaty">Meaty</button> 
</div>

<h1>Recipes Home Page</h1>
<p>Welcome to the recipes website</p>
<p>Below are dozens of recipes for you to use and enjoy! Please refer to the search and filtering functions for added help, and if you're stuck, click the question mark icon to visit the help page.</p>

<div class="recipeslist">
    <?php
    include 'connect.php';

    $sql = "SELECT id, recipe_name, images FROM idm232_recipes___sheet1 ORDER BY id ASC";
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        die("SQL Error: " . mysqli_error($connection));
    }

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $recipeFolder = "images/" . $row['recipe_name'] . "/";

            $imageList = array_filter(array_map('trim', explode("\n", $row['images'])));

            $firstImage = "Media/recipe_image_template.jpg";

            if (!empty($imageList)) {
                $firstImage = $recipeFolder . $imageList[0];
            }

            echo '
            <div class="recipesingle">
                <a href="recipes.php?id=' . $row['id'] . '">
                    <img src="' . htmlspecialchars($firstImage) . '" alt="' . htmlspecialchars($row['recipe_name']) . '">
                    <p>' . htmlspecialchars($row['recipe_name']) . '</p>
                </a>
            </div>';
        }
    } else {
        echo "<p>No recipes found.</p>";
    }

    mysqli_close($connection);
    ?>
</div>
<br>
<br>
<script>
    document.getElementById("filterbutton").addEventListener("click", () => {
        document.getElementById("filter-menu").classList.toggle("open");
    });

    document.querySelectorAll(".filteroption").forEach(button => {
        button.addEventListener("click", () => {
            const filterValue = button.dataset.filter;
            window.location.href = `filterresults.php?filter=${encodeURIComponent(filterValue)}`;
        });
    });
</script>

</body>
</html>
