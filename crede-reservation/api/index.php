<?php

namespace CredeReservation;

use Orkidea\Core\Authenticator;

$baseUrl = '/crede-reservation/api/';
$request = explode('?', $_SERVER['REQUEST_URI'], 2);
$request = str_replace($baseUrl, '', $request[0]);

switch ($request) {
    case 'login':
    	include 'Orkidea/Authenticator.php';
    	new Authenticator((object) $_POST);
    	break;
    case 'logout':
        include 'Orkidea/Authenticator.php';
        Authenticator::logout();
        break;
    case 'users':
    	include './Users.php';
		new Users((object) $_POST);
        break;
    case 'permissions':
        include './Permissions.php';
        new Permissions((object) $_POST);
        break;
    case 'categories':
        include './Categories.php';
        new Categories((object) $_POST);
        break;
    case 'places':
        include './Places.php';
        new Places((object) $_POST);
        break;

}

 ?>