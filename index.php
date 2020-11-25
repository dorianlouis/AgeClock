<?php
# Activer le mécanisme des sessions
session_start();

# Prise du temps actuel au début du script
$time_start = microtime(true);

# Définition des variables globales du script
define('CHEMIN_MODELS','models/');
define('CHEMIN_VUES','views/');
define('CHEMIN_CONTROLEURS','controllers/');
define('EMAIL','dorian0702@gmail.com');
define('DATEDUJOUR',date("j/m/Y"));
define('SESSION_ID',session_id());

# Automatisation de l'inclusion des classes de la couche modèle
function chargerClasse($classe) {
    require_once('models/' . $classe . '.class.php');
}
spl_autoload_register('chargerClasse');

# Connexion à la db;
require_once(CHEMIN_MODELS . 'db.php');
$db=Db::getInstance();

# Pour le header : admin ou login selon que la variable de session 'authentifie' existe ou pas
if (empty($_SESSION['authentifie'])){
    $actionloginadmin='login';
    $libelleloginadmin='Login';
} else {
    $actionloginadmin='admin';
    $libelleloginadmin='Zone Admin';
}

# Ecriture du header de toutes pages HTML
require_once(CHEMIN_VUES . 'header.php');

# S'il n'y a pas de variable GET 'action' dans l'URL, elle est créée ici à la valeur 'accueil'
if (empty($_GET['action'])) {
    $_GET['action'] = 'accueil';
}
# Switch case sur l'action demandée par la variable GET 'action' précisée dans l'URL
# index.php?action=...
switch ($_GET['action']) {
    case 'genese': # action=genese
        require_once(CHEMIN_CONTROLEURS.'GeneseController.php');
        $controller = new GeneseController();
        break;
    case 'livres':
        require_once(CHEMIN_CONTROLEURS.'LivresController.php');
        $controller = new LivresController($db);
        break;
    case 'pensees':
        require_once(CHEMIN_CONTROLEURS.'PenseesController.php');
        $controller = new PenseesController($db);
        break;
    case 'contact': # action=contact
        require_once(CHEMIN_CONTROLEURS.'ContactController.php');
        $controller = new ContactController();
        break;
    case 'login':
        require_once(CHEMIN_CONTROLEURS.'LoginController.php');
        $controller = new LoginController($db);
        break;
    case 'admin':
        require_once(CHEMIN_CONTROLEURS.'AdminController.php');
        $controller = new AdminController($db);
        break;
    case 'logout':
        require_once(CHEMIN_CONTROLEURS.'LogoutController.php');
        $controller = new LogoutController();
        break;
    default: # Par défaut, le contrôleur de l'accueil est sélectionné
        require_once(CHEMIN_CONTROLEURS.'AccueilController.php');
        $controller = new AccueilController();
        break;
}
# Exécution du contrôleur défini dans le switch précédent
$controller->run();

$time_end = microtime(true);
$time = round(($time_end - $time_start)*1000,3);

# Ecrire ici le footer de toutes pages HTML
require_once(CHEMIN_VUES . 'footer.php');
?>