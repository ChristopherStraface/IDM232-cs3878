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
            <a href="index.html">Home</a>
            <a href="recipes.html">Recipes</a>
            <a href="filterresults.html">Filtered list</a>
            <a href="help.html">Help</a>
            <a href="resultsnotfound.html">Results Not Found</a>
        </div>
    </div>
    <br>
    <br>
    <br>

    <div class="searchandhelp">
        <div class="searchcontainer">
            <form action="filterresults.php" method="get">
                <input type="text" placeholder="Search..." name="search">
                <button type="submit">Search</button>
            </form>

        </div>
        <div class="helpbutton">
            <a href="help.html">
                <img src="Media/help.jpg" alt="Help Button">
            </a>
        </div>
        <div id="filterbutton">
            <button id="filterbutton">Filters</button>
        </div>
    </div>

    <div id="filter-menu" class="menu">
        <h2>Filter Recipes</h2>
        <button id="filteroptionbutton">Vegetarian</button>
        <button id="filteroptionbutton">Dessert</button>
        <button id="filteroptionbutton">Under 30 minutes</button>
    </div>



    <h1>Recipes Home Page</h1>
    <p>Welcome to the recipes website</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
        commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
        pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id
        est
        laborum.</p>


    <div class="recipeslist">
        <?php
        include 'connect.php';

        // FIXED: correct table name
        $sql = "SELECT id, recipe_name FROM idm232_recipes___sheet1 ORDER BY id ASC";
        $result = mysqli_query($connection, $sql);

        // Debug line (remove once working)
        if (!$result) {
            die("SQL Error: " . mysqli_error($connection));
        }

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo '<div class="recipesingle">
        <a href="recipes.php?id=' . $row['id'] . '">
            <img src="Media/recipe_image_template.jpg" alt="Template Food">
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



    <script>
        document.getElementById("filterbutton").addEventListener("click", () => {
            document.getElementById("filter-menu").classList.toggle("open");
        });
    </script>


</body>

</html>