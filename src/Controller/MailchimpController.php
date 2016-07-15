<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use MailChimp\MailChimp;

class MailchimpController extends AppController
{
	public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        $this->Auth->allow(['add', 'logout']);
    }
	
	public function add()
	{
	/*
	Remove List from Mailchimp Account
	*/	
	$listname = $_POST['listname'];
	$apikey = "48d69210d1cbc449f924198050e4a0cf-us13";
	$dataCenter = substr($apikey,strpos($apikey,'-')+1);
	$request_type = 'POST';
	$campaign_details = [
                    'from_name' => $listname,
                    'from_email' => 'test@test.com',
                    'subject' => 'Test',
                    'language' => 'English'
                ];

		$contact = [
                    'company' => "Company Name",
                    'address1' => '123 Banana Lane',
                    'city' => 'Atlanta',
                    'state' => 'GA',
                    'zip' => '30308',
                    'country' => 'US',
                    'phone' => '',
                ];
		$data = [
                    'name' => $listname,
                    'contact' => $contact,
                    'permission_reminder' => $listname,
                    'campaign_defaults' => $campaign_details,
                    'notify_on_subscribe' => 'test@test.com',
                    'notify_on_unsubscribe' => 'test@test.com',
                    'email_type_option' => false,
                    'visibility' => 'pub',
					'count' => 5, // the number of lists to return, default - all
			'before_date_created' => '2016-01-01 10:30:50', // only lists created before this date
			'after_date_created' => '2014-02-05' // only lists created after this date

                ];	
		$mch = curl_init();
		$headers = array(
			'Content-Type: application/json',
			'Authorization: Basic '.base64_encode( 'user:'. $apikey )
		);
		curl_setopt($mch, CURLOPT_URL, 'https://'. $dataCenter . '.api.mailchimp.com/3.0/lists/');
		curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
		//curl_setopt($mch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
		curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
		curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
		curl_setopt($mch, CURLOPT_TIMEOUT, 10);
		curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection
	 
		if( $request_type != 'GET' ) {
			curl_setopt($mch, CURLOPT_POST, true);
			curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
		}
	 
		$result = curl_exec($mch);
		$getLists = json_decode($result);
		
	}
	
	public function deletelist($id)
	{
	/*
	Remove List from Mailchimp Account
	*/	
	$apikey = "48d69210d1cbc449f924198050e4a0cf-us13";
	$dataCenter = substr($apikey,strpos($apikey,'-')+1);
	$request_type = 'DELETE';
	
		$mch = curl_init();
		$headers = array(
			'Content-Type: application/json',
			'Authorization: Basic '.base64_encode( 'user:'. $apikey )
		);
		curl_setopt($mch, CURLOPT_URL, 'https://'. $dataCenter . '.api.mailchimp.com/3.0/lists/'.$id);
		curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
		//curl_setopt($mch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
		curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
		curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
		curl_setopt($mch, CURLOPT_TIMEOUT, 10);
		curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection
	 
		if( $request_type != 'GET' ) {
			curl_setopt($mch, CURLOPT_POST, true);
			curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($id) ); // send data in json
		}
	 
		$result = curl_exec($mch);
		$getLists = json_decode($result);
		print_r($getLists);
	}

	public function listMailchimp()
    {
		$apikey = "48d69210d1cbc449f924198050e4a0cf-us13";
		$dataCenter = substr($apikey,strpos($apikey,'-')+1);
		$request_type = 'GET';
		$campaign_details = [
                    'from_name' => 'Lucas',
                    'from_email' => 'test@test.com',
                    'subject' => 'Test',
                    'language' => 'English'
                ];

		$contact = [
                    'company' => "Company Name",
                    'address1' => '123 Banana Lane',
                    'city' => 'Atlanta',
                    'state' => 'GA',
                    'zip' => '30308',
                    'country' => 'US',
                    'phone' => '',
                ];
		$data = [
                    'name' => 'Test',
                    'contact' => $contact,
                    'permission_reminder' => 'This is a test',
                    'campaign_defaults' => $campaign_details,
                    'notify_on_subscribe' => 'test@test.com',
                    'notify_on_unsubscribe' => 'test@test.com',
                    'email_type_option' => false,
                    'visibility' => 'pub',
					'count' => 5, // the number of lists to return, default - all
			'before_date_created' => '2016-01-01 10:30:50', // only lists created before this date
			'after_date_created' => '2014-02-05' // only lists created after this date

                ];		
		
		
	$mch = curl_init();
	$headers = array(
		'Content-Type: application/json',
		'Authorization: Basic '.base64_encode( 'user:'. $apikey )
	);
	curl_setopt($mch, CURLOPT_URL, 'https://'. $dataCenter . '.api.mailchimp.com/3.0/lists/');
	curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
	//curl_setopt($mch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
	curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); // do not echo the result, write it into variable
	curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); // according to MailChimp API: POST/GET/PATCH/PUT/DELETE
	curl_setopt($mch, CURLOPT_TIMEOUT, 10);
	curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); // certificate verification for TLS/SSL connection
 
	if( $request_type != 'GET' ) {
		curl_setopt($mch, CURLOPT_POST, true);
		curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); // send data in json
	}
 
	$result = curl_exec($mch);
	$getLists = json_decode($result);
	$this->set('getLists', $getLists);
	
		
	}
}