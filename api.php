<?php

include "config.php";
//header("Content-Type: application/json; charset=UTF-8");
error_reporting(E_ALL);
// $id =mysqli_real_escape_string($mysqli,$_GET["id"]);
// $event =mysqli_real_escape_string($mysqli2,$_GET["event"]);
// $decoration = mysqli_real_escape_string($mysqli3,$_GET["decoration"]);
// $service = mysqli_real_escape_string($mysqli4,$_GET["service"]);

function JSONResponse($_response) {
    try {
        $json2 = json_encode($_response);
        echo $json2;

    } catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

if (isset($_GET["search"])) {
    $search = mysqli_real_escape_string($mysqli,$_GET["search"]);
    if ($search == "decoration-photos") {
        if (isset($_GET["id"])) {
            $id = mysqli_real_escape_string($mysqli,$_GET["id"]);
            $result = $mysqli->query("SELECT d.id_decoration, d.name_decoration, pr.id_party_room,pr.party_room_name FROM decorations as d LEFT JOIN party_room AS pr ON d.id_party = pr.id_party_room WHERE d.id_decoration = '" . $id . "'");
            $response['decorations'] = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $response['decorations'] = array(
                    'id_party_room' => $row['id_party_room'],
                    'room_name' => $row['party_room_name'],
                    'id_decoration' => $row['id_decoration'],
                    'decoration_name' => $row['name_decoration'],
                    'images' => array(),
                );
            }

            $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,d.name_decoration FROM content_decoration AS cd LEFT JOIN content AS c ON c.id_content = cd.id_content LEFT JOIN decorations AS d ON d.id_decoration = cd.id_decoration WHERE cd.id_decoration =". $id ." AND c.status = true");
            while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
                $description = mysqli_real_escape_string($mysqli2,$row2['description']);
                $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row2['route']);
                $partialImage = array(
                    'path' =>  $path,
                    'title' => $row2['tittle'],
                    'description' => $description,
                    'decoration' => $row2['name_decoration'],
                   
                );
                array_push($response['decorations']['images'], $partialImage);
            }
            JSONResponse($response['decorations']);
        } else {
            echo "Es necesario especificar el parametro id.";
        }
    } else if ($search == "subservice-photos") {
        if (isset($_GET["id"])) {
            $id = mysqli_real_escape_string($mysqli,$_GET["id"]);
            $result = $mysqli->query("SELECT id_sub_service,name_sub_service FROM sub_services WHERE id_sub_service = '" . $id . "'");
            $response['sub_services'] = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $response['sub_services'] = array(
                    'id_sub_service' => $row['id_sub_service'],
                    'name_sub_service' => $row['name_sub_service'],
                    'images' => array()
                );
            }
            $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,ss.name_sub_service FROM content_sub_service AS css LEFT JOIN content AS c ON c.id_content = css.id_content LEFT JOIN sub_services AS ss ON ss.id_sub_service = css.id_sub_service WHERE css.id_sub_service =". $id ." AND c.status = true");
            while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
                $description = mysqli_real_escape_string($mysqli2,$row2['description']);
                $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row2['route']);
                $partialImage = array(
                    'path' =>  $path,
                    'title' => $row2['tittle'],
                    'description' => $description,
                    'sub_service' => $row2['name_sub_service'],
                );
                array_push($response['sub_services']['images'], $partialImage);
            }
            JSONResponse($response['sub_services']);
        } else {
            echo "Es necesario especificar el parametro id.";
        }
    } else if ($search == "event-photos") {
        if (isset($_GET["id"])) {
            $id = mysqli_real_escape_string($mysqli,$_GET["id"]);
            $response = array();
            $result2 = $mysqli2->query("SELECT c.id_content, c.tittle,c.route,c.description,e.name_event FROM content_event AS ce LEFT JOIN content AS c ON c.id_content = ce.id_content LEFT JOIN events AS e ON e.id_event = ce.id_event WHERE ce.id_event =". $id ." AND c.status = true");
            $response['events'] = array(
                'id_event' => $id,
                'images' => array(),
            );
            while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
                $description = mysqli_real_escape_string($mysqli2,$row['description']);
                $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
                $partialImage = array(
                    'path' =>  $path,
                    'title' => $row['tittle'],
                    'description' => $description,
                    'event' => $row['name_event'],
                    'id_content' => $row['id_content']
                );
                array_push($response['events']['images'], $partialImage);
            }
            JSONResponse($response['events']);
        } else {
            echo "Es necesario especificar el parametro id.";
        }
    } else if ($search == "subservices") {
        if (isset($_GET["id"])) {
            $id = mysqli_real_escape_string($mysqli,$_GET["id"]);
            $result = $mysqli->query("SELECT id_sub_service, name_sub_service FROM sub_services WHERE id_service ='" . $id ."'");
            $response['sub_services'] = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $subservice = array(
                    'id_subservice' => $row['id_sub_service'],
                    'subservice_name' => $row['name_sub_service']
                );
                array_push($response['sub_services'], $subservice);
            }
            JSONResponse($response['sub_services']);
        } else {
            $result = $mysqli->query("SELECT id_service, name_service FROM services");
            $response['services'] = array();
            $i = 0;
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $id = $row['id_service'];
                $response ['services'][$i] = array(
                    'id_service' => $id,
                    'service_name' => $row['name_service'],
                    'subservices' => array(),
                );
                $result2 = $mysqli2->query("SELECT id_sub_service, name_sub_service FROM sub_services WHERE id_service ='" . $id ."'");
                while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
                    $subservice = array(
                        'id_subservice' => $row2['id_sub_service'],
                        'subservice_name' => $row2['name_sub_service']
                    );
                    array_push($response['services'][$i]['subservices'], $subservice);
                }
                $i++;
            }
            JSONResponse($response['services']);
        }
    } else if ($search == "events") {
        $result = $mysqli->query("SELECT id_event, name_event FROM events");
        $response['events'] = array();
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($response['events'],array(
                'id_event' => $row['id_event'],
                'event_name' => $row['name_event']
            ));
        }
        JSONResponse($response['events']);
    } else if($search == "decorations") {
        if (isset($_GET["id"])) {
            $id = mysqli_real_escape_string($mysqli,$_GET["id"]);
            $result = $mysqli->query("SELECT id_decoration, name_decoration FROM decorations WHERE id_party ='" . $id ."'");
            $response['decorations'] = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $decorations = array(
                    'id_decoration' => $row['id_decoration'],
                    'decoration_name' => $row['name_decoration']
                );
                array_push($response['decorations'], $decorations);
            }
            JSONResponse($response['decorations']);
        } else {
            $result = $mysqli->query("SELECT id_party_room,party_room_name FROM party_room");
            $response['partyRooms'] = array();
            $i = 0;
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $id = $row['id_party_room'];
                $response ['partyRooms'][$i] = array(
                    'id_party_room' => $id,
                    'room_name' => $row['party_room_name'],
                    'decorations' => array(),
                );
                $result2 = $mysqli2->query("SELECT id_decoration, name_decoration FROM decorations WHERE id_party ='" . $id ."'");
                while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) {
                    $decoration = array(
                        'id_decoration' => $row2['id_decoration'],
                        'decoration_name' => $row2['name_decoration']
                    );
                    array_push($response['partyRooms'][$i]['decorations'], $decoration);
                }
                $i++;
            }
            JSONResponse($response['partyRooms']);
        }
    } else {
        echo "Valor invalido de paramretro search";
    }
} else {
    echo "Es necesario especificar el parametro search.";
}


