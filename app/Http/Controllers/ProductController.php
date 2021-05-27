<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $request->validate([
            'supplierID' => 'required|integer'
        ]);

        return Product::where('supplier_id', $request->input("supplierID"))->get();
    }


    // function uploadImg(Request $req)
    // {
    //     return $req->file('sup_img')->store('public/images');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $supplier = Supplier::find($id);
        $this->authorize('create', $supplier);

        $tags = Tag::get();

        $data = [
            'title' => 'Create Product',
            'path' => '/api/product',
            'tags' => $tags,
        ];

        return view('pages.supplier.create_edit_product', $data);
    }



    // public function uploadSubmit(Request $request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'photos' => 'required',
    //     ]);
    //     if ($request->hasFile('photos')) {
    //         $allowedfileExtension = ['pdf', 'jpg', 'png', 'docx'];
    //         $files = $request->file('photos');
    //         foreach ($files as $file) {
    //             $filename = $file->getClientOriginalName();
    //             $extension = $file->getClientOriginalExtension();
    //             $check = in_array($extension, $allowedfileExtension);
    //             //dd($check);
    //             if ($check) {
    //                 $items = Item::create($request->all());
    //                 foreach ($request->photos as $photo) {
    //                     $filename = $photo->store('photos');
    //                     ItemDetail::create([
    //                         'item_id' => $items->id,
    //                         'filename' => $filename
    //                     ]);
    //                 }
    //                 echo "Upload Successfully";
    //             } else {
    //                 echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
    //             }
    //         }
    //     }
    // }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'product_name' => 'required|string',
            'description' => 'required|string',
            'product_stock' => 'required|numeric',
            'product_price' => 'required|numeric',
            'supplierID' => 'required|integer',
            // 'images' => 'required',            // 'sup_img' => '' 
        ]);
        // $request->file('image')->store('public/images');


        // $supplier = Supplier::find($request->supplierID);
        // $this->authorize('create', $supplier);

        $item = Item::create([
            'supplier_id' => $request->supplierID,
            'name' => $request->product_name,
            'price' => $request->product_price,
            'stock' => $request->product_stock,
            'description' => $request->description,
            'active' => true,
            'rating' => 0,
            'is_bundle' => false,
        ]);


        if(is_null($request->tags))
        {
            dd("error here");
            dd($request->tags);
        }
        else
        {
            foreach($request->tags as $tagsValue)
            {
                // dd($tagsValue);
                if( is_null($tagsValue))
                {
                    break;
                }


                $tags = Tag::where('value', $tagsValue)->get();
                // dd($tags);


                if (count($tags) > 0) {                     //if the tagvalue exist 
                    foreach ($tags as $tag) {
                        $item->tags()->attach($tag);          // associate the tag to the item
                    }
                }
                else                                        // if the tagvalue is new
                {
                    $tag = Tag::create([                //create new tag
                        'value' => $tagsValue,   
                    ]);
                    $item->tags()->attach($tag);        // associate the tag to the item
                }
        
            }
        }




        $product = Product::create([
            'id' => $item->id,
            'unit' => $request->product_type,
        ]);


        if ($request->has('images')) {

            // dd($request->file('images'));
            foreach ($request->file('images') as $image) {

                // dd($filename);
                // dd($image);
                //$upload_success = $image->move(storage_path('app/public/banners'), $image->getClientOriginalName());
                $image->store('public/images');

                $filename = $image->hashName();

                $path = "storage/images/";
                $path = $path . $filename;

                // dd($path);
                
                $img = Image::create([
                    'path' => $path
                ]);

                $img->products()->attach($product);
            }
        }

        session()->flash('message','Product created successfully!');


        return redirect(route('create_product'  , ['id' => $request->supplierID]) );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if ($product->isEmpty()) {
            return response('', 404)->header('description', 'Product not found');
        }
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($productId)
    {
        $product = Product::find($productId);

        // $this->authorize('update', $product);

        $data = [
                    'title' => 'Edit Product',
                    'path' => '/api/coupon/' . $product->id,
                    'code' => $product->code,
                    'description' => $product->description,
                    'name' => $product->name,
                    'expiration' => $product->expiration,
                    'amount' => $product->amount,
                    'type' => $product->type,
        ];

        if($product->type === "%"){
            $data['p'] = true;
        }else{
            $data['e'] = true;
        }
        return view('pages.supplier.create_edit_coupon', $data);
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
         
        $collection_coupon = Coupon::where('code', $couponCode)->get();
        
        $this->authorize('update', $collection_coupon->first());
        
        if($collection_coupon->isEmpty()){
            return response('', 404)->header('description','Coupon not found');
        }

       
        $coupon = $collection_coupon->first();

        if($request->has('coupon_name')){
            $coupon->name = $request->input('coupon_name'); 
        }

        if($request->has('coupon_amount')){
            $coupon->amount = $request->input('coupon_amount'); 
        }

        if($request->has('coupon_type')){
            $coupon->type = $request->input('coupon_type'); 
        }

        if($request->has('description')){
            $coupon->description = $request->input('description'); 
        }

        if($request->has('date')){
            $coupon->expiration = $request->input('date'); 
        }
        
        $coupon->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
