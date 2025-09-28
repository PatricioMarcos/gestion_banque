<?php
 if (isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET' || isset($_SESSION["codC"])) {
        if (isset($_GET["view"]) || isset($_SESSION["codC"])) {
            $client = new Client();
            if ($_GET["view"] == "ajouterClient") {
               require(ROUTE_DIR."view/client/ajouterClient.html.php");
            }elseif($_GET["view"] == "listeClient") {
                $clients = $client->getAllClients();
                $compte = new Compte();
                $comptes = $compte->getAllComptes();
                require(ROUTE_DIR."view/client/listeClient.html.php");
            }elseif($_GET["view"]=="supprimerClient"){
                $client->ToDelete($_GET["codC"]);
                header("Location:".WEB_ROUTE."?controller=clientController&view=listeClient");
            }elseif($_GET["view"]=="modifierClient"  || isset($_SESSION["codC"])){
                if(isset($_GET["codC"])){
                    $_SESSION["codC"]=$_GET["codC"];
                }
                if(isset($_POST["action"])){
                    $client->ToUPDATE($_SESSION["codC"],$_POST["nom"],$_POST["prenom"]);
                    unset($_SESSION["codC"]);
                    header("Location:".WEB_ROUTE."?controller=clientController&view=listeClient");
                }else{
                    require(ROUTE_DIR."view/modifier.html.php");
                }
            }
              
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["action"])) {
            if ($_POST["action"] == "ajoutClient") {
                addClient($_POST);
            }
        }
    }
}

function addClient($data) {
    $arrayErrors = [];
     
    valide_champs($data["nom"], 'nom', $arrayErrors);
    valide_champs($data["prenom"], 'prenom', $arrayErrors);

    if (count($arrayErrors) <= 0) { // test si le tableau d'erreur contient des elements
        
        $client  = new Client();
        $client->setNom($data["nom"]);
        $client->setPrenom($data["prenom"]);
        $client->addNewClient();
        header("Location:".WEB_ROUTE."?controller=clientController&view=listeClient");
    }else {
        // entre ici s'il y a des erreur
        $_SESSION["arrayErrors"] = $arrayErrors;
        $_SESSION["post"] = $data;
        header("Location:".WEB_ROUTE."?controller=clientController&view=ajouterClient");
    }
}
?>