<?php

// print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les informations du formulaire
    $devenir_membre = $_POST["devenir-membre"];
    $type_membre = $_POST["type_membre"];
    $autre_montant = $_POST["autre-montant"];
    $organisation = $_POST["organisation"];
    $titre = $_POST["titre"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $adresse = $_POST["adresse"];
    $code_postal = $_POST["code-postal"];
    $ville = $_POST["ville"];
    $pays = $_POST["pays"];
    $telephone = $_POST["telephone"];
    $email = $_POST["email"];
    $siteweb = $_POST["siteweb"];
    $message = $_POST["message"];

    $form_content = "Devenir membre : $devenir_membre<br>";
    $form_content .= "Type de membre : $type_membre<br>";
    $form_content .= "Autre montant : $autre_montant<br>";
    $form_content .= "Organisation : $organisation<br>";
    $form_content .= "Titre : $titre<br>";
    $form_content .= "Prénom : $prenom<br>";
    $form_content .= "Nom : $nom<br>";
    $form_content .= "Adresse : $adresse<br>";
    $form_content .= "Code postal : $code_postal<br>";
    $form_content .= "Ville : $ville<br>";
    $form_content .= "Pays : $pays<br>";
    $form_content .= "Téléphone : $telephone<br>";
    $form_content .= "Email : $email<br>";
    $form_content .= "Site Web : $siteweb<br>";
    $form_content .= "Message : $message<br>";

    // Envoi de l'email à l'administrateur
    $to = "email@example.com";
    $subject = "Nouvelle demande de membre";

    echo "Mail à : $to <br>";
    echo "Sujet : $subject <br>";
    echo "<br><span style=\"text-decoration: underline;\">Contenu du formulaire :</span><br> $form_content <br><br>";

    $membre = '';
    if ($devenir_membre === 'A-1') {
        $membre = 'actif';
    }
    if ($devenir_membre === 'A-2') {
        $membre = 'participatif';
    }
    if ($devenir_membre === 'A-3') {
        $membre = 'passif';
    }

    ?>

    <strong>Exemple de message :</strong>
    <p>Bonjour <?= $titre ?> <strong><?= $prenom ?> <?= $nom ?></strong>,<br>
    <?php if ($type_membre == 'A3-1') { ?>
        Merci d'avoir choisi de faire un don mensuel à notre association !
    <?php } if ($type_membre == 'A3-2') { ?>
        Merci d'avoir choisi de faire un don annuel à notre association !
    <?php } ?>
    <?php if ($type_membre == 'A3-3') { ?>
        Merci d'avoir choisi de faire un don d'un montant de <?= $autre_montant ?> à notre association !
    <?php } ?>

    <br>En tant que membre <?= $membre ?>, ...
<?php } ?>
