<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\OrdersItem;

class UserdataController extends Controller
{

    const SERVER_NAME = "103.26.219.202";
    const INSTANCE_NAME = "MSSQLSERVER2012";
    const PORT = 1433;
    const DB_NAME = "SatyajitMLM";
    const DB_USER = "SatyajitMLM";
    const DB_PASS = "g%s3N1c5";

    public function getUserData(Request $request)
    {
		//echo phpinfo();

        if(!$request->has('username') || !$request->has('password')) {
            return response('', 400);
        }
		
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
        $username = $request->input('username');
        $password = $request->input('password');

        $sql = "SELECT md.*,mr.* FROM dbo.Member_Details as md  LEFT JOIN dbo.Member_Registration as mr ON md.Member_Id = mr.Member_Id where mr.User_Name = " . $username . " and mr.Password = " . $password;
        $params = array();
        $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
        $stmt = sqlsrv_query($conn, $sql, $params, $options);

        $row_count = sqlsrv_num_rows($stmt);

        if (!$row_count) {
            return response('', 404);
        } else {
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                print json_encode($row);
            }
        }

        sqlsrv_close($conn);
    }

    public function getOrderData(Request $request)
    {
		$query = OrdersItem::query()->with('post', 'post.distributor', 'post.distributor.roles');
		$query->whereHas('post.distributor.roles', function($q) {
			$q->where('slug', 'vendor');
		});
		if($request->has('start_date') && $request->has('end_date')) {
			$startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date'));
        	$endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'));
			$query->whereBetween('created_at', [$startDate, $endDate]);
		}
  
        $orders = $query->get();
        return response()->json($orders);
    }
}
