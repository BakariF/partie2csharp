<?php include('Header.php'); ?>
<?php include('navbar.php'); ?>
<?php
include_once 'models/user.php';
include_once 'controllers/loginCtrl.php';
?>
<div class="container">
    <form action="#" method="POST">
        <div class="form-group">
            <label for="mail">Adresse mail :</label>
            <input type="email" class="form-control" id="mail" aria-describedby="mailHelp" name="mail"/>
            <?php if(isset($formErrors['mail'])){ ?>
                <p class="text-danger"><?= $formErrors['mail'] ?></p>
           <?php }else{ ?>
                <small id="mailHelp" class="form-text text-muted">Merci de renseigner votre adresse mail</small>
           <?php } ?>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password" />
            <?php if(isset($formErrors['password'])){ ?>
                <p class="text-danger"><?= $formErrors['password'] ?></p>
           <?php }else{ ?>
                <small id="passwordHelp" class="form-text text-muted">Merci de renseigner votre mot de passe</small>
                <?php } ?>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Connexion</button>
    </form>
</div>

<?php include('footer.php'); ?>