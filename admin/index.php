<!DOCTYPE html>
<?php
include './lib/php/adm_liste_include.php';
$cnx = Connexion::getInstance($dsn, $user, $pass);
session_start();
?>

<html>
    <head>
        <title>Next Generation</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <script type="text/javascript" src="../admin/lib/js/ng_function.js"></script>
        

        <link rel="stylesheet" href="lib/css/Bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
        
        <!--
                CHECK HERE
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="admin/lib/css/Bootstrap/css/bootstrap.css"/>
        <script src="admin/lib/js/jquery-3.2.1.js"></script>
        <script src="admin/lib/css/Bootstrap/js/bootstrap.js"></script>
        <script src="admin/lib/js/gt_functionsAjax.js"></script>
        <script type="text/javascript" src="admin/lib/js/dist/jquery.validate.js"></script>
        <script src="admin/lib/js/gt_functionsVal.js"></script>
         
        <link href="css/bootstrap.css" rel="stylesheet"/>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery.tabledit.js"></script>
        
        
        -->
        
        
        
                

        <link rel="stylesheet" type="text/css" href="./lib/css/style_next_gen.css">
    </head>
	<style>
		.box
		{
			width:1270px;
			padding:20px;
			background-color:#fff;
			border:1px solid #ccc;
			border-radius:5px;
			margin-top:25px;
		}
	</style>
    <body>
        
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <nav>
                            <?php
                            if (isset($_SESSION['admin'])) {
                                if (file_exists("./lib/php/p_menu.php")) {
                                    include("./lib/php/p_menu.php");
                                }
                            }
                            ?>
                        </nav>
                    </div>
                </div>    
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <section>
                            <?php
                            //on arrive sur le site
                            if (!isset($_SESSION['admin'])) {
                                $_SESSION['page'] = "./pages/admin_login.php";
                            } else {
                                /* le contenu change en fonction de la navigation */
                                if (!isset($_SESSION['page'])) {
                                    $_SESSION['page'] = "./pages/accueil_admin.php";
                                } else {

                                    if (isset($_GET['page'])) {
                                        //print $_GET['page'];
                                        $_SESSION['page'] = "./pages/" . $_GET['page'];
                                    }
                                }
                            }
                            //print $_SESSION['page'];  
                            if (file_exists($_SESSION['page'])) {
                                include $_SESSION['page'];
                            } else {
                                print "OUPS!!!!!";
                            }
                            ?>	
                        </section>
                    </div>
                </div>
            </div>
            
           
            <!-- to scroll to the top -->
            <div class="scroll-top-wrapper">
                <span class="scroll-top-inner">
                    <i class="fa fa-2x fa-arrow-circle-up"></i>
                </span>
            </div>
        </div>
    </body>
</html>
