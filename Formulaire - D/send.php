<?php include_once('../00-general/sendmail.php');
ob_start(); ?>

<html>
<head>
    <meta charset="utf-8">
    <title>Réponse Formulaire - Faire appel à nos services</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.13/dist/css/uikit.min.css"/>
    <link rel="stylesheet" href="https://www.papille-on.com/images/USER/17_extensions/formulaires-dynamiques/00-general/formulaire.css"/>
</head>
<body>

<?php

//print_r($_POST);
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die('you must do a post request');
    exit();
}

if (!isset($_POST['email'])) {
    die('you must enter an email');
    exit();
}

// Récupérerion des informations du formulaire
$type_service = $_POST["type-service"];
$type_formation = $_POST["type-formation"];
$type_animation = $_POST["type-animation"];
$date_formation = $_POST["date-formation"];
$date_animation = $_POST["date-animation"];
$duree_animation = $_POST["duree-animation"];
$description_animation = $_POST["description-animation"];

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

// Conversion des valeurs de champs HTML en texte désiré (exemple : A-1 = "Actif") et spécification de la variable (Exemple : $membre), auquel elles se rattachent
$service = '';
if ($type_service === 'D-1') {
    $service = 'Suivre un cours / une formation';
}
if ($type_service === 'D-2') {
    $service = 'Réserver une animation / un atelier pédagogique';
}
if ($type_service === 'D-3') {
    $service = 'Nous inviter à un événement, une conférence ou pour une interview';
}


$formation = '';
if ($type_formation === 'D1-1') {
    $formation = 'Formation 1 <em>(pour duos de parents et enfants de 3 à 6 ans)</em>';
}
if ($type_formation === 'D1-2') {
    $formation = 'Formation 2 <em>(pour jeunes et futurs parents)</em>';
}
if ($type_formation === 'D1-3') {
    $formation = 'Formation 3 <em>(pour enseignants)</em>';
}


$animation = '';
if ($type_animation === 'D2-1') {
    $animation = 'Ateliers pédagogiques fixes';
}
if ($type_animation === 'D2-2') {
    $animation = 'Animation / Ateliers pédagogiques mobiles';
}


// Contenu du message
?>

<br>

<div class="spacing-left spacing-right">

    <div class="uk-text-center">

        <p>Bonjour <?= $titre ?> <?= $prenom ?> <?= $nom ?>,<br>

        <?php if ($type_service == 'D-1') { ?>
            Nous vous remercions d'avoir choisi de <b><span class="uk-text-lowercase"><?= $service?></span></b> avec notre association Papille-ON.
        <?php } ?>

        <?php if ($type_service == 'D-2') { ?>
            Nous vous remercions d'avoir choisi de <b><span class="uk-text-lowercase"><?= $service ?></span></b><br>chez l'un de nos partenaires, par le biais de notre association Papille-ON.
        <?php } ?>

        <?php if ($type_service == 'D-3') { ?>
            Nous vous remercions de <b><span class="uk-text-lowercase"><?= $service ?></span></b>,<br>ainsi que pour la confiance que vous portez à notre association Papille-ON.
        <?php } ?>

        </p> <br>

    </div>

    <h3 class="uk-text-center">Contenu du formulaire :</h3>

    <div class="uk-card uk-card-default uk-card-body">

        <h4>Spécifications :</h4>
        <b>Type de services :</b>&nbsp; &nbsp;<?= $service ?><br>

        <?php if ($type_service == 'D-1') { ?>
            <b>Choix de formation :</b>&nbsp; &nbsp;<?= $formation ?><br>
        <?php } ?>

        <?php if (($type_service == 'D-1') && ($type_formation == 'D1-1')) { ?>
            <b>Date de formation :</b>&nbsp; &nbsp;<?= $date_formation ?><br>
        <?php } ?>

        <?php if ($type_service == 'D-2') { ?>
            <b>Choix de l'atelier / animation :</b>&nbsp; &nbsp;<?= $animation ?><br>
        <?php } ?>

        <?php if (($type_service == 'D-2') && ($type_animation == 'D2-2')) { ?>
            <b>Date de l'atelier / animation :</b>&nbsp; &nbsp;<?= $date_animation ?><br>
        <?php } ?>

        <?php if (($type_service == 'D-2') && ($type_animation == 'D2-2')) { ?>
            <b>Durée de l'atelier / animation :</b>&nbsp; &nbsp;<?= $duree_animation ?><br>
        <?php } ?>

        <?php if (($type_service == 'D-2') && ($type_animation == 'D2-2')) { ?>
            <b>Description de l'atelier / animation :</b><br><?= $description_animation ?><br>
        <?php } ?>




    </div>

    <div class="uk-card uk-card-default uk-card-body">

        <h4>Coordonnées :</h4>
        <b>Organisation :</b>&nbsp; &nbsp;<?= $organisation ?><br>
        <br>
        <b>Titre :</b>&nbsp; &nbsp;<?= $titre ?><br>
        <b>Prénom :</b>&nbsp; &nbsp;<?= $prenom ?><br>
        <b>Nom :</b>&nbsp; &nbsp;<?= $nom ?><br>
        <br>
        <b>Adresse :</b>&nbsp; &nbsp;<?= $adresse ?><br>
        <b>Code postal :</b>&nbsp; &nbsp;<?= $code_postal ?><br>
        <b>Ville :</b>&nbsp; &nbsp;<?= $ville ?><br>
        <b>Pays :</b>&nbsp; &nbsp;<?= $pays ?><br>
        <br>
        <b>Téléphone :</b>&nbsp; &nbsp;<?= $telephone ?><br>
        <b>Email :</b>&nbsp; &nbsp;<?= $email ?><br>
        <b>Site Web :</b>&nbsp; &nbsp;<?= $siteweb ?><br>
        <br>
        <b>Message :</b><br><?= $message ?><br>

    </div><br><br>


    <div class="uk-text-center">

        <p>Avec nos meilleures salutations.<br />Valentin Pasquier<br /><br /></p>
        <img class="logo" src="https://www.papille-on.com/images/USER/17_extensions/formulaires-dynamiques/00-general/00-images/logo-association-papille-on-02-positif.png" uk-img="loading: eager">
        <p>Route de Botterens 116 - CH 1652 Botterens<br />Tél.  : <a href="tel:+41 77 442 55 50">+41 77 442 55 50</a><br />www.papille-on.com&nbsp;&nbsp; Email : <a href="mailto:info@papille-on.com">info@papille-on.com</a></p>

    </div>
</div>
</body>
</html>

<?php

$mail_body = ob_get_clean();

$subject = "Association Papille-ON - Formulaire : Faire appel à nos services";
$to = $_POST['email'];

$sendMailResult = sendEmail($to, $subject, $mail_body);

if ($sendMailResult == 1) {
    // success
    header("Location: https://www.papille-on.com/#success", true, 302);
    exit();
} else {
    // error
    header("Location: https://www.papille-on.com/#error", true, 302);
    exit();
}

?>
