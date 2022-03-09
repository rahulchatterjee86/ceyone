<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Cookie;
use Hash;
use Request;
use Session;
use Validator;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Lang;
use App\Library\CommonFunction;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\OptionController;

class LoginController extends Controller
{
    const SERVER_NAME = "103.26.219.202";
    const INSTANCE_NAME = "MSSQLSERVER2012";
    const PORT = 1433;
    const DB_NAME = "SatyajitMLM";
    const DB_USER = "SatyajitMLM";
    const DB_PASS = "g%s3N1c5";
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen.
    |
    */
    public $classCommonFunction;
    public $settingsData = array();
    public $recaptchaData = array();
    public $product;
    public $option;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('verifyLoginPage');
      $this->middleware('isAdminLogin')->only('goToAdminLoginPage');

      $this->classCommonFunction  = new CommonFunction();
      $this->product  = new ProductsController();
      $this->option  = new OptionController();
    }
    
  /**
   * 
   * Manage admin user cookie data
   *
   * @param null
   * @return response
   */
  public function goToAdminLoginPage(){
    $user_view = '';
    $pass_view = '';
    $recaptchaData  = get_recaptcha_data();
    
    $this->classCommonFunction->set_admin_lang();
    
    if(Cookie::has('remember_me_data')){
      $get_cookie   = Cookie::get('remember_me_data');
      $cookie_parse = explode('#', $get_cookie);
      
      if(is_array($cookie_parse) && count($cookie_parse) > 0){
        $userDetails  =  User::find( $cookie_parse[0] );
        $password     =  bcrypt( base64_decode($cookie_parse[1]) );

        if(Hash::check( base64_decode($cookie_parse[1]), $password ) && Hash::check( base64_decode($cookie_parse[1]), $userDetails['password'] )){
          $user_view = $userDetails['email'];
          $pass_view = base64_decode($cookie_parse[1]);
        }
      }
    }
    
    $data = array(
                  'user'  =>  $user_view,
                  'pass'  =>  $pass_view,
                  'is_enable_recaptcha' => $recaptchaData['enable_recaptcha_for_admin_login']
    );
    
    return view('pages.auth.admin-login')->with('data', $data);
  }
  
  /**
   * 
   * Manage frontend user cookie data
   *
   * @param null
   * @return response
   */
  public function goToFrontendLoginPage(){
    $user_view  =  '';
    $pass_view  =  '';
    $data       =  array(); 
    $recaptchaData  = get_recaptcha_data();
    
    if(Cookie::has('frontend_remember_me_data')){
      $get_cookie   = Cookie::get('frontend_remember_me_data');
      $cookie_parse = explode('#', $get_cookie);
      
      if(is_array($cookie_parse) && count($cookie_parse) > 0){
        $userDetails  =  User::find( $cookie_parse[0] );
        $password     =  bcrypt( base64_decode($cookie_parse[1]) );

        if(Hash::check( base64_decode($cookie_parse[1]), $password ) && Hash::check( base64_decode($cookie_parse[1]), $userDetails['password'])){
          $user_view = $userDetails['name'];
          $pass_view = base64_decode($cookie_parse[1]);
        }
      }
    }

    $login_data = array(
                  'user'  =>  $user_view,
                  'pass'  =>  $pass_view,
                  'is_enable_recaptcha' => $recaptchaData['enable_recaptcha_for_user_login']
    );
    $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
    $data['frontend_login_data'] =  $login_data;
    $data['settings_data'] =  global_settings_data();
    
    return view('pages.auth.user-login')->with( $data );
  }
  
  
  public function goToFrontendDisLoginPage(){
    $user_view  =  '';
    $pass_view  =  '';
    $data       =  array(); 
    $recaptchaData  = get_recaptcha_data();
    
    if(Cookie::has('frontend_remember_me_data')){
      $get_cookie   = Cookie::get('frontend_remember_me_data');
      $cookie_parse = explode('#', $get_cookie);
      
      if(is_array($cookie_parse) && count($cookie_parse) > 0){
        $userDetails  =  User::find( $cookie_parse[0] );
        $password     =  bcrypt( base64_decode($cookie_parse[1]) );

        if(Hash::check( base64_decode($cookie_parse[1]), $password ) && Hash::check( base64_decode($cookie_parse[1]), $userDetails['password'])){
          $user_view = $userDetails['name'];
          $pass_view = base64_decode($cookie_parse[1]);
        }
      }
    }

    $login_data = array(
                  'user'  =>  $user_view,
                  'pass'  =>  $pass_view,
                  'is_enable_recaptcha' => $recaptchaData['enable_recaptcha_for_user_login']
    );
    
    $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
    $data['frontend_login_data'] =  $login_data;
    $data['settings_data'] =  global_settings_data();
    
    return view('pages.auth.distributor-login')->with( $data );
  }
  
  
  /**
   * 
   * Manage admin login
   *
   * @param null
   * @return response
   */
  public function postAdminLogin(){
    if( Request::isMethod('post') && Session::token() == Request::Input('_token') ){
      $get_input = Request::all();
      
      $rules = [
                  'admin_login_email'             => 'required|email',
                  'admin_login_password'          => 'required'
      ];
      
      $messages = [
                    'admin_login_email.required' => Lang::get('validation.email_required'),
                    'admin_login_email.email' => Lang::get('validation.email_is_email'),
                    'admin_login_password.required' => Lang::get('validation.password_required')
      ];
      
      $recaptchaData  = get_recaptcha_data();
      if($recaptchaData['enable_recaptcha_for_admin_login'] == true){
        $rules['g-recaptcha-response']  = 'required|captcha';
        $messages['g-recaptcha-response.required']  =  Lang::get('validation.g_recaptcha_response_required');
      }
      
      $validator = Validator:: make($get_input, $rules, $messages);
      
      if($validator->fails()){
        return redirect()-> back()
        ->withInput(Request::except('admin_login_password'))
        ->withErrors( $validator );
      }
      else{
        $email      =      Request::Input('admin_login_email');
        $password   =      bcrypt(Request::Input('admin_login_password'));
        
        $userdata   =      ['email' => $email, 'user_status' => 1];
        
        $data       =      User::where($userdata)->first();
        
        if(!empty($data) && isset($data->password) && isset($data->id)){
          $get_user_role =  get_user_details( $data->id );
          
          if(Hash::check(Request::Input('admin_login_password'), $password) && Hash::check(Request::Input('admin_login_password'), $data->password) && isset($get_user_role['user_role_slug']) && ($get_user_role['user_role_slug'] == 'administrator') || ($get_user_role['user_role_slug'] == 'vendor')){
            
            if(Session::has('shopist_admin_user_id')){
              Session::forget('shopist_admin_user_id');
              Session::put('shopist_admin_user_id', $data->id);
            }
            elseif(!Session::has('shopist_admin_user_id')){
              Session::put('shopist_admin_user_id', $data->id);
            }

            $remember = (Request::has('remember_me')) ? true : false;

            if($remember == TRUE){
              $remember_data = '';
              $remember_data = $data->id . '#' . base64_encode(Request::Input('admin_login_password'));
              
              return redirect()->route('admin.dashboard')->withCookie(cookie()->forever('remember_me_data', $remember_data));
            }
            elseif($remember == FALSE){
              if(Cookie::has('remember_me_data')){
                $cookie = Cookie::forget('remember_me_data');
                return redirect()->route('admin.dashboard')->withCookie( $cookie );
              }
              else {
                return redirect()->route('admin.dashboard');
              }
            }
          }
          else{
            Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
            return redirect()-> back();
          }
        }
        else{
          Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
          return redirect()-> back();
        }
      }
    }
    else{
      return redirect()-> back();
    }
  }
  
  /**
   * 
   * Manage frontend login
   *
   * @param null
   * @return void
   */
  public function postFrontendLogin(){
    if( Request::isMethod('post') && Session::token() == Request::Input('_token') ){
      $inputData = Request::all();
      
      $rules = [
        'login_username'             => 'required',
        'login_password'             => 'required'
      ];
      
      $messages = [
        'login_username.required'   =>  Lang::get('validation.user_name_required'),
        'login_password.required'   =>  Lang::get('validation.password_required')
      ];
      
      $recaptchaData  = get_recaptcha_data();
      if($recaptchaData['enable_recaptcha_for_user_login'] == true){
        //$rules['g-recaptcha-response']  = 'required|captcha';
        //$messages['g-recaptcha-response.required']  =  Lang::get('validation.g_recaptcha_response_required');
      }
      
      $validator = Validator:: make($inputData, $rules, $messages);
      
      if($validator->fails()){
        return redirect()-> back()
        ->withInput()
        ->withErrors( $validator );
      }
      else{
        $username       =      Request::Input('login_username');
        $password       =      bcrypt(Request::Input('login_password'));
        $userdata       =      ['email' => $username, 'user_status' => 1];
        $data           =      User::where($userdata)->first();
        
        if(!empty($data) && isset($data->password) && isset($data->id)){
          $get_user_role =  get_user_details( $data->id );
           
          if(Hash::check(Request::Input('login_password'), $password) && Hash::check(Request::Input('login_password'), $data->password)){
            
            if(Session::has('shopist_frontend_user_id')){
              Session::forget('shopist_frontend_user_id');
              Session::forget('shopist_frontend_user_role');
              Session::put('shopist_frontend_user_id', $data->id);
              Session::put('shopist_frontend_user_role', $get_user_role['user_role']);
            }
            elseif(!Session::has('shopist_frontend_user_id')){
              Session::put('shopist_frontend_user_id', $data->id);
              Session::put('shopist_frontend_user_role', $get_user_role['user_role']);
            }

            $remember = (Request::has('login_remember_me')) ? true : false;

            if($remember == TRUE){
              $cookieData  =  array();
              $cookieData  =  $data->id . '#' . base64_encode(Request::Input('login_password'));
              
              return redirect()->route('user-account-page')->withCookie(cookie()->forever('frontend_remember_me_data', $cookieData));
            }
            elseif($remember == FALSE){
              if(Cookie::has('frontend_remember_me_data')){
                $cookie = Cookie::forget('frontend_remember_me_data');
                return redirect()->route('user-account-page')->withCookie( $cookie );
              }
              else {
                return redirect()->route('user-account-page');
              }
            }
          }
          else{
            Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
            return redirect()-> back();
          }
        }
        else{
          Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
          return redirect()-> back();
        }
      }
    }
    else {
      return redirect()-> back();
    }
  }
  
  //sed otp distributer 

  public function sendQuickOTP(){
	  
	  $username = request()->input('login_username');
	  $password = request()->input('login_password');
	  
	  $data = $this->getUserData($username, $password);
	  
	  //dump($data);
	  
	  if($data) {
		  
		  $user = User::firstOrNew([
			  'unique_id' => $data->User_Name
		  ], [
			  'name' => $data->User_Name,
			  'email' => empty($data->Email_Id) ? null : $data->Email_Id,
			  'mobile' => empty($data->Mobile_No) ? null : $data->Mobile_No,
		  ]);
		  
		  //dd($user);
		  
		  if(!$user->exists) {

			  $user->display_name = $data->Name;
			  $user->name = $data->User_Name;
			  $user->email = empty($data->Email_Id) ? null : $data->Email_Id;
			  $user->mobile = empty($data->Mobile_No) ? null : $data->Mobile_No;
			  $user->password = bcrypt($password);
			  $user->user_status = 1;
			  $user->unique_id = $data->User_Name;
			  $user->save();
		  }
		  else {
			  $user->password = bcrypt($password);
			  $user->save();
		  }
		  $role = Role::where('slug', 'vendor')->firstOrFail();
		  
		  if(!$user->roles->contains($role->id)) {  
		  	$user->roles()->save($role);
		  }
	  }
	  else {
		  Session::flash('error-message', Lang::get('user not found or password incorrect'));
          return redirect()-> back();
	  }
	  
	  
    if( Request::isMethod('post') && Session::token() == Request::Input('_token') ){
      $inputData = Request::all();
      
      $rules = [
        'login_username'             => 'required',
        'login_password'             => 'required'
      ];
      
      $messages = [
        'login_username.required'   =>  Lang::get('validation.user_name_required'),
        'login_password.required'   =>  Lang::get('validation.password_required')
      ];
      
      $recaptchaData  = get_recaptcha_data();
      if($recaptchaData['enable_recaptcha_for_user_login'] == true){
        //$rules['g-recaptcha-response']  = 'required|captcha';
        //$messages['g-recaptcha-response.required']  =  Lang::get('validation.g_recaptcha_response_required');
      }
      
      $validator = Validator:: make($inputData, $rules, $messages);
      
      if($validator->fails()){
        return redirect()-> back()
        ->withInput()
        ->withErrors( $validator );
      }
      else{
        $username       =      Request::Input('login_username');
        $password       =      bcrypt(Request::Input('login_password'));
        $userdata       =      ['unique_id' => $username, 'user_status' => 1];
        $data           =      User::where($userdata)->first();
        //print_r($data);die;
        if(!empty($data) && isset($data->password) && isset($data->id)){
          $get_user_role =  get_user_details( $data->id );
           
          if(Hash::check(Request::Input('login_password'), $password) && Hash::check(Request::Input('login_password'), $data->password)){
            Session()->forget('otp');
            //$otp=rand(1000,9999);
            $otp=121213;
            $message="Here's your OTP ".$otp." to login. Team Ceyone.";

            $template_id=1207162702605088256;
           
           $send=$this->classCommonFunction->send_sms($data->mobile,$message, $template_id);

             
             Session::put('login_username', $username);
             Session::put('login_password', Request::Input('login_password'));
             Session::put('otp', $otp);

              Session::flash('success-message', Lang::get('admin.authentication_success_msg'));
              return redirect()->route('otp-validate');
           
          }
          else{
            //Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
			Session::flash('error-message', Lang::get('hash check failed'));
            return redirect()-> back();
          }
        }
        else{
          //Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
		  Session::flash('error-message', Lang::get('user not found'));
          return redirect()-> back();
        }
      }
    }
    else {
      return redirect()-> back();
    }
  }


