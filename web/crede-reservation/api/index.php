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
    case 'modules':
        include './Orkidea/Module.php';
        \Orkidea\Core\Module::getModules();
        break;
    case 'groups':
        include './Orkidea/Group.php';
        new \Orkidea\Core\Group((object) $_GET);
        break;
    case 'group_humanid':
        include './Orkidea/Group.php';
        echo \Orkidea\Core\Group::getHumanGid($_POST['gid']);
        break;
    case 'categories':
        include './Categories.php';
        new Categories((object) $_POST);
        break;
    case 'places':
        include './Places.php';
        new Places((object) $_POST);
        break;
    case 'mixed_data':
        include './MixedData.php';
        new MixedData((object) $_POST);
        break;
    case 'equipments':
        include './Equipments.php';
        new Equipments((object) $_POST);
        break;
    case 'my_activities':
        include './MyActivities.php';
        new MyActivities((object) $_POST);
        break;
    case 'activities':
        include './Activities.php';
        new Activities((object) $_POST);
        break;
    case 'equipments_activities':
        include './EquipmentsActivities.php';
        new EquipmentsActivities((object) $_POST);
        break;
    case 'equipments_my_activities':
        include './EquipmentsMyActivities.php';
        new EquipmentsMyActivities((object) $_POST);
        break;
    case 'schedule':
        include './Schedule.php';
        new Schedule((object) $_POST);
        break;
    case 'calendar':
        include './Calendar.php';
        new Calendar((object) $_POST);
        break;
    case 'google-calendar':
        include './GoogleCalendar.php';
        new GoogleCalendar((object) $_POST);
        break;
}

 ?>
