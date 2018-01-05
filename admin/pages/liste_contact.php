<?php
$obj = new ContactDB($cnx);
$liste = $obj->getAllContact();
$nbrG = count($liste);
//var_dump($liste);
?>
<script type="text/javascript" src="./lib/js/ng_function.js"></script>
<div class="container">
    <h2>Tableau des contacts</h2><hr>
    <div>
        <a href="./pages/imprimer_contact.php">pdf</a>
    </div>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">

                <div class="pull-right">
                    <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
                </div>
            </div>
            <table class="table-responsive table table-striped table-hover">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="id_contact" disabled></th>
                        <th><input type="text" class="form-control" placeholder="nom" disabled></th>
                        <th><input type="text" class="form-control" placeholder="email" disabled></th>
                        <th><input type="text" class="form-control" placeholder="subject" disabled></th>
                        <th><input type="text" class="form-control" placeholder="message" disabled></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    for ($i = 0; $i < $nbrG; $i++) {
                        ?>
                        <tr>
                            <td class="ecart"><?php print $liste[$i]['id_contact']; ?></td>
                            <td class="ecart"><?php print ($liste[$i]['nom']); ?></td>
                            <td>
                                <span contenteditable="true" name="email" class="ecart" id="<?php print $liste[$i]['email']; ?>">
                                    <?php print ($liste[$i]['email']); ?>
                                </span>
                            </td>
                            <td>
                                <span contenteditable="true" name="sujet" class="ecart" id="<?php print $liste[$i]['subject']; ?>">
                                    <?php print $liste[$i]['subject']; ?>
                                </span>
                            </td>
                            <td>
                                <span contenteditable="true" name="message" class="ecart" id="<?php print $liste[$i]['message']; ?>">
                                    <?php print $liste[$i]['message']; ?>
                                </span>
                            </td>

                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>