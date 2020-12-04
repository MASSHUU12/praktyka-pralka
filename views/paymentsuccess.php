<?php 
//1. Import the PayPal SDK client
namespace Sample;
require '../config/config.php';

require __DIR__ . '/../vendor/autoload.php';
use Sample\PayPalClient;
use PayPalCheckoutSdk\Orders\OrdersGetRequest;

require 'paypal-client.php';

$orderID = $_GET['orderID'];

class GetOrder
{   
  // 2. Set up your server to receive a call from the client
  public static function getOrder($orderId)
  {

    // 3. Call PayPal to get the transaction details
    $client = PayPalClient::client();
    $response = $client->execute(new OrdersGetRequest($orderId));
	
	// 4. Specify which information you want from the transaction details. For example:
	$orderID = $response->result->id;
	$email = $response->result->payer->email_address;
	$name = $response->result->purchase_units[0]->shipping->name->full_name;
    $address = $response->result->purchase_units[0]->shipping->address;
    $amount = $response->result->purchase_units[0]->payments->captures[0]->amount->value;
    $seller = $response->result->purchase_units[0]->description;

    $addressLine = $address->address_line_1;
    $addressAdmin = $address->admin_area_2;
    $addressPost = $address->postal_code;

    $addressWhole = $addressLine.', '.$addressAdmin.', '.$addressPost;
    $object = new \submitOffer();
    $object->getOrderInfo($orderID, $_GET['offerID'], $email, $seller, $amount, $addressWhole);
    
    $sold = new \submitOffer();
    $sold->changeToSold($_GET['offerID']);
    
    header("Location: user?success=true");
    
  }
}

//if (!count(debug_backtrace()))
//{
  GetOrder::getOrder($orderID, true);
//}
?>