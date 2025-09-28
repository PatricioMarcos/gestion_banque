<?php include(ROUTE_DIR."view/inc/header.inc.html.php") ?>  

<table border="3">
    <thead class="thead">
        <tr class="tr">
            <td>NUMERO COMPTE</td>
            <td>SOLDE</td>
            <td>DATE OUVERTURE</td>
            <td class="center">DATE CLOTURE</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comptes as $key => $value): ?>
            <tr>
                <td><?= $value["numCompte"]?></td>
                <td><?= $value["solde"]?></td>
                <td><?= $value["dateO"]?></td>
                <td><?= $value["dateC"]?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include(ROUTE_DIR."view/inc/footer.inc.html.php") ?>  