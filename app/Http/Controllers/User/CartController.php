<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ListOrder;
use App\Models\Order;


class CartController extends Controller
{

    
    // Show Cart
    function getCart(){
        $cart = ListOrder::all();
        $carts = DB::select("select p.name_product,p.price,p.picture from products as p, list_order as lo where p.id=lo.product_id");
        return json_encode($carts);
    }
    function getTotalProduct(){
        $totalProduct = DB::select("select p.price from products as p, list_order as lo where p.id=lo.product_id");
        return json_encode($totalProduct);
    }
    function getTotalPrice(){
        $totalPrice = DB::select("select sum(p.price) as sumPrice from products as p, list_order as lo where p.id=lo.product_id");
        return $totalPrice;
    }
    public function destroy($id)
	{   
		$listOrder = ListOrder::find($id);
		$listOrder->delete();
		return redirect('cart');

	}
    // Payment
    function postOrder(Request $request, $id){
        $request->validate([
            'user_id' => 'required',
            'vendor_id' => 'required',
            'username' => 'required|string',
            'phone_number' => 'required',
            'address' => 'required|string',
            'order_time' => 'required',
            'quantity_mam' => 'required',
            'note' => 'required|string'
        ]);

        // $order = new Order([
        //     'user_id' => 5,
        //     'vendor_id' => 1,
        //     'username' => $request->username,
        //     'phone_number' => $request->phone_number,
        //     'address' => $request->address,
        //     'order_time' => $request->order_time,
        //     'quantity_mam' => $request->quantity_mam,
        //     'note' => $request->note
        // ]);

        $order = new Order;
        $token = request()->header("Authorization");
		$key ="diu";
        $user_id = JWT::decode($token, $key, array('HS256'));//lay id cuar usser dẫ đang nhap 
        

        $order->user_id = 5;
        $order->vendor_id = 1;
        $order->username = $request->username;
        $order->phone_number = $request->phone_number;
        $order->address = $request->address;
        $order->order_time = $request->order_time;
        $order->quantity_mam = $request->quantity_mam;
        $order->note = $request->note;

        $order->save();

        // $username = $request->username;
        // $phone_number = $request->phone_number;
        // $address = $request->address;
        // $order_time = $request->order_time;
        // $quantity_mam = $request->quantity_mam;
        // $note = $request->note;
        // $vendor_id = 1;
        // $user_id = 7;
        // $key ="diu";
        // $data = JWT::decode($user_id, $key, array('HS256'));
        // $user_id = $data->user_id;

        // DB::table('orders')->insert([
        //     'user_id'=>$user_id, 'vendor_id'=>$vendor_id,'username'=>$username, 'phone_number'=>$phone_number, 'address'=>$address, 
        //     'order_time'=>$order_time, 'quantity_mam'=>$quantity_mam, 'note'=>$note
        // ]);

        return json_encode($order);
    }

    function getOrder(){
        $user_order = Order::latest('created_at')->first();

        return json_encode($user_order);

    }
}
