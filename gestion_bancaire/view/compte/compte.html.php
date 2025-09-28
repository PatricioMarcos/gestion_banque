<?php include(ROUTE_DIR."view/inc/header.inc.html.php")?>

<section>
    <form action="<?=WEB_ROUTE?>" method="POST" class="form-register">
    <input type="hidden" name="controller" value="compteController">
    <input type="hidden" name="action" value="AjouCompte">
    <div>
        <label form="" class="ecrire">NumCompte</label>
        <input class="in" type="number" name="numCompte">
    </div>
    <div>
        <label  form="" class="ecrire">Solde</label>
        <input class="in" type="number" name="solde" min="0">
    </div>
    <div>
        <label form="" class="ecrire">Date Ouverture</label>
        <input class="in" type="date" name="dateO">
    </div>
    <div>
        <label form="" class="ecrire">Date Clôture</label>
        <input class="in" type="date" name="dateC">
    </div>
    <button class="botton" type="submit" name="creer">
        Creer
    </button>
</form>
</section>

<?php include(ROUTE_DIR."view/inc/footer.inc.html.php")?>
