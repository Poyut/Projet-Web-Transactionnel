<header>
    <div class="menu_navbar"></div>
    <nav>
    <img width="50px" height="48px" src="../../ressources/images/moderma2.png" class="logo_img">
    <a class="logo" href="../index.php">MODERMA</a>
        <ul>
            <?php if($_SESSION['loggedin'] == false)
                echo '<li><a href="/pages/connexion.php" class="position button_signup" href="#">CONNEXION</a>';
            ?>
            <?php if($_SESSION['loggedin'] == false)
                echo '<li><a href="/pages/inscription.php" class="position button_signin" href="#">S INSCRIRE</a>';
            ?>
            <?php if($_SESSION['loggedin'] == true){
                echo '<li><a href="../index.php" class="mobile-home-icon"><i class="fa fa-home fa-lg"></i></a>';
                echo '<span class="mobile-navbar-panier" data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-cart fa-lg"></i></span>';
                ?><?php
                
                if($_SESSION['admin'] == 1){
                    echo '<li><a href="/ressources/scripts/admin.php" class="mobile-user-icon"><i class="fas fa-wrench fa-lg"></i></a>';
                    echo '<li><a href="/pages/profil.php" class="mobile-user-icon"><i class="fas fa-user fa-lg"></i></a>';
                }
                else
                    echo '<li><a href="/pages/profil.php" class="mobile-user-icon"><i class="fas fa-user fa-lg"></i></a>';
            }
            ?>
            <label class="dropdown">
                <div class="dd-button">
                <i class="fas fa-language fa-lg"></i></a>
                </div>
                <input type="checkbox" class="dd-input" id="test">
                <ul class="dd-menu">
                <li>
                    <a href="?lang=fr">
                    <img src="https://flagcdn.com/16x12/fr.png" srcset="https://flagcdn.com/32x24/fr.png 2x, https://flagcdn.com/48x36/fr.png 3x" width="16" height="12" alt="France">
                </li>
                <li>
                    <a href="?lang=en">
                    <img src="https://flagcdn.com/16x12/us.png" srcset="https://flagcdn.com/32x24/us.png 2x, https://flagcdn.com/48x36/us.png 3x" width="16" height="12" alt="English">
                </a>
                </li>
                </ul>
            </label>
            <?php 
            
            if($_SESSION['loggedin'] == true && $_SESSION['admin'] == 0)
                  echo '<span class="navbar-panier" data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-cart fa-lg"></i></span>'; 
            ?>
            <?php 
            if($_SESSION['loggedin'] == true && $_SESSION['admin'] == 1){
                echo '<li><a href="/ressources/scripts/admin.php" class="user-icon"><i class="fas fa-wrench fa-lg"></i></a>';
                echo '<span class="navbar-panier" data-toggle="modal" data-target="#cart"><i class="fa fa-shopping-cart fa-lg"></i></span>'; 
                echo '<li><a href="/pages/profil.php" class="user-icon"><i class="fas fa-user fa-lg"></i></a>';
            }
            elseif($_SESSION['loggedin'] == true && $_SESSION['admin'] == 0)
                echo '<li><a href="/pages/profil.php" class="user-icon"><i class="fas fa-user fa-lg"></i></a>';
            else 
                echo '<li><a href="/pages/connexion.php" class="user-icon"><i class="fas fa-user fa-lg"></i></a>';
            ?>

        </ul>
    </nav>
    <div class="clearfix"></div>
</header>
