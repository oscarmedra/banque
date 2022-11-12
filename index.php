<?php
    require_once('FileHandler.php');
    require_once('Model.php');
    require_once('Client.php');
    require_once('Compte.php');
    require_once('Operation.php');


    Client::create([
        'id' => 1,
        'prenom' => 'nouha'
    ]);

    Client::create([
        'id' => 2,
        'prenom' => 'nouha',
    ]);

    Compte::create([ // compte numero 1
        'id' => 1,
        'numero' => 1,
        'solde' => 200000,
        'client' => 1,
    ]);

    Compte::create([ //compte numero 2
        'id' => 2,
        'numero' => 2,
        'solde' => 200000,
        'client' => 2,
    ]);


    Operation::depot(1, 25); //je fait un depot de 25 franc pour le compte numero 1
    Operation::retrait(2, 25); // je retire 25 du compte numero 2
    Operation::virement(1, 2, 200); // je fait un virement de 200 entre les deux compte


    echo "<pre>";
        print_r(Client::all());
    echo "</pre>";

    echo "<pre>";
       print_r( Compte::all());
    echo "</pre>";


    echo "<pre>";
        print_r(Operation::all());
    echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="machine">
            <input type="text" class='ecran'>
        </div>
    </div>
</body>


    <style>
        .container{
            display : flex;
            justify-content: center;
            align-items: center;
        }

        .machine{
            width : 300px;
            height : 90vh;
            background-color : black;
            border-radius : 15px;
        }


        .ecran{
            width : 90%;
            margin : auto;
            height : 100px;
        }
    </style>
</html>

