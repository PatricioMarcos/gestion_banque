<?php
if (isset($_SERVER['REQUEST_METHOD'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET["view"])) {
            if ($_GET["view"] == "transaction") {
                $client = new Client();
                $clients = $client->getAllClients();
                $compte = new Compte();
                $comptes = $compte->getAllComptes();
                // on recupere la liste de transaction compte de la session
                $listTransactionComptes  = [];
                if(isset($_SESSION["listTransactionComptes"])) {
                    $listTransactionComptes = $_SESSION["listTransactionComptes"];
                    
                }
                // on recupere les donnees du formulaire sauvegarder dans la session
                $saveTransaction = [];
                if(isset($_SESSION["save"])) {
                    $saveTransaction = $_SESSION["save"];
                    unset($_SESSION["save"]);
                }
                require(ROUTE_DIR."view/transaction/transaction.html.php");
            }
        }
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST["action"])) {
            if ($_POST["action"] == "transfert") {
                if(isset($_POST["ajouter"])) {
                    // enregistrer les donnees du formulaire
                    $_SESSION["save"] = $_POST;
                    // rechercher un compte par son id
                    $compte = new Compte();
                   $compte->getCompteById((int)$_POST["compte"]);
                   $anciensolde=$compte->getSolde();
                      if($_POST["type"]=="retrait"){
                        if($_POST["montant"]>$anciensolde){
                            addError("montant",$arrayErrors,"montant>solde");
               
                            header("Location:".WEB_ROUTE."?controller=transactionController&view=transaction");
                            exit;
                        }else{
                            $compte->getDepotRetrait($_POST["compte"],$compte->getSolde()-$_POST["montant"]);
                        }
                    }elseif($_POST["type"]=="depot"){
                        $compte->getDepotRetrait($_POST["compte"],$compte->getSolde()+$_POST["montant"]);
                    }
                    $compte->getCompteById((int)$_POST["compte"]);
                    // creer un tableau qui regroupe les elements necessaire pour l'objet transaction compte
                    $transaction = new Transaction();
                    $transaction->setDateTransac($_POST["date"]);
                    $transaction->setCompte($compte);
                    $transaction->setMontant($_POST["montant"]);
                   $idtransaction= $transaction->addTransaction();
                    $cp =[
                        "idtransaction"=>$idtransaction,
                        "compteId" => $compte->getId(),
                        "compte" => $compte->getNumCompte(),
                        "solde" => $anciensolde,
                        "montant" => (int)$_POST["montant"],
                        "sr"=>$compte->getSolde(),
                    ];
                    // on recupere la liste de transaction compte enregistré dans la session
                    $listTransactionCompte = [];
                    if(isset($_SESSION["listTransactionComptes"])) {
                        
                        $listTransactionCompte = $_SESSION["listTransactionComptes"];
                    }
                    
                    // on modifie la liste en y ajoutant une nouvelle transaction compte

                    $listTransactionCompte[] = $cp;
                    $_SESSION["listTransactionComptes"] = $listTransactionCompte;
                    // redirection vers la page transaction
                    header("Location:".WEB_ROUTE."?controller=transactionController&view=transaction");

                }
                if(isset($_POST["valider"])) {
                    $listTransactionCompte = [];
                    if(isset($_SESSION["listTransactionComptes"])) {
                        $listTransactionCompte = $_SESSION["listTransactionComptes"];
                        // permet de detruire le contenu de la variable
                         unset($_SESSION["listTransactionComptes"]);
                    }
                  

                    foreach ($listTransactionCompte as $key => $value) {
                         $transactionCompte = new TransactionCompte();
                        // $transactionCompte->setTransaction($value);
                        $compt= new Compte();
                        $compt->getCompteById($value["compteId"]);
                        $transactionCompte->setCompte($compt);
                        $transactionCompte->setSolde($value["solde"]);
                        $transactionCompte->addTransactionCompte($value["idtransaction"]);
                    }
                    header("Location:".WEB_ROUTE."?controller=transactionController&view=transaction");
                }
            }
        }
    }
}