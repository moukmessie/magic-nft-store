<?php
$logged = isset($_SESSION['login']) ;

?>
<?php if($logged): ?>
    <h1 class="title">Hi <?php echo ucwords($_SESSION['login']['lastname'] )?>, </h1>
<?php endif; ?>

<div class="title">WELCOME TO THE MAGIC STORE</div>
<img src="public/images/MagicLogo4.png" alt="Magic logo">

