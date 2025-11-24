<?php
require_once 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php while ($row = $result ->fetch_assoc()) : ?>
        <h2><?php echo $row['recipe_name']: ?></h2>
    
</body>
</html>