//query only by Party Room (ID)
// if ($id!=null && empty($event) && empty($decoration) && empty ($service)) {
//     echo 'By party room';
        
//         $result = $mysqli->query("SELECT id_party_room,party_room_name FROM party_room WHERE id_party_room = '" . $id . "'");
//         while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            
//             $response ['partyRoom'] = array(
//                 'id_party_room' => $row['id_party_room'],
//                 'room_name' => $row['party_room_name'],
//                 'images' => array(),
//             );
//         }

//         $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,d.name_decoration FROM content_party_room AS cpr LEFT JOIN content AS c ON c.id_content = cpr.id_content LEFT JOIN decorations AS d ON d.id_decoration = cpr.id_decoration WHERE cpr.id_party_room ='" . $id ."'");
//         while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
//             $description = mysqli_real_escape_string($mysqli2,$row['description']);
//             $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
//             $partialImage = array(
//                 'path' =>  $path,
//                 'tittle' => $row ['tittle'],
//                 'description' => $description,
//                 'decoration' => $row['name_decoration'],
               
//             );
//             array_push($response['partyRoom']['images'], $partialImage);
//         }
//         
        
// }   

//     elseif ($id!=null && empty ($st) && $decoration!=null && empty ($service)) {
//         $result = $mysqli->query("SELECT id_party_room,party_room_name FROM party_room WHERE id_party_room = '" . $id . "'");
//         while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
//             $response ['partyRoom'] = array(
//                 'id_party_room' => $row['id_party_room'],
//                 'room_name' => $row['party_room_name'],
//                 'images' => array(),
//             );
//         }
//         $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,d.name_decoration FROM content_party_room AS cpr LEFT JOIN content AS c ON c.id_content = cpr.id_content LEFT JOIN decorations AS d ON d.id_decoration = cpr.id_decoration WHERE cpr.id_party_room ='" . $id . "' AND cpr.id_decoration = '" . $decoration . "' AND d.id_party = '" . $id . "'");
//         while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
//             $description = mysqli_real_escape_string($mysqli2,$row['description']);
//             $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
//             $partialImage = array(
//                 'path' =>  $path,
//                 'tittle' => $row ['tittle'],
//                 'description' => $description,
//                 'decoration' => $row['name_decoration']
//             );
//             array_push($response['partyRoom']['images'], $partialImage);    
//         }
//         try {
//             $json2 = json_encode($response['partyRoom']);
//             echo $json2;

