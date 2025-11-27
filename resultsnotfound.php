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
            <!-- <a href="recipes.php">Recipes</a>
            <a href="filterresults.php">Filtered list</a> -->
            <a href="help.php">Help</a>
            <a href="resultsnotfound.php">Results Not Found</a>
        </div>
    </div>

    <br>
    <br>
    <br>

    <div class="searchandhelp">
        <div class="searchcontainer">
            <form action="filterresults.html" method="get">
                <input type="text" placeholder="Search..." name="search">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="helpbutton">
            <a href="help.html">
                <img src="Media/help.jpg" alt="Help Button">
            </a>
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

    <img class="errorImage" src="Media/error.png" alt="Help Icon">

    <h1>Result Not Found</h1>
    <p>Inputted result is not found</p>
    <p>You were brought here because there was no selected recipe or no inputted results in your search. If you have any problems, please check the Help page for instructions on how to use this website.</p>

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