<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Search</title>
    <style>
        @import url("https://fonts.cdnfonts.com/css/gabarito");

        body {
            font-family: 'Gabarito', sans-serif;
            /* Change 'Gabarito' to the correct font name */
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .text-center {
            text-align: center;
        }

        .button1 {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            background-color: #ADD8E6;
            /* Light Blue Color */
            color: #000;
            /* Black Text */
            border-radius: 5px;
            cursor: pointer;
        }

        h2 {
            margin-top: 20px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #ADD8E6;
            color: #000;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        p.error {
            color: #ff0000;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form method="POST" action="index.php?r=buscarreserva">
        <div class="form-group">
            <label for="data">Data</label>
            <input type="date" id="data" name="data">
        </div>
        <div class="text-center">
            <button type="submit" class="button1">Search</button>
        </div>
    </form>

    <?php if (isset($reserves) && !empty($reserves)): ?>
        <h2>Reserves:</h2>
        <table>
            <thead>
                <tr>
                    <th>ID de la Reserva</th>
                    <th>Apartament</th>
                    <th>Nom de l'Usuari</th>
                    <th>Cognom de l'usuari</th>
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
        <p class="error">
            <?php echo $error; ?>
        </p>
    <?php endif; ?>
</body>

</html>