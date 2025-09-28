<?php
 if (isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET' || isset($_SESSION["id"])) {
        if (isset($_GET["view"]) || isset($_SESSION["id"])) {
            $gestionnaire = new Gestionaire();
            if ($_GET["view"] == "gestion") {
               require(ROUTE_DIR."view/gestionnaire/gestion.html.php");
            } elseif($_GET["view"] == "listegestion") {
                $gestionnaire = new Gestionaire();
                $gestionnaires = $gestionnaire->getAllGestionaires();
                require(ROUTE_DIR."view/gestionnaire/listegestion.html.php");
            }elseif($_GET["view"]=="supprimerGestionnaire"){
                $gestionnaire->ToDeleteGes($_GET["id"]);
                header("Location:".WEB_ROUTE."?controller=gestionController&view=listegestion");
            }elseif($_GET["view"]=="modifierGestionnaire"  || isset($_SESSION["id"])){
                if(isset($_GET["id"])){
                    $_SESSION["id"]=$_GET["id"];
                }
                if(isset($_POST["action"])){
                    $gestionnaire->ToUPDATEGES($_SESSION["id"],$_POST["nom"],$_POST["prenom"],$_POST["adresse"],$_POST["telephone"]);
                    unset($_SESSION["id"]);
                    header("Location:".WEB_ROUTE."?controller=gestionController&view=listegestion");
                }else{
                    require(ROUTE_DIR."view/modifierges.html.php");
                }
            }
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["action"])) {
            if ($_POST["action"] == "AjouGestion") {
                addGestionaire($_POST);
            }
        }
    }
}

function addGestionaire($data) {
    $arrayErrors = [];
     
    valide_champs($data["nom"], 'nom', $arrayErrors);
    valide_champs($data["prenom"], 'prenom', $arrayErrors);
    valide_champs($data["adresse"], 'adresse', $arrayErrors);
    valide_champs($data["telephone"], 'telephone', $arrayErrors);

    if (count($arrayErrors) <= 0) { // test si le tableau d'erreur contient des elements
        
        $gestionnaire  = new Gestionaire();
        $gestionnaire->setNom($data["nom"]);
        $gestionnaire->setPrenom($data["prenom"]);
        $gestionnaire->setAdresse($data["adresse"]);
        $gestionnaire->setTelephone($data["telephone"]);
        $gestionnaire->addNewgestionaire();
        header("Location:".WEB_ROUTE."?controller=gestionController&view=listegestion");
    }else {
        // entre ici s'il y a des erreur
        $_SESSION["arrayErrors"] = $arrayErrors;
        $_SESSION["post"] = $data;
        header("Location:".WEB_ROUTE."?controller=gestionController&view=gestion");
    }
}
?>