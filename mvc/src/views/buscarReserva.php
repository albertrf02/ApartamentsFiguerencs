<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="index.php?r=buscarreserva">
        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="data">
        </div>
        <div class="text-center">
            <button type="submit" class="button1">Submit</button>
        </div>
    </form>
    <?php if (isset($reserves) && !empty($reserves)): ?>
        <h2>Reserves:</h2>
        <table>
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Title</th>
                    <th>User Name</th>
                    <th>User Surname</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reserves as $reserva): ?>
                    <tr>
                        <td>
                            <?php echo $reserva["Id"]; ?>
                        </td>
                        <td>
                            <?php echo $reserva['Titol']; ?>
                        </td>
                        <td>
                            <?php echo $reserva['Nom']; ?>
                        </td>
                        <td>
                            <?php echo $reserva['Cognoms']; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php elseif (isset($error)): ?>
        <p>
            <?php echo $error; ?>
        </p>
    <?php endif; ?>
</body>

</html>