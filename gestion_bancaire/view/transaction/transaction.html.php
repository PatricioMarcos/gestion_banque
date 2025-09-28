<?php include(ROUTE_DIR."view/inc/header.inc.html.php");?>

<?php 
// recupere le tableau d'erreur
$arrayErrors = [];
if (isset($_SESSION["arrayErrors"])) {
    $arrayErrors = $_SESSION["arrayErrors"];
    unset($_SESSION["arrayErrors"]); // detruit la variable qui est dans la fonction unset
}
?>

<div >
        <form action="<?=WEB_ROUTE?>" method="POST" class="form-register">
            <input type="hidden" name="controller" value="transactionController">
            <input type="hidden" name="action" value="transfert">
                <div >
                    <div>
                        <label for="" class="text">Date</label>
                        <input type="date" name="date" class="in">
                    </div>
                    <label for="" class="text">Type</label>
                        <select name="type" id="" class="in">
                            <option value="depot">Dépot</option>
                            <option value="retrait">Retrait</option>
                        </select>
                    </div>
                    <div >
                        <label for="" class="text">Client</label>
                        <select class="in" name="client">
                            <option value="0">Selectionner un client</option>
                            <?php foreach($clients as $key => $value): ?>
                                <option value="<?= $value["codC"]?>">
                                    <?= $value["prenom"].' '.$value["nom"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div >
                        <label for="" class="text">Compte</label>
                        <select class="in" name="compte">
                            <option value="0">Selectionner un compte</option>
                            <?php foreach($comptes as $key => $value): ?>
                                <option value="<?= $value["id"]?>">
                                    <?= $value["numCompte"] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="" class="text">Montant</label>
                        <input type="number" name="montant" class="in" min="1">
                        <span style="color:red">
                              <?= isset($arrayErrors['montant']) ? $arrayErrors['montant'] : "" ?>
                         </span>   
                    </div>
                        <button type="submit" name="ajouter" value="ajouter" class="button"> 
                           Ajouter
                        </button>
                </div>
            </form>
               </div>
                    <div>
                        <table border="3" >
                            <thead class="thead">
                                <tr class="tr">
                                    <th>COMPTE</th>
                                    <th>SOLDE</th>
                                    <th>MONTANT</th>
                                    <th>SOLDE ACTUEL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($listTransactionComptes as $key => $value): ?>
                                    <tr>
                                        <td><?= $value["compte"]?></td>
                                        <td><?= $value["solde"]?></td>
                                        <td><?= $value["montant"]?></td>
                                        <td><?=$value["sr"] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <form action="<?=WEB_ROUTE?>" method="POST">
                    <input type="hidden" name="controller" value="transactionController">
                    <input type="hidden" name="action" value="transfert">
                    <div>
                        <button type="submit" name="valider" value="valider" class="button3"> 
                            valider
                        </button>
                    </div>   
                </div>   
            </form>
</div>
<?php include(ROUTE_DIR."view/inc/footer.inc.html.php") ?>