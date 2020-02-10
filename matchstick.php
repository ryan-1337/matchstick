<?php 


function ez_game()
{
    // Lire un fichier instruction.txt pour afficher les regles du jeux.
    echo "\033[31m EASY MOD\033[0m \n";
    readline("Bienvenu sur MatchStick pour ouvrir le manuel du jeux faite CTRL-C pour quitter et relancer le jeu avec --help comme option sinon appuyer sur entrer pour lancer le jeu");
    do {
        $nb_stick = intval(readline("Veuillez entrer un nombre d'allumette entre 11 et 31 \n"));
    } while ($nb_stick < 11 || $nb_stick > 31);
    $stick = str_repeat("|", $nb_stick);
    echo $stick . PHP_EOL;
    if($nb_stick >= 1)
    {
        while($nb_stick >= 1)
        {
            $player1 = "Joueur";
            $ia = "L'IA";
            $player = readline("Au tour du Joueur : ");
            if(intval($player >= 4) || intval($player < 1) || intval($player) > $nb_stick)
            {
                do {
                    echo "Error : invalid input ( positive number expected ) \n";
                    $player = readline("Au tour du Joueur : ");
                } while(intval($player) >= 4 || intval($player) < 1 || intval($player) > $nb_stick);
            }

            $matches = intval($player);
            echo "Le Joueur à supprimé $matches allumette \n";
            $stick = str_repeat("|", $nb_stick - $matches);
            $nb_stick = $nb_stick - $matches;
            echo $stick . PHP_EOL;
            check_win($nb_stick, $player1);
            echo "Au tour de L'IA ... \n";
            if($nb_stick >= 3)
                $ia_matches = random_int(1, 3);
            else
                $ia_matches = 1;
            echo "L'IA  à supprimer $ia_matches allumette \n";
            $stick = str_repeat("|", $nb_stick - $ia_matches);
            $nb_stick = $nb_stick - $ia_matches;
            echo $stick . PHP_EOL;
            check_win($nb_stick, $ia);
            echo "$nb_stick alumettes restantes". PHP_EOL;
        }
    }
}

function normal_game()
{
    echo "\033[31m NORMAL MOD\033[0m \n";
    readline("Bienvenu sur MatchStick pour ouvrir le manuel du jeux faite CTRL-C pour quitter et relancer le jeu avec --help comme option sinon appuyer sur entrer pour lancer le jeu");
    do {
        $nb_stick = intval(readline("Veuillez entrer un nombre d'allumette entre 11 et 31 \n"));
    } while ($nb_stick < 11 || $nb_stick > 31);
    $stick = str_repeat("|", $nb_stick);
    echo $stick . PHP_EOL;
    if($nb_stick >= 1)
    {
        while($nb_stick >= 1)
        {
            $player1 = "Joueur";
            $ia = "L'IA";
            $player = readline("Au tour du Joueur : ");
            if(intval($player >= 4) || intval($player < 1) || intval($player) > $nb_stick)
            {
                do {
                    echo "Error : invalid input ( positive number expected ) \n";
                    $player = readline("Au tour du Joueur : ");
                } while(intval($player) >= 4 || intval($player) < 1 || intval($player) > $nb_stick);
            }

            $matches = intval($player);
            echo "Le Joueur à supprimé $matches allumette \n";
            $stick = str_repeat("|", $nb_stick - $matches);
            $nb_stick = $nb_stick - $matches;
            echo $stick . PHP_EOL;
            check_win($nb_stick, $player1);
            echo "Au tour de L'IA ... \n";
            if($nb_stick == 6 || $nb_stick == 10)
                $ia_matches = 1;
            elseif($nb_stick == 7 || $nb_stick == 3)
                $ia_matches = 2;
            else
                $ia_matches = 1;
            echo "L'IA  à supprimer $ia_matches allumette \n";
            $stick = str_repeat("|", $nb_stick - $ia_matches);
            $nb_stick = $nb_stick - $ia_matches;
            echo $stick . PHP_EOL;
            check_win($nb_stick, $ia);
            echo "$nb_stick alumettes restantes". PHP_EOL;
        }
    }
}

