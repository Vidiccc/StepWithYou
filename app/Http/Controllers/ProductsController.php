<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $products = Products::all();
        return view('products.index', compact('products', 'categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $product = Products::find($id); // Retrieve the user based on the provided ID
        
        $product_category = Category::find($product->categoryID);

        $colors = Stock::select('color')->where('productID', $id)->distinct()->get();

        foreach ($colors as $color) {
            // Retrieve sizes and stock for each color
            $sizesAndStock = Stock::select('size', 'stock')
                ->where('productID', $id)
                ->where('color', $color->color) // Filter by the current color
                ->where('stock', '>', 0)
                ->get();
        
            // Add the color, sizes, and stock data to the colorData array
            $stocks[] = [
                'color' => $color->color,
                'sizesAndStock' => $sizesAndStock,
            ];
        
    
            return view('products.info', compact('product', 'colors', 'product_category', 'stocks'));

        
    }
    return view('products.info', compact('product', 'colors', 'product_category'));
    
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function cart()
    {
        $products = Products::inRandomOrder()->limit(4)->get();
        return view('cart.index', compact('products'));
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart($id)
    {
        $product = Products::findOrFail($id);
          
        $cart = session()->get('cart', []);
  
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "productID" => $id,
                "name" => $product->pname,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->imageURL,
            ];
        }

        // dd($cart);
          
        session()->put('cart', $cart);
        session()->flash('success', 'Added to cart successfully');
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function removeAll(){
        session()->forget('cart');
        $products = Products::inRandomOrder()->limit(4)->get();
        return view('cart.index', compact('products'));
    }
}
