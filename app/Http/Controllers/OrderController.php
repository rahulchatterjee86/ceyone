<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostExtra;
use Illuminate\Support\Facades\DB;
use App\Library\CommonFunction;
use App\Library\GetFunction;
use Carbon\Carbon;
use Session;
use Mail;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Models\OrdersItem;
use App\Mail\OrderMail;
use Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\App;
//use Illuminate\Http\Request;




class OrderController extends Controller
{
  public $classCommonFunction;
  public $classGetFunction;
  public $carbonObject;

  public function __construct(){
    $this->classCommonFunction  =  new CommonFunction();
    $this->classGetFunction     =  new GetFunction();
    $this->carbonObject         =  new Carbon();
  }


   /**
   *
   * Order Orders_by_date_range
   *
   * @param null
   * @return response view
   */
  public function Orders_by_date_range(){

    if( Request::isMethod('post') && Session::token() == Request::Input('_token') ){

        $data = array();

        $start_date   = Request::Input('start_date');
        $end_date     = Request::Input('end_date');

        $get_shop_order_data = $this->classGetFunction->get_orders_by_date_range($start_date,$end_date);
        $data = $this->classCommonFunction->commonDataForAllPages();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection( $get_shop_order_data );
        $perPage = 10;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $order_object = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

        $order_object->setPath( route('admin.shop_orders_list') );

        $data['orders_list_data']  =  $order_object;
        $is_vendor = is_vendor_login();
        $sidebar['is_vendor_login'] = $is_vendor;
        $data['sidebar_data'] = $sidebar;

        $data['status_type']= date("d/m/Y", strtotime($start_date) ). " To " .date("d/m/Y", strtotime($end_date) ) ;

        return view('pages.admin.orders.order-list', $data);

    }



  }



  /**
   *
   * Order Search
   *
   * @param null
   * @return response view
   */
  public function Orders_search(){

    if( Request::isMethod('post') && Session::token() == Request::Input('_token') ){

        $data = array();

        $type   = Request::Input('type');
        $query   = Request::Input('query');

        $get_shop_order_data = $this->classGetFunction->search_orders_by_select($type,$query);
        $data = $this->classCommonFunction->commonDataForAllPages();

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $col = new Collection( $get_shop_order_data );
        $perPage = 10;
        $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $order_object = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

        $order_object->setPath( route('admin.shop_orders_list') );

        $data['orders_list_data']  =  $order_object;
        $is_vendor = is_vendor_login();
        $sidebar['is_vendor_login'] = $is_vendor;
        $data['sidebar_data'] = $sidebar;

        $data['status_type']= "Search";

        // print_r($order_object);

        return view('pages.admin.orders.order-list', $data);

    }



  }


  /**
   *
   * Order list content
   *
   * @param null
   * @return response view
   */
  public function orderListsContent(){
    $data = array();
    $data = $this->classCommonFunction->commonDataForAllPages();

    $data['status_type']=Request::get('type');

    // $get_shop_order_data = $this->getOrderList('all_order');

    $get_shop_order_data = $this->getOrderList($data['status_type']);

    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $col = new Collection( $get_shop_order_data );
    $perPage = 10;
    $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
    $order_object = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

    $order_object->setPath( route('admin.shop_orders_list') );

    $data['orders_list_data']  =  $order_object;
    $is_vendor = is_vendor_login();
    $sidebar['is_vendor_login'] = $is_vendor;
    $data['sidebar_data'] = $sidebar;

    return view('pages.admin.orders.order-list', $data);
  }

  /**
   *
   * Order current date content
   *
   * @param null
   * @return response view
   */
  public function orderCurrentDateContent(){
    $data = array();
    $data = $this->classCommonFunction->commonDataForAllPages();

    $data['status_type']="Today's (".Date("d/m/Y").") ";

    $get_shop_order_data = $this->getOrderList('current_date_order');

    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $col = new Collection( $get_shop_order_data );
    $perPage = 10;
    $currentPageSearchResults = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
    $order_object = new LengthAwarePaginator($currentPageSearchResults, count($col), $perPage);

    $order_object->setPath( route('admin.shop_orders_list') );

    $data['orders_list_data']  =  $order_object;

    $is_vendor = is_vendor_login();
    $sidebar['is_vendor_login'] = $is_vendor;
    $data['sidebar_data'] = $sidebar;

    return view('pages.admin.orders.order-list', $data);
  }

