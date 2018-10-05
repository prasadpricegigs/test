
<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/API_Controller.php';


class User_api extends API_Controller
{
  public function __construct() {
  
  parent::__construct();
  
    }

public function simple_api()
{

//echo "testing";	
header("Access-Control-Allow-Origin: *");
// API Configuration
$this->_apiConfig(['methods'=>['POST','GET']]);
}
public function api_limit()
{
/**
 * API Limit
 * ----------------------------------
 * @param: {int} API limit Number
 * @param: {string} API limit Type (IP)
 * @param: {int} API limit Time [minute]
 */
$this->_APIConfig([

	'methods'=>['POST','GET'],
    // number limit, type limit, time limit (last minute)
    'limit' => [10, 'ip', 5] 
]);
}
public function api_key()
{
/**
 * Use API Key without Database
 * ---------------------------------------------------------
 * @param: {string} Types
 * @param: {string} API Key
 */
$this->_APIConfig([
	'methods'=>['POST'],
    'key' => ['header', '123456']
	//with database
   // 'key' => ['header']
]);

echo "123456";
}
//login process
public function login ()
{


//$this->_apiConfig(
//	[
//		'methods'=>['POST'],
//		'requireauthorization'=>true

//]);

header("Access-Control-Allow-Origin: *");

// API Configuration
$this->_apiConfig([
    /**
     * By Default Request Method `GET`
     */
    'methods' => ['POST'], // 'GET', 'OPTIONS'


    /**
     * Number limit, type limit, time limit (last minute)
     */
   // 'limit' => [5, 'ip', '5'],//Everyday 

    /**
     * type :: ['header', 'get', 'post']
     * key  :: ['table : Check Key in Database', 'key']
     */
    'key' => ['header','123456'], // type, {key}|table (by default)
]);

    $payload= [ 'id'=>"your id",
                'other' =>"some other data"];

$this->load->library('authorization_token');

$token = $this->authorization_token->generateToken($payload);


// return data
$this->api_return(
    [
        'status' => true,
        "result" => $token,
    ],
200);
}

public function view()

{
header("Access-Control-Allow-Origin: *");

//$user_data= [ 'id'=>"your id",
  //              'other' =>"some other data"];

//$this->load->library('authorization_token');

//$token = $this->authorization_token->generateToken($payload);

$user_data=$this->_apiConfig(
	[
		'methods'=>['POST'],
		'requireAuthorization'=> true,
	]);

$this->api_return(
    [
        'status' => true,
        "result" => [

        	'user_data' =>$user_data['token_data']
        ],
    ],
200);

}


}