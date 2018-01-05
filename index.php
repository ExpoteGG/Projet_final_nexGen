<!DOCTYPE html>
<?php
include './admin/lib/php/adm_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>

<html>
    <head>
        <title>Next Generation</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                
        
        <!-- lien icons footer -->
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
              integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/Bootstrap/css/bootstrap.css"/>
        <script src="admin/lib/js/jquery-3.2.1.js"></script>


        <script src="admin/lib/js/ng_functionsAjax.js"></script>
        <script type="text/javascript" src="admin/lib/js/dist/jquery.validate.js"></script>
        <script src="admin/lib/js/ng_functionsVal.js"></script>

<!--
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.tabledit.js"></script>
-->
        <script src="admin/lib/css/Bootstrap/js/bootstrap.js"></script>
        
        <link rel="stylesheet" type="text/css" href="admin/lib/css/style_next_gen.css">
    </head>
    <body> 

        <div class="wrapper">
            <header>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <nav>
                                <?php
                                if (file_exists("./lib/php/pro_menu_banniere.php")) {
                                    include("./lib/php/pro_menu_banniere.php");
                                }
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <section>
                            <?php
                            if (!isset($_SESSION['page'])) {
                                $_SESSION['page'] = "./pages/accueil.php";
                            } else {
                                if (isset($_GET['page'])) {
                                    $_SESSION['page'] = "./pages/" . $_GET['page'];
                                }
                            }

                            if (file_exists($_SESSION['page'])) {
                                include $_SESSION['page'];
                            } else {
                                print "AH BHA BALLO";
                            }
                            ?>
                        </section>
                    </div>
                </div>
            </div><br/>

            <div class="container">
                <nav>
                    <?php
                    if (file_exists("./lib/php/pro_information.php")) {
                        include ("./lib/php/pro_information.php");
                    }
                    ?> 
                </nav>
            </div><br/>

            <div class="container-fluid">
                <nav>
                    <?php
                    if (file_exists("./lib/php/pro_contact.php")) {
                        include("./lib/php/pro_contact.php");
                    }
                    ?>
                </nav>
            </div><br/>

            <footer>
                <?php
                if (file_exists("./lib/php/pro_footer.php")) {
                    include ("./lib/php/pro_footer.php");
                }
                ?>
            </footer>

            <!-- to scroll to the top -->
            <div class="scroll-top-wrapper">
                <span class="scroll-top-inner">
                    <i class="fa fa-2x fa-arrow-circle-up"></i>
                </span>
            </div>


        </div>
        <script type="text/javascript" src="./admin/lib/js/ng_function.js"></script>
    </body>
</html>