  /**
   *
   * Order details content
   *
   * @param order_id
   * @return response
   */
  public function orderDetailsPageContent( $params ){
    $data = array();
    $order_id = 0;
    $get_post = Post::where(['id' => $params, 'post_type' => 'shop_order'])->first();

    if(!empty($get_post) && $get_post->parent_id > 0){
      $order_id = $get_post->parent_id;
    }
    else{
      $order_id = $params;
    }

    $data = $this->classCommonFunction->commonDataForAllPages();
    $get_post_by_order_id     = Post::where(['id' => $params])->first();
    $get_postmeta_by_order_id = PostExtra::where(['post_id' => $order_id])->get();
    $get_orders_items         = OrdersItem::where(['order_id' => $params])->first();

    if($get_post_by_order_id->count() > 0 && $get_postmeta_by_order_id ->count() > 0 && $get_orders_items->count() >0){
      $order_date_format = new Carbon( $get_post_by_order_id->created_at);

      $order_data_by_id = get_customer_order_billing_shipping_info( $order_id );
      $order_data_by_id['_order_id']    = $get_post_by_order_id->id;
      $order_data_by_id['_order_date']  = $order_date_format->toDayDateTimeString();

      foreach($get_postmeta_by_order_id as $postmeta_row_data){
        if($postmeta_row_data->key_name === '_order_shipping_method'){
          $order_data_by_id[$postmeta_row_data->key_name] = $this->classCommonFunction->get_shipping_label($postmeta_row_data->key_value);
        }
        elseif($postmeta_row_data->key_name == '_customer_user'){
          $user_data = unserialize($postmeta_row_data->key_value);
          if($user_data['user_mode'] == 'guest'){
            $order_data_by_id['_member']  = array('name' => 'Guest', 'url' => '');
          }
          elseif($user_data['user_mode'] == 'login'){
            $user_details_by_id = get_user_details($user_data['user_id']);
            $order_data_by_id['_member']  = array('name' => $user_details_by_id['user_display_name'], 'url' => $user_details_by_id['user_photo_url']);
          }
        }
        elseif($postmeta_row_data->key_name == '_order_currency' || $postmeta_row_data->key_name == '_customer_ip_address' || $postmeta_row_data->key_name == '_customer_user_agent' || $postmeta_row_data->key_name == '_order_shipping_cost' || $postmeta_row_data->key_name == '_order_shipping_method' || $postmeta_row_data->key_name == '_payment_method' || $postmeta_row_data->key_name == '_payment_method_title' || $postmeta_row_data->key_name == '_order_tax' || $postmeta_row_data->key_name == '_order_total' || $postmeta_row_data->key_name == '_order_notes' || $postmeta_row_data->key_name == '_order_status' || $postmeta_row_data->key_name == '_order_discount' || $postmeta_row_data->key_name == '_order_coupon_code' || $postmeta_row_data->key_name == '_is_order_coupon_applyed' || $postmeta_row_data->key_name == '_final_order_shipping_cost' || $postmeta_row_data->key_name == '_final_order_tax' || $postmeta_row_data->key_name == '_final_order_total' || $postmeta_row_data->key_name == '_final_order_discount'){
          $order_data_by_id[$postmeta_row_data->key_name] = $postmeta_row_data->key_value;
        }
      }

      $order_data_by_id['_ordered_items']  = json_decode( $get_orders_items->order_data, TRUE );
      $order_data_by_id['_order_history']  = $this->getOrderDownloadHistory( $params );
    }

    $data['order_data_by_id']  =   $order_data_by_id;
    $is_vendor = is_vendor_login();
    $sidebar['is_vendor_login'] = $is_vendor;
    $data['sidebar_data'] = $sidebar;

    return view('pages.admin.orders.order-details', $data);
  }


