<div class="container-fluid">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark ">
        <!-- Brand -->
        <a class="navbar-brand" href="#"><img src="././images/logo.png" id="test" alt="logo"></a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?page=tab_dynamique.php">Liste de nos chambres</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./index.php?page=liste_contact.php">Liste contact</a>
                </li> 
                <li class="nav-item">
                    <?php if (isset($_SESSION['admin'])) {
                        ?>
                        <a class="nav-link" href="./index.php?page=disconnect.php">déconnexion</a>
                    <?php }
                    ?>
                </li> 
            </ul>
        </div> 
    </nav>
</div>