//otp page 

  public function goToFrontendOtpPage(){
    $user_view  =  '';
    $pass_view  =  '';
    $data       =  array(); 
    $recaptchaData  = get_recaptcha_data();

    $login_data = array(
                  'user'  =>  $user_view,
                  'pass'  =>  $pass_view,
                  'is_enable_recaptcha' => $recaptchaData['enable_recaptcha_for_user_login']
    );
    
    $data = $this->classCommonFunction->get_dynamic_frontend_content_data();
    $data['frontend_login_data'] =  $login_data;
    $data['settings_data'] =  global_settings_data();
    
    return view('pages.auth.validation')->with( $data );
  }


  public function postFrontendDisLogin(){

    if( Request::isMethod('post') && Session::get('otp') == Request::Input('otp') ){

    if( Request::isMethod('post') && Session::token() == Request::Input('_token') ){
      $inputData = Request::all();
      
      $rules = [
        'login_username'             => 'required',
        'login_password'             => 'required'
      ];
      
      $messages = [
        'login_username.required'   =>  Lang::get('validation.user_name_required'),
        'login_password.required'   =>  Lang::get('validation.password_required')
      ];
      
      $recaptchaData  = get_recaptcha_data();
      if($recaptchaData['enable_recaptcha_for_user_login'] == true){
        //$rules['g-recaptcha-response']  = 'required|captcha';
        //$messages['g-recaptcha-response.required']  =  Lang::get('validation.g_recaptcha_response_required');
      }
      
      $validator = Validator:: make($inputData, $rules, $messages);
      
      if($validator->fails()){
        return redirect()-> back()
        ->withInput()
        ->withErrors( $validator );
      }
      else{
        $username       =      Request::Input('login_username');
        $password       =      bcrypt(Request::Input('login_password'));
        $userdata       =      ['unique_id' => $username, 'user_status' => 1];
        $data           =      User::where($userdata)->first();
        //print_r($data);die;
        if(!empty($data) && isset($data->password) && isset($data->id)){
          $get_user_role =  get_user_details( $data->id );
           
          if(Hash::check(Request::Input('login_password'), $password) && Hash::check(Request::Input('login_password'), $data->password)){
            
            if(Session::has('shopist_frontend_user_id')){
              Session::forget('shopist_frontend_user_id');
              Session::forget('shopist_frontend_user_role');
              Session::forget('dis_unique_id');
              Session::put('shopist_frontend_user_id', $data->id);
              Session::put('shopist_frontend_user_role', $get_user_role['user_role']);
              Session::put('dis_unique_id', $data->unique_id);
            }
            elseif(!Session::has('shopist_frontend_user_id')){
              Session::put('shopist_frontend_user_id', $data->id);
              Session::put('shopist_frontend_user_role', $get_user_role['user_role']);
              Session::put('dis_unique_id', $data->unique_id);
            }

            $remember = (Request::has('login_remember_me')) ? true : false;

            if($remember == TRUE){
              $cookieData  =  array();
              $cookieData  =  $data->id . '#' . base64_encode(Request::Input('login_password'));
              
              return redirect()->route('user-account-page')->withCookie(cookie()->forever('frontend_remember_me_data', $cookieData));
            }
            elseif($remember == FALSE){
              if(Cookie::has('frontend_remember_me_data')){
                $cookie = Cookie::forget('frontend_remember_me_data');
                return redirect()->route('user-account-page')->withCookie( $cookie );
              }
              else {
                 Session()->forget('otp');
                return redirect()->route('user-account-page');
              }
            }
          }
          else{
            Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
            return redirect()-> back();
          }
        }
        else{
          Session::flash('error-message', Lang::get('admin.authentication_failed_msg'));
          return redirect()-> back();
        }
      }
    }
    else {
      return redirect()-> back();
    }

  } else {
          Session::flash('error-message', Lang::get('OTP Mismatched'));
          return redirect()-> back();
  }

  }
  
  /**
   * 
   * logout
   *
   * @param null
   * @return response
   */
  public function logoutFromLogin(){
    if(Session::has('shopist_admin_user_id')){
      Session::forget('shopist_admin_user_id');
      return redirect()-> route('admin.login');
    }  
  }
	
	private function getUserData($username, $password)
    {
		$client = new \GuzzleHttp\Client();
		$response = $client->request('POST', 'http://ceyonebiz.co.in/API/Authenticate.aspx', [
			'body' => json_encode([
				'RequestType' => 'Authenticate',
				'APIKey' => '9711D0BE-1257-468D-8B65-108B0354B11A',
				'RequestParam' => "{'User_Name':'{$username}','Password':'{$password}'}"
			])
		]);
		$responseBody = json_decode($response->getBody());
		if($responseBody->Status > 0) {
			return json_decode($responseBody->ResponseData);
		}
		return false;
	}

	private function getUserData22($username, $password)
    {
        $serverName = self::SERVER_NAME . "\\" . self::INSTANCE_NAME . ", " . self::PORT; //serverName\instanceName, portNumber (default is 1433)
        $connectionInfo = array("Database" => self::DB_NAME, "UID" => self::DB_USER, "PWD" => self::DB_PASS);
		
		/*
		$serverName = "103.26.219.202\\MSSQLSERVER2012, 1433"; //serverName\instanceName, portNumber (default is 1433)
		$connectionInfo = array( "Database"=>"SatyajitMLM", "UID"=>"SatyajitMLM", "PWD"=>"g%s3N1c5");
		*/
        $conn = sqlsrv_connect($serverName, $connectionInfo);

        if ($conn) {
            //echo "Connection established.<br />";
        } else {
            echo "Connection could not be established.<br />";
            die(print_r(sqlsrv_errors(), true));
        }

        $sql = "SELECT md.*,mr.* FROM dbo.Member_Details as md  LEFT JOIN dbo.Member_Registration as mr ON md.Member_Id = mr.Member_Id where mr.User_Name = " . $username . " and mr.Password = " . $password;
        $params = array();
        $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
        $stmt = sqlsrv_query($conn, $sql, $params, $options);

        $row_count = sqlsrv_num_rows($stmt);
		$data = null;

        if ($row_count) {
			$data = new \stdClass();
            while ($row = sqlsrv_fetch_object($stmt)) {
                //print json_encode($row);
				$data = $row;
            }
        }

        sqlsrv_close($conn);
		
		return $data;
    }
}