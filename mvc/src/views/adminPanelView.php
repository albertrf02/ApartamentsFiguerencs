<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>

    <ul>
        <?php foreach ($users as $user): ?>
            <li>
                <a href="index.php?r=userpage&Id=<?php echo $user["Id"]; ?>">
                    <?php echo $user["Nom"]; ?>
                </a>

            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>