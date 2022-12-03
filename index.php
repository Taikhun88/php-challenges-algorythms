<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="js/index.js"></script>
    <title>Challenges PHP - Tainix</title>
</head>

<body>
    <main>
        <h1>Challenges Débutant - PHP</h1>
        <h3><a href="https://tainix.fr/challenge/Pierre-Feuille-Ciseaux">Feuilles-Pierre-Ciseaux</a></h3>

        <?php

        $coups = str_shuffle('FPC');

        $coupsArray = str_split($coups, 1);

        ?>

        <button onclick="displayContent('btn-1')" id="btn-1" class="btn-toggle">Voir réponse</button>
        <div class="btn-1">

            <?php

            // var_dump($coupsArray);
            foreach ($coupsArray as $key => $value) {
                echo "Coup " . $key . " : " . $value . "<br>";
                $monContreCoup = "";

                if ($value == "F") {
                    $monContreCoup = "C";
                    echo "Contre-coup " . $key . " : Tu joues Feuilles <i class='fas fa-hand-paper'></i>, je te coupe avec <i class='fas fa-hand-scissors'></i> " . "<br><br>";
                } elseif ($value == "C") {
                    $monContreCoup = "P";
                    echo "Contre-coup " . $key . " : Tu joues Ciseaux <i class='fas fa-hand-scissors'></i>, je te détruis à coup de Pierre <i class='fas fa-hand-rock'></i> " . "<br><br>";
                } else {
                    $monContreCoup = "F";
                    echo "Contre-coup " . $key . " : Tu joues Pierre <i class='fas fa-hand-rock'></i>, je t'étouffe avec Feuilles <i class='fas fa-hand-paper'></i> " . "<br><br>";
                }
            }
            ?>
        </div>

        <h3><a href="https://tainix.fr/challenge/Coach-de-foot">Coach de foot</a></h3>
        <button onclick="displayContent('btn-2')" id="btn-2" class="btn-toggle">Voir réponse</button>
        <div class="btn-2">

            <?php

            // Génère aléatoirement 15 joueurs avec une forme variant de 5 à 50.
            $i = 0;
            while ($i < 15) {
                $joueurs[] = mt_rand(5, 50);
                $i++;
            }
            $nombreJoueursDispo = count($joueurs);
            echo $nombreJoueursDispo . " joueurs => dispo avec une forme différente : <br><br>";
            foreach ($joueurs as $formeDuJoueur) {
                echo $formeDuJoueur . " ";
            }

            echo "<br><br>" . "Voici les 11 plus en forme pour le prochain match : " . "<br><br>";

            // $joueurs = [51, 37, 55, 9, 41, 22, 59, 58, 6, 38, 50, 19, 18, 13, 5, 21, 8, 56, 16, 36, 52, 2, 20, 40, 57, 17, 15, 26, 27, 33, 48];

            // forme sortie
            $joueursRetenus = arsort($joueurs);
            $numeroDesJoueurs = array_keys($joueurs);
            $dernierJoueur = array_key_last($joueurs);

            $i = 0;
            while ($i < 11) {
                echo $numeroDesJoueurs[$i];
                if ($i < 10) {
                    echo "-";
                }
                $i++;
            }


            ?>
        </div>

        <h3><a href="https://tainix.fr/challenge/Team-Pokemon">Team Pokemon</a></h3>
        <button onclick="displayContent('btn-3')" id="btn-3" class="btn-toggle">Voir réponse</button>
        <div class="btn-3">
            <?php

            // Un tableau des type de pokemon requis pour composer l'équipe de 4
            $generateArrayPokemons = [
                [
                    '0' => "Eau",
                    '1' => "Feu",
                    '2' => "Herbe",
                    '3' => "Air",
                    '4' => "Poison",
                    '5' => "Glace",
                    '6' => "Psychique",
                    '7' => "Insecte",
                ],
            ];
            // Crée une équipe de 20 pokemon avec des types générés aléatoirement
            // for ($i = 1; $i <= 20; $i++) {
            //     $pokemonList = $generateArrayPokemons[0][mt_rand(0, 7)];
            //     $pokemonTeam[] = $pokemonList;
            // }

            $listTypePokemon = [
                "Base" => [
                    'Eau' => "",
                    'Feu' => "",
                    'Herbe' => "",
                ],
                "Rare" => [
                    "Air" => "",
                    "Poison" => "",
                    "Glace" => "",
                    "Psychique" => "",
                    "Insecte" => "",
                ],
            ];

            $pokemonTeam = ['Feu', 'Eau', 'Poison', 'Herbe', 'Feu', 'Feu', 'Herbe', 'Herbe', 'Glace', 'Feu', 'Eau', 'Herbe', 'Eau', 'Herbe', 'Insecte', 'Glace', 'Eau', 'Eau', 'Eau', 'Eau', 'Feu', 'Herbe', 'Herbe', 'Herbe', 'Eau', 'Herbe', 'Glace', 'Eau', 'Herbe', 'Glace', 'Insecte'];
            $total = count($pokemonTeam);

            $countPokemon = array_count_values($pokemonTeam);
            foreach ($countPokemon as $type => $qty) {
                if ($type == 'Eau') {
                    $listTypePokemon['Base']['Eau'] = $qty;
                } elseif ($type == 'Feu') {
                    $listTypePokemon['Base']['Feu'] = $qty;
                } elseif ($type == 'Herbe') {
                    $listTypePokemon['Base']['Herbe'] = $qty;
                } elseif ($type == 'Air') {
                    $listTypePokemon['Rare']['Air'] = $qty;
                } elseif ($type == 'Poison') {
                    $listTypePokemon['Rare']['Poison'] = $qty;
                } elseif ($type == 'Glace') {
                    $listTypePokemon['Rare']['Glace'] = $qty;
                } elseif ($type == 'Psychique') {
                    $listTypePokemon['Rare']['Psychique'] = $qty;
                } elseif ($type == 'Insecte') {
                    $listTypePokemon['Rare']['Insecte'] = $qty;
                }
            }

            $countBase = array_sum($listTypePokemon['Base']);

            $nbrBaseTeam = number_format($countBase / 3, 0);
            $countRare = array_sum($listTypePokemon['Rare']);
            $totalTeam = min([
                $listTypePokemon['Base']['Eau'],
                $listTypePokemon['Base']['Feu'],
                $listTypePokemon['Base']['Herbe'],
            ]);
            // echo "Calcul team avec 1 de chaque base pour chaque équipe " . $totalTeam;

            // print_r($countPokemon);
            echo "<br>";

            echo "Total pokemon type Base : $countBase <br>";
            echo "Total pokemon type base EAU : " . $listTypePokemon['Base']['Eau'] . "<br>";
            echo "Total pokemon type base FEU : " . $listTypePokemon['Base']['Feu'] . "<br>";
            echo "Total pokemon type base HERBE : " . $listTypePokemon['Base']['Herbe'] . "<br>";
            echo "Total pokemon type Rare : $countRare <br>";
            echo "Total team pokemon : " . number_format($totalTeam, 0) . "<br>";

            echo "Nombre d'équipes composable avec les pokemon de type Base : $nbrBaseTeam <br>";
            if ($countRare >= $nbrBaseTeam) {
                echo "Nous pouvons composer $nbrBaseTeam équipes au total <br>";
            } else {
                echo "Nous pouvons composer $countRare équipes au total <br>";
            }

            // // Trie les pokemon par Type dans l'ordre croissant alphabétique
            // $sortedOutPokemon = asort($pokemonTeam);

            // echo "Voici la liste des types de Pokemon dispo : <br><br>";
            // foreach ($pokemonTeam as $pokemonType) {
            //     echo $pokemonType . ", ";
            // }        
            // echo "<br><br>";
            // Affiche le nombre de pokemon par Type
            // $listPokemonByType = [];
            // for ($i = 0; $i <= 7 ; $i++) { 
            //     $searchPokemonByType = array_keys($pokemonTeam, $pokemonTeam[$i]);
            //     echo "<br>";
            //     $count = count($searchPokemonByType);
            //     echo $count . " pokemon type <br>";
            //     echo $pokemonTeam[$i] . "<br>";
            //     // print_r($searchPokemonByType);
            //     $listPokemonByType[$i] = [ 
            //         $pokemonTeam[$i] => $count,
            //     ];                
            // }

            // // Compte le nombre total par type de pokemon
            // $qtyPokemonType = array_count_values($pokemonTeam);

            // // Indique le type de pokemon qui a le moins de pokemon de ce type
            // $minPokemonTeam = min($qtyPokemonType);

            // echo "Sachant qu'il faut 1 pokemon de type BASE de chaque élément et 1 type RARE pour composer une équipe de 4. <br> Voici le nombre d'équipe(s) que vous pouvez composer avec vos pokemon disponibles mentionnés ci-dessus : <br>" . $minPokemonTeam;


            // echo "Vue du tableau listTypePokemon :" . $listTypePokemon["Base"][0];
            // $count = array_values($listTypePokemon['Base']);
            // $keys = array_keys($listTypePokemon['Base'], 'Eau');

            ?>
        </div>

        <h3><a href="https://tainix.fr/challenge/Avengers">Avengers</a></h3>
        <button onclick="displayContent('btn-4')" id="btn-4" class="btn-toggle">Voir réponse</button>
        <div class="btn-4">

            <?php

            // Force initiale des protagonistes attribuée
            // Puissance fixe pour Thanos à chaque chargement de données
            $puissanceThanos = 578;

            // Puissance de la caractéristique principale de chaque avenger aléatoire
            // $ironmanIngeniosite = mt_rand(1, 5);
            // $spidermanVitesse = mt_rand(1, 5);
            // $captainAmericaForce = mt_rand(1, 5);
            // $thorFoudre = mt_rand(1, 5);


            // Puissance variable pour les Avengers à chaque chargement de données aléatoire
            // $ironmanPower = ($ironmanIngeniosite * mt_rand(1, 5)) + mt_rand(3, 7);
            // $spidermanPower = ($spidermanVitesse * mt_rand(1, 5)) + mt_rand(3, 7);
            // $captainAmericaPower = ($captainAmericaForce * mt_rand(1, 5)) + mt_rand(5, 10);
            // $thorPower =  ($thorFoudre * mt_rand(1, 5)) + mt_rand(5, 15);


            // Puissance de la caractéristique principale de chaque avenger FIXE
            $ironmanIngeniosite = 7;
            $spidermanVitesse = 3;
            $captainAmericaForce = 6;
            $thorFoudre = 2;

            function calculateTotalAvengersPower($ironmanIngeniosite, $spidermanVitesse, $captainAmericaForce, $thorFoudre)
            {
                // Puissance variable pour les Avengers à chaque chargement de données FIXE
                $ironmanPower = (($ironmanIngeniosite * 3) + 10);
                $spidermanPower = (($spidermanVitesse * 4) + 5);
                $captainAmericaPower = (($captainAmericaForce * 3) + 7);
                $thorPower =  (($thorFoudre * 4) + 20);

                // Puissance totale des avengers avant le premier combat contre Thanos
                $avengerRisingPower = [
                    $ironmanPower,
                    $spidermanPower,
                    $captainAmericaPower,
                    $thorPower,
                ];
                return array_sum($avengerRisingPower);
            }
            $puissanceAvengers = calculateTotalAvengersPower($ironmanIngeniosite, $spidermanVitesse, $captainAmericaForce, $thorFoudre);

            $tableauAvengers = [
                [1 => $ironmanIngeniosite],
                [2 => $spidermanVitesse],
                [3 => $captainAmericaForce],
                [4 => $thorFoudre],
            ];

            echo "Voici la puissance totale des Avengers avant le 1er combat Avengers VS Thanos : " . $puissanceAvengers . "<br>";

            echo "<br> Tableau des héros : <br><br>";

            // Entrée dans la boucle temporelle des Avengers
            // $i est le nombre de tours
            $i = 0;
            $avengerLevelUpTurn = 0;
            $keyAvengersArray = key($tableauAvengers);

            while ($puissanceAvengers < $puissanceThanos) {
                $cleTableauAvengers = key($tableauAvengers[$avengerLevelUpTurn]);

                $puissanceAvengers = calculateTotalAvengersPower($ironmanIngeniosite, $spidermanVitesse, $captainAmericaForce, $thorFoudre);
                echo "Puissance avengers recalculée => $puissanceAvengers <br>";

                echo "Avenger n° " . $cleTableauAvengers . "<br>";
                if ($cleTableauAvengers == 1) {
                    echo "Ironman avant level up : $ironmanIngeniosite <br>";
                    $tableauAvengers[0][$ironmanIngeniosite] = $ironmanIngeniosite++;
                    echo "Ironman level up : " . $ironmanIngeniosite . "<br><br>";
                    if ($puissanceAvengers > $puissanceThanos) {
                        echo "Grâce au level up de la capacité de Ironman, les avengers ont triomphé de Thanos au " . $i . "ème tour avec une puissance totale de $puissanceAvengers. <br>";
                    }
                } elseif ($cleTableauAvengers == 2) {
                    echo "Spiderman avant level up : $spidermanVitesse <br>";
                    $tableauAvengers[0][$spidermanVitesse] = $spidermanVitesse++;
                    echo "Spiderman level up : " . $spidermanVitesse . "<br><br>";
                    if ($puissanceAvengers > $puissanceThanos) {
                        echo "Grâce au level up de la capacité de Spiderman, les avengers ont triomphé de Thanos au " . $i . "ème tour avec une puissance totale de $puissanceAvengers. <br>";
                    }
                } elseif ($cleTableauAvengers == 3) {
                    echo "Captain America avant level up : $captainAmericaForce <br>";
                    $tableauAvengers[0][$captainAmericaForce] = $captainAmericaForce++;
                    echo "Captain America level up : " . $captainAmericaForce . "<br><br>";
                    if ($puissanceAvengers > $puissanceThanos) {
                        echo "Grâce au level up de la capacité de Captain America, les avengers ont triomphé de Thanos au " . $i . "ème tour avec une puissance totale de $puissanceAvengers. <br>";
                    }
                } elseif ($cleTableauAvengers == 4) {
                    echo "Thor avant level up : $thorFoudre <br>";
                    $tableauAvengers[0][$thorFoudre] = $thorFoudre++;
                    echo "Thor level up : " . $thorFoudre . "<br><br>";
                    if ($puissanceAvengers > $puissanceThanos) {
                        echo "Grâce au level up de la capacité de Thor, les avengers ont triomphé de Thanos au " . $i . "ème tour avec une puissance totale de $puissanceAvengers. <br>";
                    }
                }
                $avengerLevelUpTurn++;

                if ($avengerLevelUpTurn == 4) {
                    $avengerLevelUpTurn = 0;
                }
                $i++;

                if ($puissanceAvengers > $puissanceThanos) {
                    echo "Fin du game au tour " . $i . " avec $puissanceAvengers VS $puissanceThanos <br><br>";
                } else {
                    echo "Tour numéro " . $i . "<br>";
                }
            }

            // while ($puissanceAvengers < $puissanceThanos) {
            //     if ($keyAvengersArray < 3) {
            //         // entre dans un tableau avec les puissances de chaque héros
            //         // augmente la caractérique d'un avenger à l'entrée du tableau
            //         // incrémente l'index du tableau pour se trouver sur un héros
            //         foreach ($tableauAvengers[$keyAvengersArray] as $index => $caracteristiqueAvenger) {
            //             echo "<br> L'avenger n° " . $keyAvengersArray . " voit son trait augmenter de + 1 et passe de " . $caracteristiqueAvenger . " à " . $caracteristiqueAvenger + 1 . "<br>";
            //             echo "La puissance du avenger passe à $avengerRisingPower[$keyAvengersArray] <br>";
            //         }
            //         $i++;
            //         $keyAvengersArray++;
            //     } else {
            //         // (key($tableauAvengers[$keyAvengersArray]) == 3)
            //         foreach ($tableauAvengers[$keyAvengersArray] as $index => $caracteristiqueAvenger) {
            //             echo "<br> L'avenger n° " . $keyAvengersArray . " voit son trait augmenter de + 1 et passe de " . $caracteristiqueAvenger . " à " . $caracteristiqueAvenger + 1 . "<br>";
            //             echo "La puissance du avenger passe à $avengerRisingPower[$keyAvengersArray] <br>";
            //         }
            //         $keyAvengersArray == 0;
            //     }   // reset($tableauAvengers);
            //     // $tableauAvengers[$i - 1];
            // }
            // $i++;


            // JU CHALLENGE VERSION
            // $capaciteTable = [
            //     'ingeniosite' => 8,
            //     'vitesse' => 8,
            //     'force' => 4,
            //     'foudre' => 6,
            // ];

            // $avengersTable = [
            //     [
            //         'name' => "Ironman",
            //         'puissance' => "* 3 + 10",
            //         'capacite' => "ingeniosite",
            //     ],
            //     [
            //         'name' => "Spiderman",
            //         'puissance' => "* 4 + 5",
            //         'capacite' => "vitesse",
            //     ],
            //     [
            //         'name' => "Captain America",
            //         'puissance' => "* 3 + 7",
            //         'capacite' => "force",
            //     ],
            //     [
            //         'name' => "Thor",
            //         'puissance' => "* 4 + 20",
            //         'capacite' => "foudre",
            //     ],
            // ];

            // $totalAvengersPower = 0;

            // echo "<br> Challenge JU <br>";
            // foreach ($avengersTable as $key => $value) {
            //     $totalAvengersPower  = $totalAvengersPower + matheval($capaciteTable[$value['capacite']] . $value['puissance']);
            //     // var_dump(intval($value['puissance']));
            // }
            // var_dump($totalAvengersPower);

            // $thanosTable = [
            //     'name' => "Thanos",
            //     'puissance' => 400,
            // ];

            // function matheval($equation)
            // {
            //     $equation = preg_replace("/[^0-9+\-.*\/()%]/", "", $equation);
            //     $equation = preg_replace("/([+-])([0-9]+)(%)/", "*(1\$1.\$2)", $equation);
            //     // you could use str_replace on this next line
            //     // if you really, really want to fine-tune this equation
            //     $equation = preg_replace("/([0-9]+)(%)/", ".\$1", $equation);
            //     if ($equation == "") {
            //         $return = 0;
            //     } else {
            //         eval("\$return=" . $equation . ";");
            //     }
            //     return $return;
            // }

            // function recalculatePower($avengersTable, $capaciteTable)
            // {
            //     $totalAvengersPower = 0;
            //     foreach ($avengersTable as $key => $value) {
            //         $totalAvengersPower  = $totalAvengersPower + matheval($capaciteTable[$value['capacite']] . $value['puissance']);
            //     }
            //     return $totalAvengersPower;
            // };

            // if ($totalAvengersPower <= $thanosTable['puissance']) {
            //     $count = 0;
            //     $loop = 1;
            //     for ($i = 0; recalculatePower($avengersTable, $capaciteTable) <= $thanosTable['puissance']; $i++) {
            //         $capaciteTable[$avengersTable[$count]['capacite']] = $capaciteTable[$avengersTable[$count]['capacite']] + 1;
            //         $recalculatePower = recalculatePower($avengersTable, $capaciteTable);

            //         var_dump($recalculatePower);

            //         if ($count == 3) {
            //             $count = 0;
            //         } else {
            //             $count++;
            //         };
            //         $loop++;
            //     }
            // }
            // echo " <br> II faut $loop tours pour battre Thanos <br>";

            ?>
        </div>

        <h3><a href="https://tainix.fr/challenge/Collectionneur-de-figurines">Collectionneur de figurines</a></h3>
        <button onclick="displayContent('btn-5')" id="btn-5" class="btn-toggle">Voir réponse</button>
        <div class="btn-5">

            <?php
            $randomQtyDataArray = mt_rand(10, 30);

            $qtyProducedFigurines = [];
            function randomPrixAchat($qtyProducedFigurines)
            {
                $qtyProducedFigurines = [
                    2000,
                    50000,
                ];
                // Données de quantité de figurines produites
                return $qtyProducedFigurines[mt_rand(0, 1)];
            }
            $callRandomPrixAchat = randomPrixAchat($qtyProducedFigurines);

            // Tableau des quantités produites => prix d'achats
            $arrayExemplaires = [];
            // Générateur de données Tai version               
            // for ($i = 0; $i < $randomQtyDataArray; $i++) {
            //     $arrayExemplaires[$i]  = [randomPrixAchat($qtyProducedFigurines) => ""];
            //     if ($arrayExemplaires[$i] == [2000 => ""]) {
            //         $arrayExemplaires[$i] = [
            //             'Cote' => 0.8,
            //             'PrixAchat' => 30,
            //         ];
            //     } 
            //     else
            //     {
            //         $arrayExemplaires[$i] = [
            //             'Cote' => 0.6,
            //             'PrixAchat' => 15,
            //     ];
            //     }
            // }

            $tainixExemplairesData = [50, 2000, 50000, 2000, 2000, 50000, 2000, 50000, 50000, 2000, 2000, 2000, 50000, 2000, 50000, 2000, 2000, 50000, 50000, 2000, 50000, 2000, 2000, 50000, 100, 50000, 50000, 2000, 50000, 2000, 2000, 50000, 50000, 50000, 2000, 50000, 50000, 50000, 50, 50000, 2000];

            $cotes = [2, 1.2, 0.8, 0.8, 0.8, 0.8, 0.8, 1.2, 0.6, 1.2, 1, 0.6, 1, 1, 0.6, 0.6, 0.8, 1.2, 0.6, 0.8, 0.8, 0.8, 0.6, 0.8, 4, 0.8, 0.6, 0.6, 0.8, 0.8, 0.6, 0.6, 0.6, 0.6, 0.8, 1, 0.8, 0.6, 8, 0.6, 0.8];

            // Générateur de données challenge version  
            $arrayDifference = [];
            $coutRevente = [];
            for ($i = 0; $i < count($tainixExemplairesData); $i++) {
                // A l’achat, une figurine vaut 15€, sauf si elle est produite à moins de 2.000 exemplaires, dans ce cas là, elle vaut 30€.
                if ($tainixExemplairesData[$i] < 2000) {
                    $tainixExemplairesData[$i] = 30;
                } else {
                    $tainixExemplairesData[$i] = 15;
                }
                // A la revente, la figurine vaudra sa côte * prix d’achat (produit).
                $coutRevente[$i] = $cotes[$i] * $tainixExemplairesData[$i];
                // Prix d'achat - cout de revente
                $difference = array_sum($coutRevente) - $tainixExemplairesData[$i];
                // echo "La figurine " . $i . ", achetée ". $tainixExemplairesData[$i] . "€ se revendra " . $coutRevente . "€ <br>";
                $sumPrixAchat = array_sum($tainixExemplairesData);
                $sumCoutRevente = array_sum($coutRevente);

                $arrayDifference[$i] = $difference;
                $solde = $sumCoutRevente - $sumPrixAchat;
            }
            // echo $sumPrixAchat . "<br>";
            // echo $sumCoutRevente . "<br>";

            echo "Le solde total est de : " . $solde . "€ pour une collection de " . count($tainixExemplairesData) . " figurines. Le prix d'achat total est de " . $sumPrixAchat . "€ et le prix de revente total de " . $sumCoutRevente . "€.";

            // echo "Le solde total est de : " . $difference . "<br>";


            // echo "Jeu de données pour $randomQtyDataArray figurines <br><br>";

            // Affichage du nouveau tableau avec un couple de données Qté produites => Prix Achat par INDEX
            // for ($i = 0; $i < count($arrayExemplaires); $i++) { 
            //     $coutRevente = $arrayExemplaires[$i]['Cote'] * $arrayExemplaires[$i]['PrixAchat'];
            //     echo $i . " - ";
            //     print_r($arrayExemplaires[$i]);
            //     echo "<br> Prix achat : " . $arrayExemplaires[$i]['PrixAchat'] . "€";
            //     echo "<br> Prix de revente : " . $coutRevente . "€ <br>";
            //     echo "La différence est de : " . $arrayExemplaires[$i]['PrixAchat'] - $coutRevente . "€";
            //     echo "<br><br>";
            // }
            // echo "<br>";
            ?>

        </div>

        <h3><a href="https://tainix.fr/challenge/Cours-Forrest-Cours">Cours Forrest, Cours !</a></h3>
        <button onclick="displayContent('btn-6')" id="btn-6" class="btn-toggle">Voir réponse</button>
        <div class="btn-6">
            <?php
            // Borne kilométrique à laquelle des Runners rejoignent la course de Forest
            $kms = [58, 86, 156, 238, 309, 405, 440, 529, 619];

            // Nombre de runners qui rejoignent la course. Chaque index du tableau $runners concorde respectivement avec les index du tableau $kms
            $runners = [8, 2, 8, 3, 7, 11, 8, 12, 12];

            // Arrêt de la course pour Forest et l'ensemble des runners
            $stop = 640;

            // Nombre de kms courus par les coureurs en fonction de la borne qu'ils ont rejoint

            function sumKmsRanByRunner($stop, $kms, $i)
            {
                $totalKms = $stop - $kms[$i];
                return $totalKms;
            }

            $arrayKmsRanByRunners = [];
            $sum = [];

            echo "Forest a couru " . $stop . " kms. <br><br>";

            for ($i = 0; $i < count($runners); $i++) {
                $arrayKmsRanByRunners[] = [$runners[$i] => sumKmsRanByRunner($stop, $kms, $i)];
                echo "Les coureurs qui ont rejoint la borne " . $kms[$i] . " sont au nombre de " . $runners[$i] . " runners et ils ont parcouru " . sumKmsRanByRunner($stop, $kms, $i) . " kms. <br>";
                echo "Soit un total de " .  sumKmsRanByRunner($stop, $kms, $i) * $runners[$i] . " kms. <br>";
                $sum[$i] = sumKmsRanByRunner($stop, $kms, $i) * $runners[$i];
            }

            echo "<br>";
            echo "Le total de kms parcourus par Forest et l'ensemble des runners est de " . array_sum($sum) + $stop . " kms.";
            echo "<br> ";

            echo $stop . ", ";
            foreach ($arrayKmsRanByRunners as $key => $value) {
                // arrayKmsRanByRunners est un ensemble de tableaux associatifs
                // $key est le nombre de runners
                // $value est le nombre de kms parcourus par les coureurs d'une borne spécifique
                print_r(array_sum($value));
                echo ", ";
            }
            ?>
        </div>

        <h3><a href="https://tainix.fr/challenge/Braquage-du-coffre">Braquage du coffre #1</a></h3>
        <button onclick="displayContent('btn-7')" id="btn-7" class="btn-toggle">Voir réponse</button>
        <div class="btn-7">
            <?php
            $depart = 4213302;
            $chemin = ['-------', '++++++', '++++++', '+++++', '+++++', '+++++', '++++', '++++', '++++', '++++', '---', '---', '---', '++', '+', '+', '+', '+', '+'];

            for ($i = 0; $i < count($chemin); $i++) {
                $checksOperator = str_contains($chemin[$i], "+");

                if ($chemin[$i] == $checksOperator) {
                    $chemin[$i] = str_replace("+", "0", $chemin[$i]);
                    if ($chemin[$i][0] == 0) {
                        $chemin[$i][0] = 1;
                    }
                } else {
                    $chemin[$i] = str_replace("-", "0", $chemin[$i]);
                    if ($chemin[$i][0] == 0) {
                        $chemin[$i][0] = 1;
                        $chemin[$i] = $chemin[$i] * -1;
                    }
                }
                echo $chemin[$i] . " <br>";
            }
            $sumChemin = array_sum($chemin);
            echo "Le code saisi au départ est " . $depart . " puis on fait les opérations ci-dessus pour trouver la bonne combinaison. <br>";
            echo "La bonne combinaison est " . $depart + $sumChemin;
            ?>
        </div>

        <h3><a href="https://tainix.fr/challenge/Le-Sac-de-l-Aventurier-1">Le Sac de l’Aventurier #1</a></h3>
        <button onclick="displayContent('btn-8')" id="btn-8" class="btn-toggle">Voir réponse</button>
        <div class="btn-8">
            <?php
            $initialSac = 846;
            $sac = 846;
            $objets = [90, 44, 88, 22, 82, 47, 84, 26, 19, 37, 65, 30, 60, 45, 61, 63, 51, 24, 39, 28, 55, 34, 29, 79, 68, 35, 89, 66, 43, 56, 52, 77, 20, 59, 76, 10, 49, 78, 36, 41, 42, 86, 13, 12, 81, 23, 21, 38, 62, 48, 54, 15, 32];

            // Trie le tableau dans l'ordre décroissant DESC
            $bigObjets = [];
            rsort($objets);
            echo "<br>";

            for ($i = 0; $i < 10; $i++) {
                $bigObjets[$i] = $objets[$i];
            }
            // print_r($bigObjets);
            echo "<br>";

            //Trie le tableau dans l'ordre croissant ASC
            $smallObjets = [];
            asort($objets);

            $loopReverseLimitor = key($objets) - 9;

            for ($i = key($objets); $i >= $loopReverseLimitor; $i--) {
                $smallObjets[$i] = $objets[$i];
            }
            // print_r($smallObjets);

            // Remplit le sac objet par objet tant que le volume du sac mis à jour le permet
            echo $sac . "<br>";
            for ($iRemplissageBig = 0; $iRemplissageBig < count($bigObjets); $iRemplissageBig++) {
                $sac = $sac - $bigObjets[$iRemplissageBig];
                if ($bigObjets[$iRemplissageBig] < $sac) {
                    echo $sac . "<br>";
                } else {
                    echo "Après remplissage gros sac : " . $sac;
                    break;
                }
            }

            // echo key($smallObjets);
            $loopReverseLimitorBis = key($objets) - 9;

            for ($iRemplissageSmall = key($smallObjets); $iRemplissageSmall >= $loopReverseLimitorBis; $iRemplissageSmall--) {
                if ($smallObjets[$iRemplissageSmall] < $sac) {
                    $sac = $sac - $smallObjets[$iRemplissageSmall];
                    echo $sac . "<br>";
                } else {

                    echo "<br> Volume restant après tentative remplissage avec petits objets : " . $sac;
                    echo "<br> Les objets gros et petits occupent un espace total limite de " . $initialSac - $sac;
                    break;
                }
            }
            ?>

        </div>

        <h3><a href="https://tainix.fr/challenge/Vegeta-combat-ses-ennemis">Vegeta combat ses ennemis
            </a></h3>
        <button onclick="displayContent('btn-9')" id="btn-9" class="btn-toggle">Voir réponse</button>
        <div class="btn-9">
            <?php
            // Végéta perd il augmente niveau +1
            // Nouveau calcul puissance
            // Végéta gagne, sa force augmente, son niveau de transformation est maintenu
            // S'il gagne, sa force prend 10% puis sa puissance est recalculéee

            $ennemis = [76, 157, 424, 441, 465, 610, 624, 702, 964, 982, 1181, 1446, 1467];
            $force_vegeta = 135;

            $iTransformation = 1;

            $puissanceVegeta = $force_vegeta * $iTransformation;
            $previousTransformation = 0;
            echo "Force initiale : " . $puissanceVegeta . "<br>";

            for ($i = 0; $i < count($ennemis);) {
                for ($iTransformation = 1; $puissanceVegeta < $ennemis[$i];) {
                    $iTransformation++;
                    $puissanceVegeta = $force_vegeta * $iTransformation;
                    echo "L'adversaire $i de puissance " . $ennemis[$i] . "<br>";
                    echo "Je monte d'un niveau ! " . $iTransformation . "<br>";
                    echo "Puissance après Transformation : " . $puissanceVegeta . "<br><br>";
                    $previousTransformation = $iTransformation;
                }
                if ($puissanceVegeta >= $ennemis[$i]) {
                    echo "L'adversaire $i de puissance " . $ennemis[$i] . " est vaincu <br>";
                    $force_vegeta = floor($force_vegeta + ($ennemis[$i] * 0.1));
                    echo "Nouvelle force : " . $force_vegeta . "<br>";
                    $i++;
                    $puissanceVegeta = $force_vegeta * $previousTransformation;
                    echo "Niveau transformation : " . $previousTransformation . "<br>";
                    echo "La puissance de végéta passe à : " . $puissanceVegeta . "<br><br>";
                }
            }
            ?>
        </div>

        <h3><a href="https://tainix.fr/challenge/Code-Cesar">Code César</a></h3>
        <button onclick="displayContent('btn-10')" id="btn-10" class="btn-toggle">Voir réponse</button>
        <div class="btn-10">
            <?php
            $decalage = -10;
            $mot_crypte = 'qdjyuddu';
            $splitMotScrypte = str_split($mot_crypte);

            for ($i = 0; $i < count($splitMotScrypte); $i++) {
                // parcourt les lettres du mot crypté
                echo $splitMotScrypte[$i];
            }

            ?>
        </div>

        <h3><a href="https://www.hackerrank.com/tests/bqm28j2teej/login?b=eyJ1c2VybmFtZSI6InRhaXlhbmc3ODE5MEBnbWFpbC5jb20iLCJwYXNzd29yZCI6ImFhZGIwNTgxIiwiaGlkZSI6dHJ1ZSwiYWNjb21tb2RhdGlvbnMiOnsiYWRkaXRpb25hbF90aW1lX3BlcmNlbnQiOjB9fQ==">HackerRank algo - SQLI</a></h3>
        <button onclick="displayContent('btn-11')" id="btn-11" class="btn-toggle">Voir réponse</button>
        <div class="btn-11">
            <?php
            echo "TEST HACKER RANK";

            echo "<h4>Anagram</h4>";
            // Write your code here

            // array with words lefts and sorted by ASC
            // min 0 letters and max n letters

            // $n = 'parisine,pinerais,marino,romina,miera,raime';
            // $array_n = explode(",", $n);



            // for ($iStringN = 0; $iStringN < count($array_n) ; $iStringN++) { 
            //     $arrayLetterEachWord = str_split($array_n[$iStringN]);

            //     in_array($arrayLetterEachWord, $array_n[$iStringN]);

            //     if (str_contains($array_n[$iStringN], "a")) {
            //         # code...
            //     }
            // //    echo "<br>" . print_r(count_chars($array_n[$iStringN], 3));
            // }
            ?>

        </div>

        <h3><a href="https://www.codewars.com/kata/576bb71bbbcf0951d5000044/train/php">Arrays - Code Wars</a></h3>
        <button onclick="displayContent('')" id="" class="btn-toggle">Voir réponse</button>
        <div class="btn-">
            <?php
            echo "<h4><a href='https://www.codewars.com/kata/576bb71bbbcf0951d5000044'>
            Count of positives / sum of negatives</a></h4>";
            
            $input = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, -11, -12, -13, -14, -15];

            if (empty($input) == true) {
                return "";
            } else {
                $positiveValuesArray = [];
                $negativeValuesArray =  [];

                for ($iValuesInputArray = 0; $iValuesInputArray < count($input); $iValuesInputArray++) {
                    if ($input[$iValuesInputArray] <= 0) {
                        $negativeValuesArray[] = $input[$iValuesInputArray];
                        $sum = array_sum($negativeValuesArray);
                    } else {
                        $positiveValuesArray[]  = $input[$iValuesInputArray];
                        $count = count($positiveValuesArray);
                    }
                }

                echo "Somme valeurs négatives : ";
                var_dump(array_sum($negativeValuesArray));

                echo "<br> Compte de valeurs positives : ";
                echo count($positiveValuesArray) . "<br>";

                echo "Nouveau tableau de valeurs : <br>";
                $newArraySortedOutValues = [$count, $sum];
                var_dump($newArraySortedOutValues);
            }

            echo "<h4><a href='https://www.codewars.com/kata/57f781872e3d8ca2a000007e/train/php'>Beginner - Lost Without a Map
            </a></h4>";

            $xArray = [1, 2, 3];
            $newValue = [];

            for ($i = 0; $i < count($xArray); $i++) {
                $newValue[$i] = $xArray[$i] * 2;
            }
            var_dump($newValue);
            echo "<br>";

            echo "<h4><a href='https://www.codewars.com/kata/56676e8fabd2d1ff3000000c/train/php'>A Needle in the Haystack</a></h4>";

            $haystack = ["hay", "junk", "hay", "hay", "moreJunk", "needle", "randomJunk"];

            for ($iHaystack = 0; $iHaystack < count($haystack); $iHaystack++) {
                if (in_array("needle", $haystack) == true) {
                    $output = "found the needle at position " . array_search("needle", $haystack);
                }
            }
            echo $output;

            echo "<br>";

            echo "<h4><a href='https://www.codewars.com/kata/515e271a311df0350d00000f/train/php'>Square(n) Sum
            </a></h4>";

            $data = [1, 2, 2];
            $newDataSquared = [];

            for ($iDataToSquare = 0; $iDataToSquare < count($data); $iDataToSquare++) {
                // Convert data to GMP square values
                pow($data[$iDataToSquare], 2);
                // echo pow($data[$iDataToSquare], 2);

                $dataSquarredIntoGmp = pow($data[$iDataToSquare], 2);

                // Convert GMP to Integer
                $convertGmpToInt = intval($dataSquarredIntoGmp);

                // Updates array with integer values
                $newDataSquared[$iDataToSquare] = $convertGmpToInt;

                // return $newDataSquared;
            }
            var_dump(array_sum($newDataSquared));
            // sum all value within the new array

            echo "<br>";

            echo "<h4><a href='https://www.codewars.com/kata/5949481f86420f59480000e7/train/php'>Odd or Even?
            </a></h4>";

            $a = [0, -15, -3, 20];

            if (empty($a) == true) {
                $a = [0];
                if (fmod(array_sum($a), 2) == 0) {
                    echo "even";
                } else
                {
                    echo "odd";
                }
            } else 
            {
                if (fmod(array_sum($a), 2) == 0) {
                    echo "even";
                } else
                {
                    echo "odd";
                }
            }
            
            echo "<br>";

            echo "<h4><a href='https://www.codewars.com/kata/5bb904724c47249b10000131'>Total amount of points</a></h4>";       
            
            $games = ["3:1", "2:2", "0:1"];
            $totalPoints = [];

            for ($iGames = 0; $iGames < count($games); $iGames++) { 
                $xVsYScoreSplit = str_split($games[$iGames]);

                if ($xVsYScoreSplit[0] > $xVsYScoreSplit[2]) {
                    $points = 3;
                    $totalPoints[$iGames] = $points;
                } elseif ($xVsYScoreSplit[0] < $xVsYScoreSplit[2]) {
                    $points = 0;
                    $totalPoints[$iGames] = $points;
                } else
                {
                    $points = 1;
                    $totalPoints[$iGames] = $points;
                }
            }
            var_dump(array_sum($totalPoints));
            echo "<br>";
            ?>

        </div>
    </main>
</body>

</html>