<?php
include 'connect.php';

// Get the search term from URL, sanitize it
$search = isset($_GET['search']) ? mysqli_real_escape_string($connection, $_GET['search']) : '';

if (empty($search)) {
    die("No search term entered.");
}

// Use LIKE operator for partial match
$sql = "SELECT id, recipe_name FROM idm232_recipes___sheet1 
        WHERE recipe_name LIKE '%$search%' 
        ORDER BY id ASC";

$result = mysqli_query($connection, $sql);

if (!$result) {
    die("SQL Error: " . mysqli_error($connection));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Search Results for "<?php echo htmlspecialchars($search); ?>"</title>
    <link rel="stylesheet" href="screen.css">
</head>

<body>

    <!-- Top Navigation -->
    <div class="topnav">
        <div id="myLinks">
            <a href="index.php">Home</a>
            <a href="recipes.php">Recipes</a>
            <a href="filterresults.php">Filtered list</a>
            <a href="help.html">Help</a>
            <a href="resultsnotfound.html">Results Not Found</a>
        </div>
    </div>

    <br><br><br>

    <h1>Search Results for "<?php echo htmlspecialchars($search); ?>"</h1>

    <div class="recipeslist">
        <?php
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
            echo "<p>No recipes found matching '$search'.</p>";
        }

        mysqli_close($connection);
        ?>
    </div>

</body>
</html>