function hard_game()
{
    echo "\033[31m HARD MOD\033[0m \n";
    readline("Bienvenu sur MatchStick pour ouvrir le manuel du jeux faite CTRL-C pour quitter et relancer le jeu avec --help comme option sinon appuyer sur entrer pour lancer le jeu");

    do {
        $nb_stick = intval(readline("Veuillez entrer un nombre d'allumette entre 11 et 31 \n"));
    } while ($nb_stick < 11 || $nb_stick > 31);
    $stick = str_repeat("|", $nb_stick);
    echo $stick . PHP_EOL;
    if($nb_stick >= 1)
    {
        while($nb_stick >= 1)
        {
            $player1 = "Joueur";
            $ia = "L'IA";
            $player = readline("Au tour du Joueur : ");
            if(intval($player >= 4) || intval($player < 1) || intval($player) > $nb_stick)
            {
                do {
                    echo "Error : invalid input ( positive number expected ) \n";
                    $player = readline("Au tour du Joueur : ");
                } while(intval($player) >= 4 || intval($player) < 1 || intval($player) > $nb_stick);
            }

            $matches = intval($player);
            echo "Le Joueur à supprimé $matches allumette \n";
            $stick = str_repeat("|", $nb_stick - $matches);
            $nb_stick = $nb_stick - $matches;
            echo $stick . PHP_EOL;
            check_win($nb_stick, $player1);
            echo "Au tour de L'IA ... \n";
            if ($nb_stick > 2 && $nb_stick == 8)
                $ia_matches = 3;
            elseif($nb_stick > 2 && $nb_stick != 9 && $nb_stick != 5 && $nb_stick != 10)
                $ia_matches = hard_ia(4, $matches);
            else
                $ia_matches = 1;
            echo "L'IA  à supprimer $ia_matches allumette \n";
            $stick = str_repeat("|", $nb_stick - $ia_matches);
            $nb_stick = $nb_stick - $ia_matches;
            echo $stick . PHP_EOL;
            check_win($nb_stick, $ia);
            echo "$nb_stick alumettes restantes". PHP_EOL;
        }
    }
}

function versus()
{
     echo "\033[31m VERSUS MOD\033[0m \n";
    readline("Bienvenu sur MatchStick pour ouvrir le manuel du jeux faite CTRL-C pour quitter et relancer le jeu avec --help comme option sinon appuyer sur entrer pour lancer le jeu");
    do {
        $nb_stick = intval(readline("Veuillez entrer un nombre d'allumette entre 11 et 31 \n"));
    } while ($nb_stick < 11 || $nb_stick > 31);
    $stick = str_repeat("|", $nb_stick);
    echo $stick . PHP_EOL;
    if($nb_stick >= 1)
    {
        while($nb_stick >= 1)
        {
            $player1 = "Joueur1";
            $player2 = "Joueur2";
            $player = readline("Au tour du Joueur : ");
            if(intval($player >= 4) || intval($player < 1) || intval($player) > $nb_stick)
            {
                do {
                    echo "Error : invalid input ( positive number expected ) \n";
                    $player = readline("Au tour du Joueur : ");
                } while(intval($player) >= 4 || intval($player) < 1 || intval($player) > $nb_stick);
            }

            $matches = intval($player);
            echo "Le Joueur1 à supprimé $matches allumette \n";
            $stick = str_repeat("|", $nb_stick - $matches);
            $nb_stick = $nb_stick - $matches;
            echo $stick . PHP_EOL;
            echo "$nb_stick alumettes restantes". PHP_EOL;
            check_win($nb_stick, $player1);
            $player2 = intval(readline("Au tour du Joueur2 : "));
            if(intval($player2) >= 4 || intval($player2) < 1 || intval($player2) > $nb_stick)
            {
                do {
                    echo "Error : invalid input ( positive number expected ) \n";
                    $player2 = readline("Au tour du Joueur2 : ");
                } while(intval($player2) >= 4 || intval($player2) < 1 || intval($player2) > $nb_stick);
            }
            echo "Le Joueur2  à supprimer $player2 allumette \n";
            $stick = str_repeat("|", $nb_stick - $player2);
            $nb_stick = $nb_stick - $player2;
            echo $stick . PHP_EOL;
            check_win($nb_stick, $player2);
            echo "$nb_stick alumettes restantes". PHP_EOL;
        }
    }   
}

function hard_ia($a, $b)
{
    return $a - $b;
}

function check_win($nb_stick, $winner)
{
    if($nb_stick == 0)
    {
        die("$winner loose");
    }
    elseif($nb_stick < 0)
    {
        die("$winner loose");
    }
}

function man()
{
    echo "--help for print man\n.
          --easy or nothing for lunch easy mod.\n
          --normal for lunch normal mod.\n
          --hard for lunch hard mod.\n
          --versus for lunch versus mod.\n";
}

function main($argv )
{
    if(!isset($argv[1]) || $argv[1] == "--easy")
        ez_game();
    elseif($argv[1] == "--help")
        man();
    elseif($argv[1] == "--normal")
        normal_game();
    elseif($argv[1] == "--hard")
        hard_game();
    elseif($argv[1] == "--versus")
        versus();
    else
        ez_game();
}

main($argv);

?>
