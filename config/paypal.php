<?php

/**
 * Paypal Config and Settings
 */

 return [
     //Sandbox
     'sandbox_client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
     'sandbox_secret' => env('PAYPAL_SANDBOX_SECRET'),


     //Live
     'live_client_id' => env('PAYPAL_LIVE_CLIENT_ID'),
     'live.secret' => env('PAYPAL_LIVE_SECRET'),

     //Paypal SDK Configurations

     'settings' => [
         //Mode (live or sandbox)
         'mode' => 'sandbox' , //env('PAYPAL_MODE', 'sandbox'),
         //Connection timout
         'http.ConnectionTimeOut' => 3000,
         //Logs
         'log.LogEnabled' => true,
         'log.FileName' => storage_path() .'/logs/paypal.log',
         //Level: DEBUG, INFO, WARN, ERROR
         'log.LogLevel' => 'DEBUG'
     ]
 ];