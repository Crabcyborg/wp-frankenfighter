<?php
return [
	'head' => [
		'image' => frankenfighter_image('elephant-head'),
		'style' => ['top' => '76px', 'left' => '92px', 'zIndex' => 3, 'maxWidth' => '90px', 'transform' => 'rotate(10deg)', 'transformOrigin' => '25% 25%'],
		'antlers' => [
			'image' => frankenfighter_image('rocky-mountain-sheep-horns'),
			'style' => ['maxWidth' => '50px', 'zIndex' => 4, 'transform' => 'translateX(-12px) translateY(-86px)']
		]
	],
	'torso' => [
		'image' => frankenfighter_image('rooster-torso'),
		'style' => ['maxWidth' => '74px', 'zIndex' => 1, 'transform' => 'rotate(40deg)']
	],
	'legs' => [
		[
			'image' => frankenfighter_image('polar-bear-leg-1'),
			'style' => ['maxWidth' => '36px', 'bottom' => '46px', 'left' => '24px', 'transformOrigin' => '60% 15%'],
			'foot' => [
				'image' => frankenfighter_image('chimpanzee-foot-1'),
				'style' => ['right' => '16px', 'bottom' => '14px', 'transform' => 'scale(1.3)', 'transformOrigin' => '87% 17%']
			]
		],
		[
			'image' => frankenfighter_image('ostrich-leg-2'),
			'style' => ['maxWidth' => '24px', 'bottom' => '54px', 'left' => '6px', 'zIndex' => 3, 'transformOrigin' => '80% 10%'],
			'foot' => [
				'image' => frankenfighter_image('ibis-foot-2'),
				'style' => ['bottom' => '6px', 'left' => '6px', 'transform' => 'scale(1.9)', 'transformOrigin' => '30% 5%']
			]
		],
		[
			'image' => frankenfighter_image('frog-leg-2'),
			'style' => ['maxWidth' => '26px', 'bottom' => '70px', 'right' => '6px', 'transform' => 'rotate(15deg)', 'transformOrigin' => '10% 20%'],
			'foot' => [
				'image' => frankenfighter_image('frog-foot-2'),
				'style' => ['bottom' => '8px', 'left' => '6px', 'transformOrigin' => '12% 4%']
			]
		],
		[
			'image' => frankenfighter_image('zebra-leg-4'),
			'style' => ['maxWidth' => '40px', 'bottom' => '44px', 'transform' => 'rotate(-10deg)', 'right' => '16px', 'zIndex' => 4, 'transformOrigin' => '50% 10%'],
			'foot' => [
				'image' => frankenfighter_image('zebra-foot-4'),
				'style' => ['bottom' => '12px', 'left' => '13px', 'transformOrigin' => '20% 10%', 'maxWidth' => '26px']
			]
		]
	],
	'tail' => [
		'image' => frankenfighter_image('lemur-tail'),
		'style' => ['maxWidth' => '40px', 'bottom' => '156px', 'left' => '26px', 'zIndex' => 5, 'transformOrigin' => '22% 90%']
	]
];