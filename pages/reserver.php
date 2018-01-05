<h1>Reserver</h1>
<?php
if (!isset($_GET['id']) && !isset($_SESSION['id_chambre'])) {
    ?>
    <p>Pour reserver, choisissez <a href="index.php?page=reserver.php">ici</a> votre chambre</p>
    <?php
} else if (isset($_GET['id'])) {
    $_SESSION['id_chambre'] = $_GET['id'];
}
if (isset($_SESSION['id_chambre'])) {
    /* print_r($_SESSION); */
    $cake = new vue_chambresDB($cnx);
    $liste = $cake->getVue_chambresSelect($_SESSION['id_chambre']);

    //TRAITEMENT DU FORMULAIRE
    if (isset($_GET['reserver'])) {
        //permet d'extraire les champs du tableau $_get pour simplifier
        extract($_GET, EXTR_OVERWRITE);

        /* print_r($_GET); */
        if (false) {
            $erreur = "Veuillez remplir tous les champs";
        } else {

            print 'ok1';

            $client = new ClientDB($cnx);
            $res = $client->addClient($_GET);
            /* print_r($res); */
        }
    }
    ?>
    <div class="row">
        <div class="col-sm-2">
            <?php print $liste[0]['nom']; ?>
        </div>
        <div class="col-sm-2">
            <?php print $liste[0]['description']; ?>
        </div>
        <div class="col-sm-2">
            <?php print $liste[0]['date']; ?>
        </div>
        <div class="col-sm-2">
            <?php print $liste[0]['prix']; ?>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-4 erreur">
                    <?php
                    if (isset($erreur)) {
                        print $erreur;
                    }
                    ?>
                </div>
            </div>
            <form action ="<?php print $_SERVER['PHP_SELF']; ?>" method="get" id="form_reservation">
                <div class="row">
                    <div class="col-sm-2"><label for="email1">Email</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="email" id="email1" name="email1" placeholder="aaa@aaa.aa" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="email1">Confirmer l'email</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="email" id="email2" name="email2" placeholder="aaa@aaa.aa"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="nom">Nom</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="nom" name="nom"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="prenom">Prenom</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="prenom" name="prenom"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="telephone">Téléphone</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="telephone" name="telephone" placeholder="xxx/xx.xx.xx"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="rue_client">Adresse</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="rue_client" name="rue_client"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="numero">Numéro</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="numero" name="numero"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="codepostal">Code postal</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="codepostal" name="codepostal"/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-2"><label for="localite">Localité</label>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" id="localite" name="localite"/>
                    </div>
                </div>

                <div class="row">

                    <div class="col-sm-4" id="variabehide">
                        <input type="text" value="<?php print $liste[0]['nom']; ?>" name="nom_chambre"/>
                    </div>
                </div><br/>

                <div class="row">
                    <div class="col-sm-2">
                        <input type="submit" id="reserver" name="reserver" value="Finaliser ma reservation" />&nbsp;

                    </div>
                    <div class="col-sm-2">
                        <input type="reset" id="reset" value="Effacer" />
                    </div> 
                </div>
            </form>
        </div>
    </div>
    <?php
}
?>