  /**
   *
   * Get order list
   *
   * @param all order or current date order
   * @return array
   */
  public function getOrderList( $order_track ){
    $order_data = array();


    if(is_vendor_login() && Session::has('shopist_admin_user_id')){
      if($order_track == 'all_order'){
        $get_order  = DB::table('posts')
                      ->where(['posts.post_type' => 'shop_order'])
                      ->where(['vendor_orders.vendor_id' => Session::get('shopist_admin_user_id')])
                      ->join('vendor_orders', 'vendor_orders.order_id', '=', 'posts.id')
                      ->orderBy('posts.id', 'desc')
                      ->select('posts.*')
                      ->get()
                      ->toArray();
      }
      elseif($order_track == 'current_date_order'){
        $get_order  = DB::table('posts')
                      ->where(['posts.post_type' => 'shop_order'])
                      ->where(['vendor_orders.vendor_id' => Session::get('shopist_admin_user_id')])
                      ->whereDate('posts.created_at', '=', $this->carbonObject->today()->toDateString())
                      ->join('vendor_orders', 'vendor_orders.order_id', '=', 'posts.id')
                      ->orderBy('posts.id', 'desc')
                      ->select('posts.*')
                      ->get()
                      ->toArray();
      }
      if(count($get_order) >0){
        $order_data = $this->manageAllOrders( $this->classCommonFunction->objToArray( $get_order ));
      }
    }
    else{
      if($order_track == 'all_order'){

        //old query to get all the data with all status
        // $get_order = Post::where(['parent_id' => 0, 'post_type' => 'shop_order'])->orderBy('id', 'DESC')->get()->toArray();

         $get_order = Post::where(['parent_id' => 0, 'post_type' => 'shop_order'])->orderBy('id', 'DESC')->get()->toArray();

      }
      elseif($order_track == 'current_date_order'){
        $get_order = Post::whereDate('created_at', '=', $this->carbonObject->today()->toDateString())->where(['parent_id' => 0, 'post_type' => 'shop_order'])->get()->toArray();

      } else{

        // query to get the data with order status

        $get_order = DB::table('posts')
           ->whereExists(function ($query) use ($order_track) {
               $query->select('*')
                     ->from('post_extras')
                     ->whereColumn('post_extras.post_id', 'posts.id')
                     ->where('posts.post_type',  'shop_order')
                     ->where('post_extras.key_value',  $order_track);
           })
           ->get();

           //converting objects into array
           $get_order->transform(function($i) {
              return (array)$i;
          });
          $get_order = $get_order->toArray();

        // raw query for the above one
          //  $get_order = DB::select("SELECT * FROM posts WHERE EXISTS (SELECT * FROM post_extras WHERE post_extras.post_id = posts.id AND posts.post_type = 'shop_order' AND post_extras.key_value='pending' )");

      }

      if(count($get_order) >0){
        $order_data = $this->manageAllOrders( $get_order );
      }
    }

    return $order_data;
  }

  /**
   *
   * Manage all orders
   *
   * @param order array
   * @return array
   */
  public function manageAllOrders( $get_order ){
    $order_data = array();

    if(count($get_order) > 0){
      foreach($get_order as $order){
        $order_postmeta = array();

        //added this line to convert objects to array
        // $order     = get_object_vars($order);

        $get_postmeta_by_order_id = PostExtra::where(['post_id' => $order['id']])->get();

        if($get_postmeta_by_order_id->count() > 0){
          $date_format = new Carbon( $order['created_at']);

          $order_postmeta['_post_id']    = $order['id'];
          $order_postmeta['_order_date'] = $date_format->toDayDateTimeString();


          foreach($get_postmeta_by_order_id as $postmeta_row){
            if( $postmeta_row->key_name == '_order_status' || $postmeta_row->key_name == '_order_total' || $postmeta_row->key_name == '_final_order_total' || $postmeta_row->key_name == '_order_currency' ){
            $order_postmeta[$postmeta_row->key_name] = $postmeta_row->key_value;
            }
          }
        }

        $get_sub_order = get_vendor_sub_order_by_order_id($order['id']);
        $order_postmeta['_sub_order'] = array();

        if(count( $get_sub_order ) > 0){
          foreach($get_sub_order as $sub_order){
            $sub_order_postmeta = array();
            $get_postmeta_by_sub_order_id = PostExtra::where(['post_id' => $sub_order['parent_id']])->get();

            if($get_postmeta_by_sub_order_id->count() > 0){
              $sub_order_date_format = new Carbon( $sub_order['created_at']);

              $sub_order_postmeta['_post_id']    = $sub_order['id'];
              $sub_order_postmeta['_order_date'] = $sub_order_date_format->toDayDateTimeString();


              foreach($get_postmeta_by_sub_order_id as $sub_order_postmeta_row){
                if( $sub_order_postmeta_row->key_name == '_order_status' || $sub_order_postmeta_row->key_name == '_order_total' || $sub_order_postmeta_row->key_name == '_final_order_total' || $sub_order_postmeta_row->key_name == '_order_currency' ){
                $sub_order_postmeta[$sub_order_postmeta_row->key_name] = $sub_order_postmeta_row->key_value;
                }
              }
            }
            array_push($order_postmeta['_sub_order'], $sub_order_postmeta);
          }
        }

        array_push($order_data, $order_postmeta);
      }
    }
    return $order_data;
  }

