<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Réponse Formulaire - Enrichir notre Dictionnaire</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.13/dist/css/uikit.min.css"/>
    <link rel="stylesheet" href="../00-general/formulaire.css"/>
</head>
<body>

<?php

//print_r($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérerion des informations du formulaire
    $type_contribution = $_POST["type-contribution"];
    $type_retribution = $_POST["type-retribution"];
    $langue_E1Ga = isset($_POST["langue-E1Ga"]);
    $langue_E1Gb = isset($_POST["langue-E1Gb"]);
    $langue_E1Gc = isset($_POST["langue-E1Gc"]);
    $langue_E1Gd = isset($_POST["langue-E1Gd"]);
    $langue_E1Ge = isset($_POST["langue-E1Ge"]);
    $langue_E1Gf = isset($_POST["langue-E1Gf"]);
    $autres_langues = $_POST["autres-langues"];
    $type_collaboration = $_POST["type-collaboration"];
    $description_sujet = $_POST["description-sujet"];
    $remarques_suggestions = $_POST["remarques-suggestions"];


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


    // Envoi de l'email à l'administrateur
    $to = "email@example.com";
    $subject = "Association Papille-ON - Formulaire : Enrichir notre Dictionnaire";

    echo "Mail à : $to <br>";
    echo "Sujet : $subject <br>";


    // Conversion des valeurs de champs HTML en texte désiré (exemple : A-1 = "Actif") et spécification de la variable (Exemple : $membre), auquel elles se rattachent
    $contribution = '';
    if ($type_contribution === 'E-1') {
        $contribution = 'Proposer une traduction';
    }
    if ($type_contribution === 'E-2') {
        $contribution = 'Proposer / éditer un sujet manquant';
    }
    if ($type_contribution === 'E-3') {
        $contribution = 'Faire un commentaire sur le contenu';
    }


    $retribution = '';
    if ($type_retribution === 'E1-1') {
        $retribution = 'Contre une rétribution financière';
    }
    if ($type_retribution === 'E1-2') {
        $retribution = 'Contre une rémunération sur les droits d\'auteur <em>(en %)</em>';
    }
    if ($type_retribution === 'E1-3') {
        $retribution = 'En devenant membre';
    }

    // !!! A CONTROLER !!!
    $options_checked = array();

    if ($type_contribution === 'E-1') {
        if ($langue_E1Ga) {
            array_push($options_checked, 'Italien');
        }
        if ($langue_E1Gb) {
            array_push($options_checked, 'Anglais');
        }
        if ($langue_E1Gc) {
            array_push($options_checked, 'Espagnol');
        }
        if ($langue_E1Gd) {
            array_push($options_checked, 'Mandarin');
        }
        if ($langue_E1Ge) {
            array_push($options_checked, 'Russe');
        }
        if ($langue_E1Gf) {
            array_push($options_checked, 'Autre');
        }
    }


    $collaboration = '';
    if ($type_collaboration === 'E2-1') {
        $collaboration = 'En collaboration avec Papille-ON';
    }
    if ($type_collaboration === 'E2-2') {
        $collaboration = 'En expliquant seulement le sujet';
    }


    // Contenu du message
    ?>

    <br>

    <div class="spacing-left">

        <div class="uk-text-center">

            <p>Bonjour <?= $titre ?> <?= $prenom ?> <?= $nom ?>,<br>

            <?php if ($type_contribution == 'E-1') { ?>
                Nous vous remercions d'avance de <b><span class="uk-text-lowercase"><?= $contribution ?></span></b><br>de notre Dictionnaire de la Survie alimentaire.
            <?php } ?>

            <?php if ($type_contribution == 'E-2') { ?>
                Nous vous remercions d'avance de <b><span class="uk-text-lowercase"><?= $contribution ?></span></b><br>à notre Dictionnaire de la Survie alimentaire.
            <?php } ?>

            <?php if ($type_contribution == 'E-3') { ?>
                Nous vous remercions d'avance de <b><span class="uk-text-lowercase"><?= $contribution ?></span></b>,<br>de notre Dictionnaire de la Survie alimentaire.
            <?php } ?>

            </p> <br>

        </div>

        <h3 class="uk-text-center">Contenu du formulaire :</h3>

        <div class="uk-card uk-card-default uk-card-body">

            <h4>Spécifications :</h4>
            <b>Type de contribution :</b>&nbsp; &nbsp;<?= $contribution ?><br>

            <?php if ($type_contribution == 'E-1') { ?>
                <b>Genre de rétribution :</b>&nbsp; &nbsp;<?= $retribution ?><br>
            <?php } ?>

            <!-- Conditions et réponses multiples -->
            <?php if (count($options_checked) > 0) { ?>
            <b>Formes de partenariat :</b><br>
                <ul>
                    <?php for ($i = 0; $i < count($options_checked); $i++) {
                    $my_option_text = $i === 0 ? $options_checked[$i] : ucfirst($options_checked[$i]);
                    ?>
                    <li><?php echo $my_option_text; ?></li>
                    <?php } ?>
                </ul>
            <?php } ?><br>

            <!-- !!! A CONTROLER !!! -->
            <?php if (($type_contribution == 'E-1') && ($langue_E1Gf == 'E1Gf')) { ?>
                <b>Autre(s) langue(s):</b>&nbsp; &nbsp;<?= $autres_langues ?><br>
            <?php } ?>

            <?php if ($type_contribution == 'E-2') { ?>
                <b>Genre de collaboration :</b>&nbsp; &nbsp;<?= $collaboration ?><br>
            <?php } ?>

            <?php if ($type_contribution == 'E-2') { ?>
                <b>Description du sujet :</b><br><?= $description_sujet ?><br>
            <?php } ?>

            <?php if ($type_contribution == 'E-3') { ?>
                <b>Remarques / Suggestions :</b><br><?= $remarques_suggestions ?><br>
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
            <img class="logo" src="../00-general/00-images/logo-association-papille-on-02-positif.png" uk-img="loading: eager"></img>
            <p>Route de Botterens 116 - CH 1652 Botterens<br />Tél.  : <a href="tel:+41 77 442 55 50">+41 77 442 55 50</a><br />www.papille-on.com&nbsp;&nbsp; Email : <a href="mailto:info@papille-on.com">info@papille-on.com</a></p>

        </div>


    </div>


<?php } ?>
