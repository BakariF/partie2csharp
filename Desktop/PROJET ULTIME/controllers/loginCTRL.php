 <?php 
 $formErrors = [];
//Vérification du formulaire de connexion
if(isset($_POST['login'])){
    $user = new user();
    if(!empty($_POST['mail'])){
        if(filter_var($_POST['mail'],FILTER_VALIDATE_EMAIL)){
            //J'hydrate mon instance d'objet user
            $user->mail = htmlspecialchars($_POST['mail']);
        }else{
            $formErrors['mail'] = MAIL_ERROR_WRONG;
        }
    }else{
        $formErrors['mail'] = MAIL_ERROR_EMPTY;
    }

    if(empty($_POST['password'])){        
        $formErrors['password'] = PASSWORD_ERROR_EMPTY;
    }
    
    if(empty($formErrors)){
        //On récupère le hash de l'utilisateur
       $hash = $user->getUserPasswordHash();
       //Si le hash correspond au mot de passe saisi
       if(password_verify($_POST['password'], $hash)){
           //On récupère son profil
            $userProfil = $user->getUserProfile();
            //On met en session ses informations
            $_SESSION['profile']['id'] = $userProfil->id;
            $_SESSION['profile']['LastName'] = $userProfil->lastName;
            //On redirige vers la page souhaitée.
            header('location:index.php');
            exit();
       }else{
           $formErrors['password'] = $formErrors['mail'] = LOGIN_ERROR;
       }
    }
} ?>