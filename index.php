<?php
/**
 * Created by PhpStorm.
 * User: akoi-aka
 * Date: 04/07/2017
 * Time: 09:53
 */

#PDO - Partie 1 : Lire des données

//**Exécuter le script colyseum.sql avant de commencer. Tous les résultats devront être afficher dans une page index.php.**
//ok

## Exercice 1
//Afficher tous les clients.
//        - d abord je cree le fichier de connexion a la bdd
//        - puis j utilise une requete select from ...

include('connection.php');
$lastName = $bdd->query('SELECT lastName FROM clients');
$donnees = $lastName->fetchAll();

echo ' <p>EXERCICE 1</p><br>';
foreach ($donnees as $lastName){
    echo '<li> Nom: ' .$lastName->lastName. '<br>';
    echo '</li>';
}
//
//## Exercice 2//
//Afficher tous les types de spectacles possibles.

$spectacles = $bdd->query('SELECT title FROM shows');
$noms = $spectacles->fetchAll();
echo ' <p>EXERCICE 2</p><br>';

foreach ($noms as $nom){
    echo '<p> Spectacles: ' .$nom->title. '</p>';
}
//## Exercice 3
//Afficher les 20 premiers clients.
$lastName = $bdd->query('SELECT lastName FROM clients LIMIT 20');
$donnees = $lastName->fetchAll();

echo ' <p>EXERCICE 3</p><br>';
foreach ($donnees as $lastName){
    echo '<li> Nom: ' .$lastName->lastName. '<br>';
    echo '</li>';
}

//## Exercice 4
//N'afficher que les clients possédant une carte de fidélité.
$lastName = $bdd->query('SELECT lastName FROM clients WHERE card=TRUE ');
$donnees = $lastName->fetchAll();

echo ' <p>EXERCICE 4</p><br>';
foreach ($donnees as $lastName){
    echo '<li> Nom: ' .$lastName->lastName. '<br>';
    echo '</li>';
}

//
//## Exercice 5
////Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".
//Les afficher comme ceci :
//Nom : *Nom du client*
//Prénom : *Prénom du client*
//Trier les noms par ordre alphabétique.
$lastName = $bdd->query('SELECT * FROM clients WHERE lastName LIKE \'m%\' ORDER BY lastName');
$donnees = $lastName->fetchAll();

echo ' <p>EXERCICE 5</p><br>';
foreach ($donnees as $lastName){
    echo '<li> Nom: ' .$lastName->lastName. '<br>';
    echo '<li>Prénom: ' .$lastName->firstName. '</li><br/>';
    echo '</li>';
}


//## Exercice 6
//Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : *Spectacle* par *artiste*, le *date* à *heure*.

$spectacles = $bdd->query('SELECT * FROM shows ORDER BY  title');
$noms = $spectacles->fetchAll();
echo ' <p>EXERCICE 6</p><br>';

foreach ($noms as $nom){
    echo '<p><span> Spectacles : ' .$nom->title. '</span><span> par: ' .$nom->performer. '</span><span> le: ' .$nom->date. '</span><span> à: ' .$nom->startTime. '</span></p>';
}


//## Exercice 7
//Afficher tous les clients comme ceci :
//Nom : *Nom de famille du client*
//Prénom : *Prénom du client*
//Date de naissance : *Date de naissance du client*
//Carte de fidélité : *Oui (Si le client en possède une) ou Non (s'il n'en possède pas)*
//Numéro de carte : *Numéro de la carte fidélité du client s'il en possède une.*

// le code ci-dessous ne fonctionne pas //
$lastName = $bdd->query("SELECT * CASE WHEN type=TRUE, THEN 'OK' ELSE 'NON' FROM clients");
$donnees = $lastName->fetchAll();

echo '<p>EXERCICE 7</p><br>';
foreach ($donnees as $lastName) {
    echo '<li> Nom: ' . $lastName->lastName . '<br>';
//    echo '<li>Prénom: ' . $lastName->firstName . '</li><br/>';
    echo '</li>';
}
// le code ci-dessus ne fonctionne pas //

//
//// POUR SECURISER LE CODE AVEC PHP CONTRE DES INJECTIONS NUISIBLES MYSQL
//function sanitize_string($str) {
//    if (get_magic_quotes_gpc()) {
//        $sanitize = mysqli_real_escape_string(stripslashes($str));
//    } else {
//        $sanitize = mysqli_real_escape_string($str);
//    }
//    return $sanitize;
//}
?>