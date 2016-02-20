<?php
return [


'driver' => env('MAIL_DRIVER'),
'host' => env('MAIL_HOST'),
 'port' => env('MAIL_PORT'),
'from' => ['address' => null, 'name' => null],
 'encryption' => env('MAIL_ENCRYPTION', 'tls'),
 'username' => env('postmaster@www.webprinciples.com'),
  'password' => env('ad34eedb54fb47114cc32c6cd04c3a5e'),
 'sendmail' => '/usr/sbin/sendmail -bs',
 'pretend' => env('MAIL_PRETEND', false)

];