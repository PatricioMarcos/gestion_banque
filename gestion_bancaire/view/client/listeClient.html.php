<?php include(ROUTE_DIR."view/inc/header.inc.html.php") ?>  

<table border="3">
    <thead class="thead">
        <tr class="tr">
            <th>NOM</th>
            <th>PRENOM</th>
            <th>OPTIONS</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach($clients as $key => $value): ?>
            <tr>
                <td><?= $value["nom"]?></td>
                <td><?= $value["prenom"]?></td>
                <td>
                <button class="bouton"> 
                <a href="<?=WEB_ROUTE.'?controller=clientController&view=modifierClient&codC='.$value["codC"].''?>">Modifier</a>
                </button>
                <button class="bouton2">
                <a href="<?=WEB_ROUTE.'?controller=clientController&view=supprimerClient&codC='.$value["codC"].''?>">Supprimer</a>
                </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include(ROUTE_DIR."view/inc/footer.inc.html.php") ?>