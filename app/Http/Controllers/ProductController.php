<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductDetail;

class ProductController extends Controller
{
    protected $user;
 
    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->user
            ->products()
            ->get();
    }

    public function index_detail()
    {
        $product_detail = ProductDetail::get();
        return response()->json([
            'data' => $product_detail
        ], Response::HTTP_OK);
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
        //Validate data
        $data = $request->only('name');
        $validator = Validator::make($data, [
            'name' => 'required|string'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new product
        $product = $this->user->products()->create([
            'name' => $request->name
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductDetail:: where('product_id',$id)->get();
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product not found.'
            ], 400);
        }
    
        return $product;
    }

    public function show_detail($id)
    {
        $product = ProductDetail:: where('id',$id)->get();
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, product not found.'
            ], 400);
        }
    
        return $product;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //Validate data
        $data = $request->only('name');
        $validator = Validator::make($data, [
            'name' => 'required|string'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, update product
        $product = $product->update([
            'name' => $request->name
        ]);

        //Product updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'Product updated successfully',
            'data' => $product
        ], Response::HTTP_OK);
    }

    public function update_detail(Request $request, $product)
    {
        //Validate data
        $data = $request->only('product_id', 'name', 'description', 'price','quantity','origin');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'origin' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }


        $product_detail = ProductDetail:: where('id', $product)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'origin' => $request->origin,
        ]);

        $product_detail = ProductDetail:: where('id', $product)->get();

        //Product updated, return success response
        return response()->json([
            'success' => true,
            'message' => 'Product Detail updated successfully',
            'data' => $product_detail
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Product deleted successfully'
        ], Response::HTTP_OK);
    }

    public function destroy_detail($product)
    {
        ProductDetail:: where('id',$product)->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Product Detail deleted successfully'
        ], Response::HTTP_OK);
    }

    public function store_detail(Request $request, $product)
    {
        
        
        //Validate data
        $data = $request->only('product_id', 'name', 'description', 'price','quantity','origin');
        $validator = Validator::make($data, [
            'name' => 'required|string',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'origin' => 'required'
        ]);
      

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        $create_detail = ProductDetail::create([
            'product_id' => $product,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'origin' => $request->origin,
        ]);

        //Product created, return success response
        return response()->json([
            'success' => true,
            'message' => 'Product Detail created successfully',
            'data' => $create_detail
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    
   

}