   /**
   *
   * Get order download history
   *
   * @param order_id
   * @return array
   */
  public function getOrderDownloadHistory( $order_id){
    $order_data = array();
    $get_order_data = DB::table('download_extras')
                      ->select('file_name', 'file_url', DB::raw('count(*) as total'))
                      ->where('order_id', $order_id)
                      ->groupBy('file_name', 'file_url')
                      ->get()->toArray();


    if(count($get_order_data) > 0){
      $order_data = $get_order_data;
    }

    return $order_data;
  }

  /**
   *
   * Update order status
   *
   * @param order id
   * @return void
   */
  public function updateOrderStatus($order_id){
    if( Request::isMethod('post') && Session::token() == Request::Input('_token')){
      $environment = App::environment();
      $email_options = get_emails_option_data();

      $data = array(
                    'key_value' => Request::Input('change_order_status')
      );

      if( PostExtra::where(['post_id' => $order_id, 'key_name' => '_order_status'])->update( $data )){
        $get_email = get_customer_order_billing_shipping_info( $order_id );



        if($environment === 'production' && $email_options['cancelled_order']['enable_disable'] == true && Request::Input('change_order_status') == 'cancelled'){

          $this->classGetFunction->sendCustomMail( array('source' => 'cancelled_order', 'email' => $get_email['_billing_email'], 'order_id' => $order_id) );
        }
        elseif($environment === 'production' && $email_options['processed_order']['enable_disable'] == true && Request::Input('change_order_status') == 'processing'){
          $this->classGetFunction->sendCustomMail( array('source' => 'processed_order', 'email' => $get_email['_billing_email'], 'order_id' => $order_id) );
        }
        elseif($environment === 'production' && $email_options['completed_order']['enable_disable'] == true && Request::Input('change_order_status') == 'completed'){
          $this->classGetFunction->sendCustomMail( array('source' => 'completed_order', 'email' => $get_email['_billing_email'], 'order_id' => $order_id) );
        }

        if(isset($get_email['_billing_phone']) && Request::Input('change_order_status') == 'processing' ){

          // $url="http://ceyone.co.in/user/account/my-orders";
          $var= "Dashboard";
           $message="Your Order ID ".$order_id." of Purchased items is confirmed! You can check your order status from ".$var.". Team Ceyone.";
            $template_id=1207162702634135570;
            $mob=$get_email['_billing_phone'];

            $this->classCommonFunction->send_sms($mob,$message, $template_id);

        }
         return redirect()->back();
      }
    }
  }