//         } catch (Exception $e) {
//             echo 'Excepción capturada: ',  $e->getMessage(), "\n";
//         }

        
// } //query with Events
//     elseif (empty ($id) && empty ($decoration) && $event!=null && empty ($service)) {
//         $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,e.name_event FROM content_party_room AS cpr LEFT JOIN content AS c ON c.id_content = cpr.id_content LEFT JOIN events AS e ON e.id_event = cpr.id_event WHERE cpr.id_event ='" . $event . "'");
//             $response ['partyRoom'] = array(
//                 'id_party_room' => $row['id_party_room'],
//                 'images' => array(),
//             );
//         while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
//             $description = mysqli_real_escape_string($mysqli2,$row['description']);
//             $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
//             $partialImage = array(
//                 'path' =>  $path,
//                 'tittle' => $row ['tittle'],
//                 'description' => $description,
//                 'event' => $row['name_event']
//             );
//             array_push($response['partyRoom']['images'], $partialImage);
//         }
//         try {
//             $json2 = json_encode($response['partyRoom']);
//             echo $json2;

//         } catch (Exception $e) {
//             echo 'Excepción capturada: ',  $e->getMessage(), "\n";
//         }
        
// }//query with Services
//     elseif (empty ($id) && empty ($event)&& empty ($decoration) && $service!=null) {
//                 $result2 = $mysqli2->query("SELECT c.tittle,c.route,c.description,s.name_sub_service FROM content_party_room AS cpr LEFT JOIN content AS c ON c.id_content = cpr.id_content LEFT JOIN sub_services AS s ON s.id_sub_service = cpr.id_sub_service WHERE cpr.id_sub_service ='" . $service . "'");
//             $response ['partyRoom'] = array(
//                 'id_party_room' => $row['id_party_room'],
//                 'images' => array(),
//             );
//         while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
//             $description = mysqli_real_escape_string($mysqli2,$row['description']);
//             $path=mysqli_real_escape_string($mysqli2,'php/album/' . $row['route']);
//             $partialImage = array(
//                 'path' =>  $path,
//                 'tittle' => $row ['tittle'],
//                 'description' => $description,
//                 'subservice' => $row['name_sub_service']
//             );
//             array_push($response['partyRoom']['images'], $partialImage);
//         }
//         try {
//             $json2 = json_encode($response['partyRoom']);
//             echo $json2;

//         } catch (Exception $e) {
//             echo 'Excepción capturada: ',  $e->getMessage(), "\n";
//         }
// }

//     else {

//     echo  'no';
// }
?>
        
