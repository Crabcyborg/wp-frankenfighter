<?php
return [
	'head' => [
		'image' => frankenfighter_image('bowhead-whale-head'),
		'style' => ['top' => '42px', 'left' => '84px', 'zIndex' => 5, 'maxWidth' => '54px'],
		'antlers' => [
			'image' => frankenfighter_image('koodoo-antlers'),
			'style' => ['maxWidth' => '50px', 'zIndex' => 4, 'transform' => 'translateX(-20px) translateY(-60px)']
		]
	],
	'torso' => [
		'image' => frankenfighter_image('tiger-torso'),
		'style' => ['maxWidth' => '90px', 'zIndex' => 1]
	],
	'legs' => [
		[
			'image' => frankenfighter_image('water-buffalo-leg-1'),
			'style' => ['maxWidth' => '22px', 'right' => '10px', 'bottom' => '40px', 'zIndex' => 1, 'transformOrigin' => '50% 25%'],
			'foot' => [
				'image' => frankenfighter_image('baboon-foot-1'),
				'style' => ['bottom' => '8px', 'maxWidth' => '20px', 'right' => '8px']
			]
		],
		[
			'image' => frankenfighter_image('water-buffalo-leg-2'),
			'style' => ['maxWidth' => '30px', 'right' => '10px', 'bottom' => '50px'],
			'foot' => [
				'image' => frankenfighter_image('baboon-foot-2'),
				'style' => ['bottom' => '12px', 'maxWidth' => '20px', 'left' => '4px']
			]
		],
		[
			'image' => frankenfighter_image('water-buffalo-leg-3'),
			'style' => ['maxWidth' => '22px', 'left' => '8px', 'bottom' => '52px'],
			'foot' => [
				'image' => frankenfighter_image('baboon-foot-3'),
				'style' => ['bottom' => '8px', 'maxWidth' => '12px', 'left' => '0px']
			]
		],
		[
			'image' => frankenfighter_image('water-buffalo-leg-4'),
			'style' => ['maxWidth' => '22px', 'bottom' => '65px', 'zIndex' => 4, 'position' => 'relative'],
			'foot' => [
				'image' => frankenfighter_image('lady-crab-claw'),
				'style' => ['position' => 'absolute', 'top' => '35px', 'left' => '33px', 'zIndex' => 1, 'maxWidth' => '24px', 'transformOrigin' => 'top left', 'transform' => 'rotate(90deg)']
			]
		]
	],
	'tail' => [
		'image' => frankenfighter_image('peacock-tail'),
		'style' => ['maxWidth' => '66px', 'transform' => 'translateX(-48px) translateY(-36px) rotate(16deg)', 'zIndex' => 2, 'transformOrigin' => 'top right']
	]
];