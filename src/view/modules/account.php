<?php
    if (!empty($_GET['status'])){
        $status =$_GET['status'];
      if ($status == "login_fail") :?>
          <div id="alert" class="alert alert-danger error" style="margin: 5px 30px 30px; text-align: center">La connexion a échoué. Vérifiez vos identifiants et réessayez.</div>
<?php elseif ($status == "signin_fail") :?>
          <div id="alert" class="alert alert-danger error" style="margin: 5px 30px 30px; text-align: center">Inscription échoué, l'adresse e-mail est déjà utilisée.</div>
      <?php elseif ($status == "logout_success") :?>
            <div class="alert alert-success " style="margin: 5px 30px 30px; text-align: center">Vous êtes déconnecté. À bientôt !</div>
     <?php elseif ($status == "signin_success") :?>
        <div class="alert alert-success box info" style="margin: 5px 30px 30px; text-align: center">Inscription réussie! Vous pouvez dès à présent vous connecter.</div>
     <?php endif;
    }

?>

<div id="account">

<form class="account-login" method="post" action="/account/login">
<div style="padding-left: 10%;">
  <h2>Connexion</h2>
  <h3>Vous avez déjà un compte ?</h3>

  <p>Adresse mail</p>
  <input type="text" name="usermail" placeholder="Adresse mail" />

  <p>Mot de passe</p>
  <input type="password" name="userpass" placeholder="Mot de passe" />

  <input type="submit" value="Connexion" />
</div>
</form>

<form class="account-signin" method="post" action="/account/signin" id="loginForm">
  <div style="padding-left: 10%;">
    <h2>Inscription</h2>
    <h3>Crée ton compte rapidement en remplissant le formulaire ci-dessous.</h3>

    <p>Nom</p>
    <input type="text" name="userlastname" placeholder="Nom" required />
      <small style="font-size: 12px; color: red"></small>
    <p>Prénom</p>
    <input type="text" name="userfirstname" placeholder="Prénom" required />
      <small style="font-size: 12px; color: red"></small>
    <p>Adresse mail</p>
    <input type="text" name="usermail" placeholder="Adresse mail" required />

    <p>Mot de passe</p>
    <input type="password" name="userpass" placeholder="Mot de passe" required/>
      <small style="font-size: 12px; color: red"></small>
    <p>Répéter le mot de passe</p>
    <input type="password" name="userpass" placeholder="Mot de passe" id="pwd" required/>
      <small style="font-size: 12px; color: red"></small>
    <input type="submit" value="Inscription" />
  </div>
</form>

</div>