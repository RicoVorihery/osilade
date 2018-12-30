<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->currentUser->UserPermission->modif_client)
            return redirect('settings/restriction');

        $clients = Client::all();
        $datas = [
            'clients'=>$clients
        ];

        return view('client.clients')->with($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if(!$this->currentUser->UserPermission->modif_client)
            return redirect('settings/restriction');
        
        $client = new Client;
        return view('client.create-client');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->currentUser->UserPermission->modif_client)
            return redirect('settings/restriction');

         $this->validate($request,[
            'ref_client' =>'required|unique:clients',
            'nom_societe'=>'required|unique:clients',
            'tel_principal'=>'required'
            ]);

        $client = new Client;

        $data = $request->all();
        $client->fill($data)->save();

        flash('Client '.$client->ref_client.' créé avec succès!')->success();
        return redirect('/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->currentUser->UserPermission->modif_client)
            return redirect('settings/restriction');

        $client = Client::find($id);
        if(!$client)
            abort(404);

        return view('client.show-client')->with('client',$client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->currentUser->UserPermission->modif_client)
            return redirect('settings/restriction');

        $client = Client::find($id);
        if(!$client)
            abort(404);

        return view('client.edit-client')->with('client',$client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$this->currentUser->UserPermission->modif_client)
            return redirect('settings/restriction');

        $this->validate($request,[
            'ref_client' =>'required|unique_with:clients,'.$id,
            'nom_societe'=>'required|unique_with:clients,'.$id,
            'tel_principal'=>'required'
            ]);

        $client = Client::find($id);

        if(!$client)
            abort(404);

        $data = $request->all();

        $client->fill($data)->save();

        flash('Client '.$client->ref_client.' mis à jour avec succès!')->success();

        return redirect('clients/'.$client->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->currentUser->UserPermission->modif_client)
            return redirect('settings/restriction');
        
        $client = Client::find($id);
        if(!$client)
            abort(404);

        $client->delete();
        flash('Client '.$client->ref_client.' a été supprimé avec succès!')->success();
        return redirect('clients');
    }
}
