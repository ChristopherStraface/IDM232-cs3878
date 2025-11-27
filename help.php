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

    <img class="helpImage" src="Media/help.jpg" alt="Help Icon">

    <h1>Help Page</h1>
    <p>Need help? Check out these steps below</p>
    <p>On this website, you are able to click or tap on any of the displayed recipes. You can use the "Filters" button to search through the given filter options, or can directly search for something yourself. Here are the steps you can take to use this website:</p>

    <ul>
        <li>1. Scroll through all of the recipes available</li>
        <li>2. If you can't find one you like, try searching for keywords with the search bar</li>
        <li>3. If keywords aren't helpful for you, try using the filters, which apply to every recipe</li>
        <li>4. Interact with the recipe, follow the instructions, and enjoy!</li>
    </ul>


</body>

</html>