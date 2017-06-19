<?php
namespace App\Http\Controllers;
use App\Orders;
use App\OrderItems;
use App\User;
use App\Payments;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    // Searching for user
    public function getuser($id)
    {
        $user=User::where('id',$id)->get();
        return $user;
    }
    //Order relative stuffs
    public function index()
    {
        $order=Orders::whereDate('created_at',date('Y-m-dx'))->get();
        return $order;
    }
    public function show($id)
    {
        $orders=Orders::where('id',$id)->get();
        $orders['items']=OrderItems::where('order_id',$id)->get();
        return $orders;
    }
    public function create(Request $request)
    {
        $input=$request->all();
        $result=Orders::create($input);
        echo $result;

    }
    public function additems(Request $request)
    {
        $input=$request->all();
        $items =$input["items"];
        try{
            foreach($items as $item){
                $item['order_id']=$input["order_id"];
                OrderItems::create($item);
            }
            echo(json_encode(array("status"=>true)));
        }catch(Illuminate\Database\QueryException $e){
            var_dump($e->errorInfo);
        }
    }
    public function updateorder(Request $request)
    {
        $input=$request->all();
        $current=Orders::find($input["order_id"]);
        if(!empty($current)){
            $current->email_id=$input['email'];
            $current->status=$input['status'];
            $current->save();
            echo true;
            return;
        }
        echo false;

    }
    public function cancelorder(Request $request)
    {
        $input=$request->all();
        $current=Orders::find($input["order_id"]);
        if(!empty($current)){
            $current->status="cancelled";
            $current->save();
            echo true;
            return;
        }
        echo false;

    }
    public function payment(Request $request)
    {
        $input=$request->all();
        $result=Payments::create($input);
        echo $result;

    }
    
}
