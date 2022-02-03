<?php
$logger = isset($_SESSION['login']);
?>

<nav class="navbar navbar-dark bg-dark">
    <div class="nav-content">
        <a class="navbar-brand" href="/" >
            <div style="width: 0.5em"></div>
            <h1>Magic store</h1></a>

        <?php if($logger): ?>
            <a class="btn btn-dark" role="button" href="/shop">Shop</a>
            <div style="flex: 1"></div>
            <div class="btn-group" role="group" >
                <a class="btn btn-dark" href="/cart"><i  class="fas  fa-shopping-bag"></i></a>
                <div class="dropdown">

                    <button  class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false"> <?php echo ucwords( $_SESSION['login']['lastname']) ?>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item" href="/account/logout">Logout</a></li>
                        <li><hr class="dropdown-divider"></li>
                    </ul>

                </div>
            </div>
        <?php else: ?>

            <a class="btn btn-dark" role="button" href="/browser">Browse</a>
            <div style="flex: 1"></div>
            <?php if( strpos($_SERVER['REQUEST_URI'],"/account") === false)  {?>
            <div class="btn-group" role="group" >
                <a class="btn btn-dark" role="button" href="/account">Login</a>
            </div>
                
        <?php } endif;?>
    </div>
</nav>
