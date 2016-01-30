<?php
return [


'driver' => env('MAIL_DRIVER', 'mailgun'),
'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
 'port' => env('MAIL_PORT', 587),
'from' => ['address' => null, 'name' => null],
 'encryption' => env('MAIL_ENCRYPTION', 'tls'),
 'username' => env('postmaster@www.webprinciples.com'),
  'password' => env('ad34eedb54fb47114cc32c6cd04c3a5e'),
 'sendmail' => '/usr/sbin/sendmail -bs',
 'pretend' => env('MAIL_PRETEND', false)

];