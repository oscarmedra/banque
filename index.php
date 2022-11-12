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
