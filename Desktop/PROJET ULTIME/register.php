<?php
include_once 'models/user.php';
include_once 'controllers/registerCTRL.php';
?>
<div class="container">
<p><?= //TERNAIRE qui permet d'afficher en haut de la page, que si le formulaire a été accepté ou non.
     isset($addUserMessage) ? $addUserMessage : '' ?></p>
    <form action="register.php" method="POST">
        <div class="form-group">
            <label for="lastName">Nom :</label>
            <input type="text" class="form-control" id="lastName" aria-describedby="lastName" name="lastName" onblur="checkUnavailability(this)" />
            <?php if (isset($formErrors['lastName'])) { ?>
                <p class="text-danger"><?= $formErrors['lastName'] ?></p>
            <?php } else { ?>
                <small id="lastNameHelp" class="form-text text-muted">Veuillez renseigner votre nom</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="firstName">Prénom d'utilisateur :</label>
            <input type="text" class="form-control" id="firstName" aria-describedby="firstNameHelp" name="firstName" onblur="checkUnavailability(this)" />
            <?php if (isset($formErrors['firstName'])) { ?>
                <p class="text-danger"><?= $formErrors['firstName'] ?></p>
            <?php } else { ?>
                <small id="firstNameHelp" class="form-text text-muted">Veuillez renseigner votre prénom</small>
            <?php } ?>
        </div>

        <div class="form-group">
            <label for="birthDate">Date de naissance :</label>
            <input type="date" class="form-control" id="birthDate" aria-describedby="birthDateHelp" name="birthDate" onblur="checkUnavailability(this)" />
            <?php if (isset($formErrors['birthDate'])) { ?>
                <p class="text-danger"><?= $formErrors['birthDate'] ?></p>
            <?php } else { ?>
                <small id="birthDateHelp" class="form-text text-muted">Veuillez renseigner votre prénom</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="phoneNumber">Numéro de téléphone :</label>
            <input type="number" class="form-control" id="phoneNumber" aria-describedby="phoneNumberHelp" name="phoneNumber" onblur="checkUnavailability(this)" />
            <?php if (isset($formErrors['phoneNumber'])) { ?>
                <p class="text-danger"><?= $formErrors['phoneNumber'] ?></p>
            <?php } else { ?>
                <small id="phoneNumberHelp" class="form-text text-muted">Veuillez renseigner votre numéro de téléphone</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="mail">Adresse mail :</label>
            <input type="email" class="form-control" id="mail" aria-describedby="mailHelp" name="mail" onblur="checkUnavailability(this)" />
            <?php if (isset($formErrors['mail'])) { ?>
                <p class="text-danger"><?= $formErrors['mail'] ?></p>
            <?php } else { ?>
                <small id="mailHelp" class="form-text text-muted">Veuillez renseigner votre adresse mail</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password" />
            <?php if (isset($formErrors['password'])) { ?>
                <p class="text-danger"><?= $formErrors['password'] ?></p>
            <?php } else { ?>
                <small id="passwordHelp" class="form-text text-muted">Veuillez renseigner votre mot de passe</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="passwordVerify">Mot de passe (confirmation) :</label>
            <input type="password" class="form-control" id="passwordVerify" aria-describedby="passwordVerifyHelp" name="passwordVerify" />
            <?php if (isset($formErrors['passwordVerify'])) { ?>
                <p class="text-danger"><?= $formErrors['passwordVerify'] ?></p>
            <?php } else { ?>
                <small id="passwordVerifyHelp" class="form-text text-muted">Veuillez confirmer votre mot de passe</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="siretNumber">Siret :</label>
            <input type="text" class="form-control" id="siretNumber" aria-describedby="siretNumberHelp" name="siretNumber" onblur="checkUnavailability(this)" />
            <?php if (isset($formErrors['siretNumber'])) { ?>
                <p class="text-danger"><?= $formErrors['siretNumber'] ?></p>
            <?php } else { ?>
                <small id="siretNumberHelp" class="form-text text-muted">Veuillez renseigner votre numéro de Siren ou Siret</small>
            <?php } ?>
        </div>
        <div class="form-group">
            <label for="sirenNumber">Siren :</label>
            <input type="text" class="form-control" id="sirenNumber" aria-describedby="SirenHelp" name="sirenNumber" onblur="checkUnavailability(this)" />
            <?php if (isset($formErrors['sirenNumber'])) { ?>
                <p class="text-danger"><?= $formErrors['sirenNumber'] ?></p>
            <?php } else { ?>
                <small id="sirenNumberHelp" class="form-text text-muted">Veuillez renseigner votre numéro de Siren ou Siret</small>
            <?php } ?>
        </div>

        <select name=''>
<?
// on définit les deux champs
// on fait un foreach
?>
<option value="<? echo "on récupère les régions"; ?>"></option>
<?
}
?>
</select>

        <select name=''>
<?
// on définit les deux champs
// on fait un foreach
?>
<option value="<? echo "récupérer les numéros des départements"; ?>"><? echo "les départments"; ?></option>
<?
}
?>
</select>
</form>

        <button type="submit" name="addUsers" class="btn btn-primary">S'inscrire</button>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="assets/js/script.js"></script>
    </form>
</div>