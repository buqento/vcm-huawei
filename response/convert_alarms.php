<?php
	$alarmlists = 
	[ 'alarm-list' => 
		[
			'alarm' => 
			[
				'alarm-id' => '815fa3b2a0d84a2c986d83ff1873bee6#000008384535655647883520@8',
				'type' => 4,
				'rule' => [
					'type' => 16
				],
				'alarmListType' => 2,
				'alarm-time' => '1541062830843',
				'algorithmCode' => '0104000110',
				'ba-info' => [
					'object-count-in' => 0,
					'object-count-out' => 0
				],
				'fr-info' => [
					'face-id' => '815fa3b2a0d84a2c986d83ff1873bee6%2325813796630893828',
					'faceRect' => [
						'bottom' => 737,
						'left' => 798,
						'right' => 934,
						'top' => 601
					],
					'score' => 89
				],
				'hitType' => 1,
				'alarm-level' => 1,
				'lpr-info' => [
					'car-bright' => '',
					'car-color' => '',
					'car-direction' => '',
					'confidence' => '',
					'license-plate' => '',
					'plateId' => '',
					'plate-color' => '',
					'plate-rect' => [
						'bottom' => '',
						'left' => '',
						'right' => '',
						'top' => ''
					],
					'plate-type' => ''
				],
				'pictureId' => '815fa3b2a0d84a2c986d83ff1873bee6%238312478061609955584',
				'source' => 1,
			],
			'domainCode' => '815fa3b2a0d84a2c986d83ff1873bee6',
			'host' => [
				'index' => 0,
				'machineId' => 2001
			],
			'task-info' => [
				'camera-id' => '03372600000000000101#5011c29bd51145a4917f42f0fbfb73ec',
				'camera-name' => '192_168_3_240',
				'case-file-id' => '',
				'resolution' => '',
				'task-id' => '153862204624367403'
			],

		]
	];


// encode array to json
$json = json_encode(array($alarmlists));

// // write json to file
if (file_put_contents("data.json", $json))
    echo "File JSON sukses dibuat...";
else 
    echo "Oops! Terjadi error saat membuat file JSON...";


?>