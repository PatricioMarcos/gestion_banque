<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/client.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/listercompte.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
    <header>
        <img src="images/aca8617b08f0022e6aed5708faf7946e.jpg" alt="" class="logo">
        <nav>
            
          
            <a  class="menus" href="<?=WEB_ROUTE.'?controller=compteController&view=compte' ?>">Nouveau Compte</a>
            <a  class="menus" href="<?=WEB_ROUTE.'?controller=compteController&view=listeCompte' ?>">Comptes</a>
            <a  class="menus" href="<?=WEB_ROUTE.'?controller=gestionController&view=gestion' ?>">Ajouter Gestionnaire</a>
            <a  class="menus" href="<?=WEB_ROUTE.'?controller=gestionController&view=listegestion' ?>">Gestionnaires</a>
            <a  class="menus" href="<?=WEB_ROUTE.'?controller=clientController&view=ajouterClient' ?>">Nouveau Client</a>
            <a  class="menus" href="<?=WEB_ROUTE.'?controller=clientController&view=listeClient' ?>">Clients</a>
            <a  class="menus" href="<?=WEB_ROUTE.'?controller=transactionController&view=transaction' ?>">Transactions</a>
        </nav>
    </header>
</body>
</html>