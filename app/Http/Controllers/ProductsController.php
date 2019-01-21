<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($instock = false)
    {
        if ($instock) {
            $products = Product::orderBy('title', 'asc')
                                ->where('inventory_count', '>', 0)
                                ->paginate(10);
        } else {
            $products = Product::orderBy('title', 'asc')->paginate(10);
        }

        $title = $instock ? 'Books In Stock' : 'Browse all books';
        $data = [
            'title' => $title,
            'products' => $products,
            'viewing' => count($products),
            'total' => $products->total()
        ];

        return view('pages.listing')->with($data);
    }

    /**
     * Display a listing of the cart resource
     *
     * @return \Illuminate\Http\Response
     */
    public function cart()
    {
        return view('pages.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('pages.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Add a product to the cart by storing item in a session.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {
            // Redirect Failure
            return redirect()->back()->with('failure', 'Issue specifying the product requested.');
        }

        $cart = session()->get('cart');

        // If cart is empty, this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    'name' => $product->title,
                    'quantity' => 1,
                    'price' => $product->price,
                    'photo' => $product->img_src,
                    'total' => $product->inventory_count
                ]
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // If cart not empty, check if product exists to increment the quantity
        if (isset($cart[$id])) {
            if ($cart[$id]['quantity'] === $cart[$id]['total']) {
                return redirect()->back()->with('failure', 'You have reached the inventory limit.');
            }

            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // If cart not empty, and item does not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            'name' => $product->title,
            'quantity' => 1,
            'price' => $product->price,
            'photo' => $product->img_src,
            'total' => $product->inventory_count
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Update the specified resource in cart session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function updateCart(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]['quantity'] = $request->quantity;

            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from cart session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function removeFromCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $cart = session()->get('cart');
        if ($cart) {
            foreach ($cart as $id => $data) {
                $product = Product::find($id);
                $product->inventory_count -= $data['quantity'];
                $product->save();
            }
        }

        $request->session()->flush();
        return view('pages.thankyou');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
