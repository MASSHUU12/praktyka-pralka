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
    $date = date("H:i j/m/y");

    $offer = new \Offers();
    $results = $offer->showOffersParam('UniqueOffers', $_GET['offerID']);

    $object = new \submitOffer();
    $object->getOrderInfo($orderID, $_GET['offerID'], $_SESSION['email'], $seller, $amount, $addressWhole, $results[0]['TitleOffers'], $results[0]['DescOffers'], $results[0]['CondOffers'], $results[0]['CategoryOffers'], $results[0]['ImgOffers'], $date);

    $delete = new \Offers();
    $delete->deleteOffer($_GET['offerID'], $seller);

    $showFunds = new \Login;
    $showFunds = $showFunds->showUser($seller);
    $funds = $showFunds[0]['fundsUsers'];

    echo $funds.' '.$amount;

    $total = $funds+$amount;

    $addFunds = new \Login();
    $addFunds->addFunds($seller, $total);
    header("Location: status?success=true");
    
  }
}

//if (!count(debug_backtrace()))
//{
  GetOrder::getOrder($orderID, true);
//}