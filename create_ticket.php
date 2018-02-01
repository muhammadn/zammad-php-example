<?php
  require_once 'vendor/autoload.php';
  use ZammadAPIClient\Client;
  use ZammadAPIClient\ResourceType;

  $client = new Client([
      'url'           => 'http://localhost:3000', // URL to your Zammad installation
      'username'      => 'your_login@email_address.com',  // Username to use for authentication
      'password'      => 'your_password',           // Password to use for authentication
    // 'debug'         => true,                // Enables debug output
  ]);

  $ticket_text = 'API test ticket';
  $ticket_data = [
      'title'       => $ticket_text,
      'customer'    => 'customer_email@address.com',
      'group'       => 'Users',
      'article'     => [
          'subject' => $ticket_text,
          'body'    => $ticket_text,
      ],
  ];

  $ticket = $client->resource(ResourceType::TICKET);
  $ticket->setValues($ticket_data);
  $ticket->save();
