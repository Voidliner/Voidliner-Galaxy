<?php
function voidliner_apply_company($pdo, $job, $location) {
    $job_matrix = [
    'Enforcer' => [
        'Terran'  => 'United Imperium',
        'Barren'  => 'Aurelion Coalition',
        'Jovian'  => 'Neurolux Dynamix',
        'Rogue'   => 'Crimson Vultures',
        'General' => 'Forgeblade Contract Group'
    ],
    'Excavator' => [
        'Terran'  => 'Helion Excavators',
        'Barren'  => 'Stellar Federation',
        'Jovian'  => 'Forum Collective',
        'Rogue'   => 'Hullsplitters',
        'General' => 'Grayjack Salvagers'
    ],
    'Researcher' => [
        'Terran'  => 'Thermionics Unlimited',
        'Barren'  => 'DeepGrid Exploration',
        'Jovian'  => 'Cosmic Consortium',
        'Rogue'   => 'Blackwake Haulers',
        'General' => 'HexaForge Technologies'
    ],
    'Manufacturing' => [
        'Terran'  => 'Aegis Solutions',
        'Barren'  => 'Spitfire Mechanics',
        'Jovian'  => 'Nanospire Industries',
        'Rogue'   => 'Starlight Marauders',
        'General' => 'Vastgear Manufacturing'
    ],
    'Generalist' => [
        'Terran'  => 'Aetherblades Technologies',
        'Barren'  => 'Forgecore Dynamics',
        'Jovian'  => 'Gearshift Engineering',
        'Rogue'   => 'Modulon Industries',
        'General' => 'Starforge Operatives'
    ]
];


    if (isset($job_matrix[$job][$location])) {
        $company = $job_matrix[$job][$location];

        echo json_encode([
            "status" => "success",
            "company" => $company
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "No valid company found for job '$job' at location '$location'."
        ]);
    }
}
?>