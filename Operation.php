<?php
    require_once('Compte.php');

    class Operation extends Model{

        public static function depot(int $numeroCompte, float $montant){
            $comptes = Compte::all();
            $operations = Operation::all();

            foreach($comptes as $compte){
                if($compte->numero == $numeroCompte){
                    $compte->solde += $montant;
                    Compte::create((array) $compte);
                }
            }

            Operation::create([
                'id' => count($operations) + 1,
                'type' => 'depot',
                'montant' => $montant,
                'numero_compte' => $numeroCompte
            ]);   
        }

        public static function retrait(int $numeroCompte, float $montant){
            $comptes = Compte::all();
            $operations = Operation::all();


            foreach($comptes as  $compte){
                if($compte->numero == $numeroCompte){
                    $compte->solde -= $montant;
                    Compte::create((array) $compte);
                }
            }

            Operation::create([
                'id' => count($operations) + 1,
                'type' => 'retrait',
                'montant' => $montant,
                'numero_compte' => $numeroCompte
            ]);
        }


        public static function virement(int $src, int $dst, $montant){
            self::retrait($src, $montant);
            self::depot($dst, $montant);
        }
    }