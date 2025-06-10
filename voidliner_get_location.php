<?php
function voidliner_get_location() {
    $locations = [
        [ "name" => "Terran",   "description" => "Conditional Atmosphere" ],
        [ "name" => "Barren",   "description" => "No Atmosphere" ],
        [ "name" => "Jovian",   "description" => "Gas Giants" ],
        [ "name" => "Rogue",    "description" => "Uncharted Void Bodies" ],
        [ "name" => "General",  "description" => "Adaptive"]
    ];

    echo json_encode([
        "status" => "success",
        "locations" => $locations
    ]);
}

?>
