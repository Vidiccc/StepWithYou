<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use DB;
use App\Models\Cart;
use Session;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function index()
    {
        // $cart = session('Cart');
        $products = Products::all();
        return view('cart.index', compact('products')); 
    }

    public function AddCart(Request $req, $id){
        $products = DB::table('products')->where('id', $id)->first();
        if($products != null){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart();
            $newCart->init($oldCart);
            $newCart->AddCart($products, $id);

            $req->session()->put('Cart', $newCart);
            // dd(Session('Cart'));
            // dd($newCart);
            Log::info('Cart data:', ['cart' => $newCart]);
            return redirect()->route('cart');
        }
        // dd(Session('Cart'));
        return view('cart.index', compact('newCart'));
        
    }

}
