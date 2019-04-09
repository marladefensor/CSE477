<?php
require 'lib/game.inc.php';
$controller = new Wumpus\WumpusController($wumpus, $_GET);
if($controller->isReset()) {
    unset($_SESSION[WUMPUS_SESSION]);
}
if($controller->cheat()){
    unset($_SESSION[WUMPUS_SESSION]);
    $_SESSION[WUMPUS_SESSION] = new Wumpus\Wumpus(1422668587);
}

header('Location: ' . $controller->getPage());
/*
$page = $controller->getPage();
//echo "<a href=\"$page\">$page</a>";
header('Location: ' . $controller->getPage());
*/