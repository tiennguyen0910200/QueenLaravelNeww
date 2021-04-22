<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class ProductController extends Controller
{
    function detail($id){
        $product = Product::find($id);
        // $cate= ImageCategory::find($imagedetail->category_id);
        // $imagedetail->category_name = $cate->name;
       return response()->json($product);
      }
      function postOrderList(Request $request){
        $product_id = $request->product_id;
        DB::table('list_order')->insert(['product_id'=>$product_id]);
    } 
}
