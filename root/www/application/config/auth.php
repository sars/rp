<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'driver' => 'ORM',
	'hash_method' => 'sha1',
	'salt_pattern' => '1, 3, 5, 9, 14, 17, 20, 21, 27, 30',
	'lifetime' => 1209600,
	'session_key' => 'auth_user',
	'users' => array
	(
		// 'admin' => 'b3154acf3a344170077d11bdb5fff31532f679a1919e716a02',
	),
);
