<?php include(ROUTE_DIR."view/inc/header.inc.html.php")?>

<section>
    <form action="<?=WEB_ROUTE?>" method="POST" class="form-register" class="form">
    <input type="hidden" name="controller" value="gestionController">
    <input type="hidden" name="action" value="AjouGestion">
    <div>
        <label form="" class="ecrire">Nom</label>
        <input class="in" type="text" name="nom">
    </div>
    <div>
        <label  form="" class="ecrire">Prenom</label>
        <input class="in" type="text" name="prenom">
    </div>
    <div>
        <label for="" class="ecrire">Adresse</label>
        <textarea class="in" name="adresse" rows="2" cols="12" ></textarea>
        </div>
    <div>
        <label form="" class="ecrire">Telephone</label>
        <input class="in" type="text" name="telephone">
    </div>
    <button class="button" type="submit" name="creer">
        Creer
    </button>
</form>
</section>

<?php include(ROUTE_DIR."view/inc/footer.inc.html.php")?>