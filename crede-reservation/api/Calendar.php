<?php

namespace CredeReservation;

require '../../vendor/autoload.php';
include "Orkidea/Authenticator.php";
include "Config.php";

use Orkidea\Core\Authenticator;
use Orkidea\Core\Config;
use Orkidea\Core\Storage;

class Calendar extends Storage
{

    function __construct($post)
    {
        if (Authenticator::hasAuthority()) {
            try {
                $id_calendar = '';
                $id_db = $post->id;
                $summary = $post->summary;
                $location = $post->location;
                $description = $post->description;
                $datetime_start = new \DateTime($post->start);
                $time_end = new \DateTime($post->end);

                date_default_timezone_set('America/Fortaleza');
                putenv('GOOGLE_APPLICATION_CREDENTIALS=../../keys.json');

                $client = new \Google_Client();
                $client->useApplicationDefaultCredentials();
                $client->setScopes(['https://www.googleapis.com/auth/calendar']);

                $time_start = $datetime_start->format(\DateTime::RFC3339);
                $time_end = $time_end->format(\DateTime::RFC3339);

                $calendarService = new \Google_Service_Calendar($client);
                $optParams = array(
                    'orderBy' => 'startTime',
                    'maxResults' => 20,
                    'singleEvents' => TRUE,
                    'timeMin' => $time_start,
                    'timeMax' => $time_end,
                );
                $events = $calendarService->events->listEvents($id_calendar, $optParams);
                $cont_events = count($events->getItems());

                if ($cont_events < 10) {
                    $event = new \Google_Service_Calendar_Event();
                    $event->setSummary($summary);
                    $event->setDescription($description);
                    $event->setLocation($location);

                    $start = new \Google_Service_Calendar_EventDateTime();
                    $start->setDateTime($time_start);
                    $event->setStart($start);

                    $end = new \Google_Service_Calendar_EventDateTime();
                    $end->setDateTime($time_end);
                    $event->setEnd($end);

                    $createdEvent = $calendarService->events->insert($id_calendar, $event);
                    $id_event = $createdEvent->getId();
                    $link_event = $createdEvent->gethtmlLink();
                    $link = explode('https://www.google.com/calendar/event?eid=', $link_event)[1];
                    
                    // Update database
                    $this->connectDb(Config::getDbCredentials());
                    $sql = "UPDATE activities SET link=? WHERE id=?";
                    $stm = $this->connection->prepare($sql);
                    $stm->execute(array($link, $id_db));

                    echo json_encode(array(
                        'link' => $link,
                        'id' => $id_event
                    ));
                } else {
                    echo json_encode(
                        array(
                            'status' => 'error',
                            'msg' => "Já há $cont_events eventos nessa data!"
                        )
                    );
                }
            } catch (\Google_Service_Exception $gs) {
                echo $gs->getMessage();
            } catch (Exception $e) {
                echo json_encode(
                    array(
                        'status' => 'error',
                        'msg' => $e->getMessage()
                    )
                );
            }
        } else
            echo json_encode(array('status' => 'denied'));
    }
}
