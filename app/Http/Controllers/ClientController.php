<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $this->authorize('viewAny');
        return Client::all();
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

        $request->validate([
            'client.email' => 'required|string',
            'client.password' => 'required|string',
            'client.name' => 'required|string',
            'client.image_id' => 'required|integer'
        ]);

        $user = User::create([
            'email' => $request->input('client.email'),
            'password' => $request->input('client.password')
        ]);

        Client::create([
            'id' => $user->id,
            'name' => $request->input('client.name'),
            'image_id' => $request->input('client.image_id')
        ]);

        return response('', 204)->header('description', 'Successfully created the client');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Client $client)
    {
        $this->authorize('view', $client);

        $history_items = [];
        $favorite_items = [];
        $periodic_items = [];

        // Retrieve History and Periodic
        foreach ($client->purchases as $purchase){
            if ($purchase->type == 'SingleBuy'){
                foreach ($purchase->items as $item){
                    $this->check_product($item, $history_items);
                }
            } else {
                foreach ($purchase->items as $item){
                    $product = $item->product();
                    if($product){
                        $item->unit = $product->unit;
                        $item->image = $product->images[0]->path;
                    } else {
                        $item->unit = "Un";
                        $item->image = "storage/products/bundle.jpg";
                    }
                    $item->purchase_type = $purchase->type;
                    array_push($periodic_items, $item);
                }
            }
        }

        // Retrieve Favorite items
        foreach ($client->item_favorites as $fav){
            $this->check_product($fav, $favorite_items);
        }

        // dd($client, $history_items, $favorite_items, $periodic_items);

        return view('pages.client.client_profile',
            ['client' => $client,
             'history' => $history_items,
             'favorites' => $favorite_items,
             'periodic' => $periodic_items
            ]);
    }

    private function check_product(Item $item, &$arr){
        $product = $item->product();
        if($product){
            $item->unit = $product->unit;
            $item->image = $product->images[0]->path;
        } else {
            $item->unit = "Un";
            $item->image = "storage/products/bundle.jpg";
        }
        array_push($arr, $item);
    }

    public function get_info(Client $client)
    {
        $this->authorize('view', $client);
        $user = User::find($client->id);
        return array_merge($client->toArray(), $user->toArray());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   // Testado!


        $request->validate([
            'client.email' => 'string',
            'client.password' => 'string',
            'client.name' => 'string',
            'client.image_id' => 'integer'
        ]);

        if(!is_numeric($id)){
            return response('', 404)->header('description','The client was not found');
        }

        $client = Client::where('id', '=', $id)->get();
        $this->authorize('viewAny', $client);

        $user = User::where('id', '=', $id)->get();


        if($client->isEmpty()){
            return response('', 404)->header('description','The client was not found');
        }

        $client_data = $client->first();
        $user_data = $user->first();

        if($request->has('client.email')){
            $user_data->email = $request->input('client.email');
        }

        if($request->has('client.password')){
            $user_data->password = $request->input('client.password');
        }

        if($request->has('client.name')){
            $client_data->name = $request->input('client.name');
        }

        if($request->has('client.image_id')){
            $client_data->image_id = $request->input('client.image_id');
        }

        $user_data->save();
        $client_data->save();

        return response('', 204,)->header('description', 'Successfully updated client information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {   // FIXME postgres não deixa apagar <- let's see se ainda está assim
        $this->authorize('view', $client);

        $user = User::find($client->id);

        if(is_null($client) || is_null($user)){
            return response('', 404,)->header('description', 'Client not found');
        }
        $client->delete();
        $user-> delete();

        return redirect()->route('homepage');
    }
}
