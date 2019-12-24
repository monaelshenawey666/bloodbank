<?php
return [
  "driver" => "smtp",
  "host" => "smtp.mailtrap.io",
  "port" => 2525,
  "from" => array(
      "address" => "from@example.com",
      "name" => "Example"
  ),
  "username" => "4f9aba6c8dd5d8",
  "password" => "6fb3ef14c8cf5a",
  "sendmail" => "/usr/sbin/sendmail -bs"
];