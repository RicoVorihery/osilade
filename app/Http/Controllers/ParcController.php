<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parc;
use App\TypeMateriel;
use App\Client;

class ParcController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->currentUser->UserPermission->modif_parc)
            return redirect('settings/restriction');

        $parcs = Parc::all();
        $clients = Client::all();

        $datas = [
            'parcs'=>$parcs,
            'clients'=>$clients
        ];

        return view('parc.parcs')->with($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->currentUser->UserPermission->modif_parc)
            return redirect('settings/restriction');

        $clients = Client::all();
        $typeMateriels = TypeMateriel::all();

        $data = [
            'clients'=>$clients,
            'typeMateriels'=>$typeMateriels
        ];

        return view('parc.create-parc')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->currentUser->UserPermission->modif_parc)
            return redirect('settings/restriction');

         // $this->validate($request,[
         //    'ref_inventaire' =>'required|unique:parcs',
         //    ]);

        $parc = new Parc;

        $data = $request->all();
        $parc->fill($data)->save();

        flash('Parc '.$parc->ref_inventaire.' créé avec succès!')->success();
        return redirect('parcs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->currentUser->UserPermission->modif_parc)
            return redirect('settings/restriction');

        $parc = Parc::find($id);
        if(!$parc)
            abort(404);

        $data = [
            'parc'=>$parc
        ];


        return view('parc.show-parc')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->currentUser->UserPermission->modif_parc)
            return redirect('settings/restriction');

        $parc = Parc::find($id);
        if(!$parc)
            abort(404);
        $clients = Client::all();
        $typeMateriels = TypeMateriel::all();

        $data = [
            'clients'=>$clients,
            'typeMateriels'=>$typeMateriels,
            'parc'=>$parc
        ];

        return view('parc.edit-parc')->with($data);
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
        if(!$this->currentUser->UserPermission->modif_parc)
            return redirect('settings/restriction');

        // $this->validate($request,[
        //     'ref_inventaire' =>'required|unique_with:parcs,'.$id,
        //     ]);

        $parc = Parc::find($id);

        $data = $request->all();
        $parc->fill($data)->save();

        flash('Parc '.$parc->ref_inventaire.' mis à jour avec succès!')->success();
        return redirect('parcs/'.$parc->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->currentUser->UserPermission->modif_parc)
            return redirect('settings/restriction');

        $parc = Parc::find($id);
        if(!$parc)
            abort(404);

        $parc->delete();
        flash('Parc '.$parc->ref_inventaire.' a été supprimé avec succès!')->success();
        return redirect('parcs');
    }


    //AJAX FUNC

    public function getParcsByIdClient()
    {
        if(!$this->currentUser->UserPermission->modif_parc)
            return redirect('settings/restriction');
        
    	$id_client = $_GET['id_client'];

        $parcs = Parc::where('id_client',$id_client)->orderBy('ref_inventaire')->get();


        return view('parc.partial.parcs-list')->with('parcs',$parcs);
    }
}