  /**
   *
   * Redirect to order invoice
   *
   * @param null
   * @return void
   */
  public function redirectOrderInvoice( $params ){
    $order_id = 0;
    $get_post = Post::where(['id' => $params, 'post_type' => 'shop_order'])->first();


    if(!empty($get_post) && $get_post->parent_id > 0){
      $order_id = $get_post->parent_id;
    }
    else{
      $order_id = $params;
    }

    $get_post_by_order_id     = Post::where(['id' => $params])->first();
    $get_postmeta_by_order_id = PostExtra::where(['post_id' => $order_id])->get();
    $get_orders_items         = OrdersItem::where(['order_id' => $params])->first();

    if($get_post_by_order_id->count() > 0 && $get_postmeta_by_order_id ->count() > 0 && $get_orders_items->count() >0){
      $order_date_format = new Carbon( $get_post_by_order_id->created_at);

      $order_data_by_id = get_customer_order_billing_shipping_info( $order_id );
      $order_data_by_id['_order_id']    = $get_post_by_order_id->id;
      $order_data_by_id['_order_date']  = $order_date_format->toDayDateTimeString();

      foreach($get_postmeta_by_order_id as $postmeta_row_data){
        if($postmeta_row_data->key_name === '_order_shipping_method'){
          $order_data_by_id[$postmeta_row_data->key_name] = $this->classCommonFunction->get_shipping_label($postmeta_row_data->key_value);
        }
        elseif($postmeta_row_data->key_name == '_customer_user'){
          $user_data = unserialize($postmeta_row_data->key_value);
          if($user_data['user_mode'] == 'guest'){
            $order_data_by_id['_member']  = array('name' => 'Guest', 'url' => '');
          }
          elseif($user_data['user_mode'] == 'login'){
            $user_details_by_id = get_user_details($user_data['user_id']);
            $order_data_by_id['_member']  = array('name' => $user_details_by_id['user_display_name'], 'url' => $user_details_by_id['user_photo_url']);
          }
        }
        elseif($postmeta_row_data->key_name == '_order_currency' || $postmeta_row_data->key_name == '_customer_ip_address' || $postmeta_row_data->key_name == '_customer_user_agent' || $postmeta_row_data->key_name == '_order_shipping_cost' || $postmeta_row_data->key_name == '_order_shipping_method' || $postmeta_row_data->key_name == '_payment_method' || $postmeta_row_data->key_name == '_payment_method_title' || $postmeta_row_data->key_name == '_order_tax' || $postmeta_row_data->key_name == '_order_total' || $postmeta_row_data->key_name == '_order_notes' || $postmeta_row_data->key_name == '_order_status' || $postmeta_row_data->key_name == '_order_discount' || $postmeta_row_data->key_name == '_order_coupon_code' || $postmeta_row_data->key_name == '_is_order_coupon_applyed' || $postmeta_row_data->key_name == '_final_order_shipping_cost' || $postmeta_row_data->key_name == '_final_order_tax' || $postmeta_row_data->key_name == '_final_order_total' || $postmeta_row_data->key_name == '_final_order_discount'){
          $order_data_by_id[$postmeta_row_data->key_name] = $postmeta_row_data->key_value;
        }
      }

      $order_data_by_id['_ordered_items']  = json_decode( $get_orders_items->order_data, TRUE );
    }

    return view('pages.admin.invoice.invoice', array('order_data_by_id' => $order_data_by_id));
  }
  public function OrderInvoiceEmail($params){
    $order_id = 0;
    $get_post = Post::where(['id' => $params, 'post_type' => 'shop_order'])->first();


    if(!empty($get_post) && $get_post->parent_id > 0){
      $order_id = $get_post->parent_id;
    }
    else{
      $order_id = $params;
    }

    $get_post_by_order_id     = Post::where(['id' => $params])->first();
    $get_postmeta_by_order_id = PostExtra::where(['post_id' => $order_id])->get();
    $get_orders_items         = OrdersItem::where(['order_id' => $params])->first();

    if($get_post_by_order_id->count() > 0 && $get_postmeta_by_order_id ->count() > 0 && $get_orders_items->count() >0){
      $order_date_format = new Carbon( $get_post_by_order_id->created_at);

      $order_data_by_id = get_customer_order_billing_shipping_info( $order_id );
      $order_data_by_id['_order_id']    = $get_post_by_order_id->id;
      $order_data_by_id['_order_date']  = $order_date_format->toDayDateTimeString();

      foreach($get_postmeta_by_order_id as $postmeta_row_data){
        if($postmeta_row_data->key_name === '_order_shipping_method'){
          $order_data_by_id[$postmeta_row_data->key_name] = $this->classCommonFunction->get_shipping_label($postmeta_row_data->key_value);
        }
        elseif($postmeta_row_data->key_name == '_customer_user'){
          $user_data = unserialize($postmeta_row_data->key_value);
          if($user_data['user_mode'] == 'guest'){
            $order_data_by_id['_member']  = array('name' => 'Guest', 'url' => '');
          }
          elseif($user_data['user_mode'] == 'login'){
            $user_details_by_id = get_user_details($user_data['user_id']);
            $order_data_by_id['_member']  = array('name' => $user_details_by_id['user_display_name'], 'url' => $user_details_by_id['user_photo_url']);
          }
        }
        elseif($postmeta_row_data->key_name == '_order_currency' || $postmeta_row_data->key_name == '_customer_ip_address' || $postmeta_row_data->key_name == '_customer_user_agent' || $postmeta_row_data->key_name == '_order_shipping_cost' || $postmeta_row_data->key_name == '_order_shipping_method' || $postmeta_row_data->key_name == '_payment_method' || $postmeta_row_data->key_name == '_payment_method_title' || $postmeta_row_data->key_name == '_order_tax' || $postmeta_row_data->key_name == '_order_total' || $postmeta_row_data->key_name == '_order_notes' || $postmeta_row_data->key_name == '_order_status' || $postmeta_row_data->key_name == '_order_discount' || $postmeta_row_data->key_name == '_order_coupon_code' || $postmeta_row_data->key_name == '_is_order_coupon_applyed' || $postmeta_row_data->key_name == '_final_order_shipping_cost' || $postmeta_row_data->key_name == '_final_order_tax' || $postmeta_row_data->key_name == '_final_order_total' || $postmeta_row_data->key_name == '_final_order_discount'){
          $order_data_by_id[$postmeta_row_data->key_name] = $postmeta_row_data->key_value;
        }
      }

      $order_data_by_id['_ordered_items']  = json_decode( $get_orders_items->order_data, TRUE );
    }
    $mail = Mail::to($order_data_by_id['_billing_email'])->send(new OrderMail($order_data_by_id));
      return back();
  }
}
