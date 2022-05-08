<?php
    //Connexion à la base de donnée
    function connect_db() {
        try {
            //Localhost
            $user = "root";
            $password = '';
            $dns='mysql:host=localhost;dbname=ptitboulot-website';

            //Serveur Webhost
            /*$user = "id16128293_hasseye";
            $password = '1A44(Ub~<qQH![0<';
            $dns='mysql:host=localhost;dbname=id16128293_oumarmaiga';
            
            //Serveur Ibracilink
            $user = "oumarmaiga_oumarmaiga";
            $password = 'Hasseye97';
            $dns='mysql:host=localhost;dbname=oumarmaiga_oumarmaiga';*/

            $connexion = new PDO($dns,$user,$password);
            return $connexion;

        } catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
        
    }