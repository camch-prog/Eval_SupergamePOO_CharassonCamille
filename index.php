<?php

include ('./env.php');

include ('./Controller/Controller.php');
include ('./Controller/ControllerHome.php');

include ('./Model/Model.php');
include ('./Model/ModelPlayer.php');

include ('./View/View.php');
include ('./View/ViewHome.php');

include ('./utils/utils.php');

$controllerHome = new ControllerHome(new ModelPlayer, new ViewHome);
$controllerHome->registerPlayer();
$controllerHome->displayPlayers();
$controllerHome->render();