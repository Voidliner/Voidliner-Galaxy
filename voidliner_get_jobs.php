<?php
function voidliner_get_jobs() {
    $jobs = [
        [ "name" => "Enforcer",       "description" => "Patrol the Galaxy" ],
        [ "name" => "Excavator",      "description" => "Extracts resources" ],
        [ "name" => "Researcher",     "description" => "Creates new technologies" ],
        [ "name" => "Manufacturing",  "description" => "Produces goods" ],
        [ "name" => "Generalist",     "description" => "Offering wide range of services" ]
    ];

    echo json_encode([
        "status" => "success",
        "jobs" => $jobs
    ]);
}

?>
