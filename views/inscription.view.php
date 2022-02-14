<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Manga4All</title>
</head>

<body>

<?php
    include_once './header/header_inscription.php';
?>

   
    <h1>PAGE D'INSCRIPTION</h1>
    <form action="" method="post" >
            
        <label for="util_pseudo">Pseudo</label>       
        <input type="text" name="util_pseudo" placeholder="Ex: pseudo">
            
        <label for="util_email">E-mail</label>
        <input type="text" name="util_email" placeholder="Ex: monMail@FAI.com">
              
        <label for="util_conf_email">Confirmation de l'e-mail</label>
        <input type="text" name="util_conf_email" placeholder="Ex: monMail@FAI.com">
            
        <label for="util_mdp">Mot de passe</label>
        <input type="password" name="util_mdp" minlength="3" maxlength="10" placeholder="Ex: P@ssWo4d" >
        
        <label for="util_conf_mdp">Confirmation du mot de passe</label>
        <input type="password" name="util_conf_mdp" minlength="3" maxlength="10" placeholder="Ex: P@ssWo4d">
          
        <div>
            <input id="check" type="checkbox" name="" id="checkbox">
            <p>J'accepte les conditions générales</p>
        </div>

        <input class="submit" type="submit" value="S'inscrire">
            
    </form>
    <p>Vous avez déjà un compte? Connectez-vous <a href="">ICI!</a> </p> <!-- Faire le lien pop-up pour la connexion-->

    <pre>
    <?php
        // $utilisateur_model = new Utilisateur ();
        // $users = $utilisateur_model->showUser();
        // var_dump($users); exit;
    ?>
    </pre>
</body>

</html>
