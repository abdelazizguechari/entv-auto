<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            width: 100%;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table, .table th, .table td {
            border: 1px solid black;
        }

        .table th, .table td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

    <div>
        <h6 style="text-transform: uppercase">etablisement de television <br>
            direction de l'administraion et des moyens <br>
            sous direction des moyens genraux <br>
            departement des moyes de transport 
        </h6>
    </div>

    <div class="container">
        <div class="header">
            <h2 style="text-align: center">Rapport de Maintenance</h2>
        </div>
        <table class="table">
            <tr>
                <th>Immatriculation:</th>
                <td>{{ $maintenance->immatriculation }}</td>
            </tr>
            <tr>
                <th>Nom du Conducteur:</th>
                <td>{{ $maintenance->driver_name }}</td>
            </tr>
            <tr>
                <th>Date Début Maintenance:</th>
                <td>{{ $maintenance->start_date }}</td>
            </tr>
            <tr>
                <th>Categorie de Panne:</th>
                <td>{{ $maintenance->categorie_panne }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
