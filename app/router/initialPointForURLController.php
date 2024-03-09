<?php
require_once('../controllers/URLController.php');
 echo json_encode(\URLController::getNewToken($_POST['url']));