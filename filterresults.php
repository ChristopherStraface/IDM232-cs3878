<?php
include 'connect.php';

$search = isset($_GET['search']) ? mysqli_real_escape_string($connection, $_GET['search']) : '';
$filter = isset($_GET['filter']) ? mysqli_real_escape_string($connection, $_GET['filter']) : '';

if (empty($search) && empty($filter)) {
    header("Location: resultsnotfound.php");
    exit;
}

$sql = "SELECT id, recipe_name, images, category 
        FROM idm232_recipes___sheet1 
        WHERE 1";

if (!empty($search)) {
    $sql .= " AND recipe_name LIKE '%$search%'";
}

if (!empty($filter)) {
    $sql .= " AND category LIKE '%$filter%'";
}

$sql .= " ORDER BY id ASC";

$result = mysqli_query($connection, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($connection));
}

if (mysqli_num_rows($result) === 0) {
    header("Location: resultsnotfound.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        <?php
        if ($search && $filter) {
            echo "Results for '" . htmlspecialchars($search) . "' filtered by '" . htmlspecialchars($filter) . "'";
        } elseif ($search) {
            echo "Search Results for '" . htmlspecialchars($search) . "'";
        } elseif ($filter) {
            echo "Filtered Recipes: '" . htmlspecialchars($filter) . "'";
        }
        ?>
    </title>
    <link rel="stylesheet" href="screen.css">
</head>

<body>

    <div class="topnav">
        <div id="myLinks">
            <a href="index.php">Home</a>
            <!-- <a href="recipes.php">Recipes</a>
            <a href="filterresults.php">Filtered list</a> -->
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

    <div id="filter-menu" class="menu">
        <h2>Filter Recipes</h2>
        <button class="filteroption" data-filter="Vegetarian">Vegetarian</button>
        <button class="filteroption" data-filter="Pasta">Pasta</button>
        <button class="filteroption" data-filter="Sandwiches">Sandwiches</button>
        <button class="filteroption" data-filter="Cheesy">Cheesy</button>
        <button class="filteroption" data-filter="Meaty">Meaty</button>
    </div>

    <h1>
        <?php
        if ($search && $filter) {
            echo "Results for '" . htmlspecialchars($search) . "' filtered by '" . htmlspecialchars($filter) . "'";
        } elseif ($search) {
            echo "Search Results for '" . htmlspecialchars($search) . "'";
        } elseif ($filter) {
            echo "Filtered Recipes: '" . htmlspecialchars($filter) . "'";
        }
        ?>
    </h1>

    <?php if (!empty($filter)) echo "<p>Filtered by: " . htmlspecialchars($filter) . "</p>"; ?>

    <div class="recipeslist">
        <?php
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

        mysqli_close($connection);
        ?>
    </div>

    <script>
        document.getElementById("filterbutton").addEventListener("click", () => {
            document.getElementById("filter-menu").classList.toggle("open");
        });

        document.querySelectorAll(".filteroption").forEach(btn => {
            btn.addEventListener("click", () => {
                const filterValue = btn.dataset.filter;
                window.location.href = `filterresults.php?filter=${encodeURIComponent(filterValue)}`;
            });
        });
    </script>

</body>

</html>
