<?php include(ROUTE_DIR."view/inc/header.inc.html.php") ?>  

<table border="3">
    <thead class="thead">
        <tr class="tr">
            <td>NOM</td>
            <td>PRENOM</td>
            <td>ADRESSE</td>
            <td>TELEPHONE</td>
            <td class="center">OPTIONS</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($gestionnaires as $key => $value): ?>
            <tr>
                <td><?= $value["nom"]?></td>
                <td><?= $value["prenom"]?></td>
                <td><?= $value["adresse"]?></td>
                <td><?= $value["telephone"]?></td>
                <td>
                <button class="bouton">    
                <a href="<?=WEB_ROUTE.'?controller=gestionController&view=modifierGestionnaire&id='.$value["id"].''?>" class="modificate">Modifier</a>
                </button>
                <button class="bouton2">
                <a href="<?=WEB_ROUTE.'?controller=gestionController&view=supprimerGestionnaire&id='.$value["id"].''?>"class="delete">Supprimer</a>
                </button>
            </tr>
                </td>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include(ROUTE_DIR."view/inc/footer.inc.html.php") ?>  