<?php
//la regexAge permet de sécuriser la date de naissance 
$regexAge = '%^(19((0[4|8])|([1|3|5|7|9][2|6])|([2|4|6|8][0|4|8]))[ \-\/]02[ \-\/]((0[1-9])|([1|2][0-9])))|((20((0[0|4|8])|(1[2|6])|20))[ \-\/]02[ \-\/]((0[1-9])|([1|2][0-9])))|((19[0-9][0-9])|(20([0-1][0-9])|20))[ \-\/]((((0[4|6|9])|11)[ \-\/]((0[1-9])|([1|2][0-9])|30))|(((0[1|3|5|7|8])|1([0|2]))[ \-\/]((0[1-9])|([1|2][0-9])|3([0-1]))))$%';
$regexName = '%^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,1}$%';
$regexPhoneNumber = '%^((\+33[0-9]{9})|(0[1-9][ .\/-]?([0-9]{2}[ .\/-]?){4})){1}$%';
$formErrors = array();
$siretNumber = '';
$sirenNumber = '';
if (isset($_POST['addUsers'])) {
    //on créer une variable qui appelle la class.
    $user = new user();
    if (!empty($_POST['lastName'])) {
        //vérifie la correspondance entre la regex et ce qu'il a été écrit dans l'input du lastName.
        if (preg_match($regexName, $_POST['lastName'])) {
            //htmlspecialchars = permet que les input n'est pas la capacité d'insérer d'attributs (les balises, ça va compromettre la sécurité. Genre un <p>dans prénom</p>)
            //$user->lastName : permet de récupérer l'attribut dans la classe.
            $user->lastName = htmlspecialchars($_POST['lastName']);
        } else {
            $formErrors['lastName'] = 'Le champ nom doit être de la forme Delarue';
        }
    } else {
        $formErrors['lastName'] = 'Le champ nom ne doit pas être vide.';
    }
    if (!empty($_POST['firstName'])) {
        if (preg_match($regexName, $_POST['firstName'])) {
            $user->firstName = htmlspecialchars($_POST['firstName']);
        } else {
            $formErrors['firstName'] = 'Le champ prénom doit être de la forme "Maxime" .';
        }
    } else {
        $formErrors['firstName'] = 'Le champ prénom ne doit pas être vide.';
    }
    if (!empty($_POST['birthDate'])) {
        if (preg_match($regexAge, $_POST['birthDate'])) {
            $user->birthDate = htmlspecialchars($_POST['birthDate']);
        } else {
            $formErrors['birthDate'] = 'Cet âge n\'est pas plausible';
        }
    } else {
        $formErrors['birthDate'] = 'Votre âge n\'est pas renseigné';
    }
    if (!empty($_POST['mail'])) {
        // remplace la regex de l'adresse e-mail par FILTER_VALIDATE_EMAIL.
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $user->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formErrors['mail'] = 'L\'adresse mail doit être de la bonne forme.';
        }
    } else {
        $formErrors['mail'] = 'L\'adresse mail ne doit pas être vide.';
    }
    if (empty($_POST['password'])) {
        $formErrors['password'] = 'Le mot de passe ne doit pas être vide.';
        $isPasswordOk = false;
    }
    if (empty($_POST['passwordVerify'])) {
        $formErrors['passwordVerify'] = 'Le mot de passe (confirmation) ne doit pas être vide.';
        $isPasswordOk = false;
    }
    //Si les vérifications des mots de passe sont ok
    if ($isPasswordOk = true) {
        if ($_POST['passwordVerify'] == $_POST['password']) {
            //On hash le mot de passe avec la méthode de PHP
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $formErrors['password'] = $formErrors['passwordVerify'] = 'Les mots de passe ne sont pas identiques';
        }
    }
    if (!empty($_POST['phoneNumber'])) {
        if (preg_match($regexPhoneNumber, $_POST['phoneNumber'])) {
            $user->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
        } else {
            $formErrors['phoneNumber'] = 'Ce numéro est merdique.';
        }
    } else {
        $formErrors['phoneNumber'] = 'Votre numéro de téléphone n\'est pas renseigné.';
    }
    if (!empty($_POST['siretNumber'])) {
        //strlen permet de donner à mes siren/siret la longueur de leurs champs
        if (strlen($_POST['siretNumber']) == 14) {
            $user->siretNumber = htmlspecialchars($_POST['siretNumber']);
        } else {
            $formErrors['siretNumber'] = 'ça marche jamais putain';
        }
    }
    if (!empty($_POST['sirenNumber'])) {
        // 
        if (strlen($_POST['sirenNumber']) == 9){
            $user->sirenNumber = htmlspecialchars($_POST['sirenNumber']);
        } else {
            $formErrors['sirenNumber'] = 'numéro de Siret/Siren invalide';
        }
    }
    //Traitement de la demande AJAX
    if (empty($formErrors)) {
        $isOk = true;
        //On vérifie si le pseudo est libre
        if ($user->checkUserUnavailabilityByFieldName(['lastName'])) {
            $formErrors['lastName'] = 'Cet utilisateur existe déjà.';
            $isOk = false;
        }
        if ($user->checkUserUnavailabilityByFieldName(['firstName'])) {
            $formErrors['firstName'] = 'Cet utilisateur existe déjà.';
            $isOk = false;
        }
        //On vérifie si le mail est libre
        if ($user->checkUserUnavailabilityByFieldName(['mail'])) {
            $formErrors['mail'] = 'L\'adresse mail est déjà utilisée.';
            $isOk = false;
        }
        //Si c'est bon on ajoute l'utilisateur
        /* if ($isOk) {
            $user->addUserInfo();
        } */
    }
            if($user->addUserInfo()){
              $addUserMessage = 'Votre compte a bien été créée';
            } else {
                $addUserMessage = 'Une erreur est survenue.';
            }
}
    if (isset($_POST['fieldValue'])) {
        //On vérifie que l'on a bien envoyé des données en POST
        if (!empty($_POST['fieldValue']) && !empty($_POST['fieldName'])) {
            //On inclut les bons fichiers car dans ce contexte ils ne sont pas connu.
            include_once '../config.php';
            include_once '../models/user.php';
            $user = new user();
            $input = htmlspecialchars($_POST['fieldName']);
            $user->$input = htmlspecialchars($_POST['fieldValue']);
            //Le echo sert à envoyer la réponse au JS
            echo $user->checkUserUnavailabilityByFieldName([htmlspecialchars($_POST['fieldName'])]);
        } else {
            echo 2;
        }
    }