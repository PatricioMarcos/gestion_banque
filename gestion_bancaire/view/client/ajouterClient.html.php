<?php include(ROUTE_DIR."view/inc/header.inc.html.php") ?>

<?php 

    // recupere le tableau d'erreur
    $arrayErrors = [];
    if (isset($_SESSION["arrayErrors"])) {
        $arrayErrors = $_SESSION["arrayErrors"];
        unset($_SESSION["arrayErrors"]); // detruit la variable qui est dans la fonction unset
    }

    // pouur garder les donnees apres validation en cas d'erreur
    $data = [];
    if (isset($_SESSION["post"])) {
        $data = $_SESSION["post"];
        unset($_SESSION["post"]); // detruit la variable qui est dans la fonction unset
    }
?>



    <form action="<?=WEB_ROUTE?>" method="POST" class="form-register">
        <input type="hidden" name="controller" value="clientController">
        <input type="hidden" name="action" value="ajoutClient">
        <div>
            <label for="" class="ecrire">Nom</label>
            <input type="text" name="nom" value="<?= isset($data['nom']) ? $data['nom'] : '' ?>"  class="in">
            <span style="color:red">
                <?= isset($arrayErrors['nom']) ? $arrayErrors['nom'] : "" ?>
            </span>
           
        </div>
        <div>
            <label for=""class="ecrire">Prenom</label>
            <input type="text" name="prenom" value="<?= isset($data['nom']) ? $data['prenom'] : '' ?>"  class="in">
            <span style="color:red">
                <?= isset($arrayErrors['prenom']) ? $arrayErrors['prenom'] : "" ?>
            </span>
           
        </div>
        <button type="submit" name="creer" class="botton"> 
            Créer
        </button>
    </form>


    <?php include(ROUTE_DIR."view/inc/footer.inc.html.php") ?>  