<?php
  require_once 'vendor/autoload.php';
  use ZammadAPIClient\Client;
  use ZammadAPIClient\ResourceType;

  $client = new Client([
      'username'      => 'your_login@email_address.com',  // Username to use for authentication
      'password'      => 'your_password',           // Password to use for authentication
      'url'           => 'http://localhost:3000', // URL to your Zammad installation
    // 'debug'         => true,                // Enables debug output
  ]);

  $tickets = $client->resource(ResourceType::TICKET)->search('title:asdad state:new');
  if (empty($tickets)) {
    echo "No data is found. \n";
  }

  foreach($tickets as $ticket)
  {
    echo $ticket->getValues()['title'] . ' ';
    echo $ticket->getValues()['customer']. "\n";
  } 
