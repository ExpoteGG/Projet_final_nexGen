<?php

    $cake = new Vue_chambresDB($cnx);
    $liste = $cake->getVue_chambres();
    $nbrCakes = count($liste);
    
?>
<br />
<div class="container">
    <?php
        if(isset($liste)){
            if($nbrCakes>0){       
    ?>

    <?php
        for($i=0;$i<$nbrCakes;$i++){
            if($liste[$i]['status']==0){
                
            
    ?>
    <div class="row">
        <div class="col-sm-12 col-md-6">
                <img src="admin/images/<?php print $liste[$i]['image'];?>" alt="image" />
        </div>
        <div class="col-md-6 text-center">
            <h3><?php print $liste[$i]['nom'];?></h3><br/>
            <h3><?php print $liste[$i]['description'];?></h3><br/>
            <h3><?php print $liste[$i]['prix'];?> €</h3><br/>
            <a button type="button" class="btn btn-info" href="index.php?page=reserver.php&id=<?php print $liste[$i]['id_chambre'] ?>">
                Reserver
            </a>
        </div>
        
    </div><br/>
        <?php }} ?> 
</div>

<?php
        }}//fin if du début
?>