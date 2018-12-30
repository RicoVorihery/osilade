<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Reference;
use Validator;
use File;
use Config;
use App\Librairies\FileLibrary;
use Storage;


class ReferenceController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $clients = Client::all();
        $references = Reference::all();
        $data = [
            'clients'=>$clients,
            'references'=>$references
        ];

        return view('reference.references')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $clients = Client::all();
        $data = [
            'clients'=>$clients
        ];

        return view('reference.create-reference')->with($data);

    }

    /**
     * Store a newly created resource in storage VIA AJAX
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $this->validate($request,[
            'id_client'=>'required',
            'titre'=>'required|unique_with:references,id_client',
            'reference'=>'required',
            'file01' => 'mimes:pdf,docx,xlsx,doc,xls,txt|max:5120',
            'file02' => 'mimes:pdf,docx,xlsx,doc,xls,txt|max:5120',
            'file03' => 'mimes:pdf,docx,xlsx,doc,xls,txt|max:5120',
            'file04' => 'mimes:pdf,docx,xlsx,doc,xls,txt|max:5120',
        ]);

        // $client = Client::find($request->id_client);

        $reference = new Reference;

        $reference->id_client = $request->id_client;
        $reference->titre = $request->titre;
        $reference->reference = $request->reference;

        $fileLibrary = new FileLibrary;
        $file01 = $fileLibrary->uploadFile($request,'file01',$reference->client->ref_client);
        $file02 = $fileLibrary->uploadFile($request,'file02',$reference->client->ref_client);
        $file03 = $fileLibrary->uploadFile($request,'file03',$reference->client->ref_client);
        $file04 = $fileLibrary->uploadFile($request,'file04',$reference->client->ref_client);

        $reference->file01 = $file01;
        $reference->file02 = $file02;
        $reference->file03 = $file03;
        $reference->file04 = $file04;

        $reference->save();

        flash('Référence '.$reference->titre.' créé avec succès!')->success();
        return redirect('/references');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $reference = Reference::find($id);
        if(!$reference)
            abort(404);

        $data = [
            'reference'=>$reference
        ];


        return view('reference.show-reference')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $reference = Reference::find($id);
        if(!$reference)
            abort(404);

        $clients = Client::all();
        
        $data = [
            'clients'=>$clients,
            'reference'=>$reference
        ];

        return view('reference.edit-reference')->with($data);
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
         if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $this->validate($request,[
            'id_client'=>'required',
            'titre'=>'required|unique_with:references,id_client,'.$id,
            'reference'=>'required',
            'file01' => 'mimes:pdf,docx,xlsx,doc,xls,txt|max:5120',
            'file02' => 'mimes:pdf,docx,xlsx,doc,xls,txt|max:5120',
            'file03' => 'mimes:pdf,docx,xlsx,doc,xls,txt|max:5120',
            'file04' => 'mimes:pdf,docx,xlsx,doc,xls,txt|max:5120',
        ]);

        

        // $client = Client::find($request->id_client);

        $reference = Reference::find($id);

        $reference->id_client = $request->id_client;
        $reference->titre = $request->titre;
        $reference->reference = $request->reference;

        $fileLibrary = new FileLibrary;

        $file01 = $fileLibrary->uploadFile($request,'file01',$reference->client->ref_client);
        $file02 = $fileLibrary->uploadFile($request,'file02',$reference->client->ref_client);
        $file03 = $fileLibrary->uploadFile($request,'file03',$reference->client->ref_client);
        $file04 = $fileLibrary->uploadFile($request,'file04',$reference->client->ref_client);

        if($file01!=null)
            $reference->file01 = $file01;
        if($file02!=null)
            $reference->file02 = $file02;
        if($file03!=null)
            $reference->file03 = $file03;
        if($file04!=null)
            $reference->file04 = $file04;

        $reference->save();

        flash('Référence '.$reference->titre.' mise à jour avec succès!')->success();
        return redirect('/references');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $reference = Reference::find($id);
        if(!$reference)
            abort(404);
        $fileLibrary = new FileLibrary;

        $fileLibrary->deleteFile($reference,"01");
        $fileLibrary->deleteFile($reference,"02");
        $fileLibrary->deleteFile($reference,"03");
        $fileLibrary->deleteFile($reference,"04");

        $reference->delete();
        flash('La Référence '.$reference->titre.' a été supprimée avec succès!')->success();
        return redirect('references');
    }

        /**
     *
     * AJAX FUNCTIONS
     *
     */
    public function getReferencesByIdClient()
    {
         if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $id_client = $_GET['id_client'];

        $references = Reference::where('id_client',$id_client)->orderBy('titre')->get();


        return view('reference.partial.references-list')->with('references',$references);
    }

    public function getReferenceById()
    {
         if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $id = $_GET['id'];
        $reference = Reference::find($id);

        return view('reference.partial.reference-dtl')->with('reference',$reference);
    }


    public function deleteReferenceFile()
    {
         if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');

        $id = $_GET['id'];
        $file =  $_GET['file'];
        $number = $_GET['number'];

        $reference = Reference::find($id);
        $fileLibrary = new FileLibrary;

        $resp = $fileLibrary->deleteFile($reference,$number);

        if($resp)
            $reference->save();

        return response()->json($resp);
    }



    public function storeAjax(Request $request)
    {
         if(!$this->currentUser->UserPermission->modif_reference)
            return redirect('settings/restriction');
        
        $validation = Validator::make($request->all(), [
            'id_client'=>'required',
            'titre'=>'required|unique_with:references,id_client',
            'reference'=>'required',
            'file01' => 'mimes:pdf,docx,xlsx,doc,xls,txt|max:5120',
        ]);
        $reference = new Reference;

        if($validation->fails())
        {
            return response()->json([
                'message'=>$validation->errors()->all(),
                'class_name' =>'alert-danger',
                'reference' =>$reference,
                'ok'=>'ko'
            ]);
        }
        else
        {
            // $client = Client::find($request->id_client);

            $reference->id_client = $request->id_client;
            $reference->titre = $request->titre;
            $reference->reference = $request->reference;

            $fileLibrary = new FileLibrary;
            $file01 = $fileLibrary->uploadFile($request,'file01',$reference->client->ref_client);
            $file02 = $fileLibrary->uploadFile($request,'file02',$reference->client->ref_client);
            $file03 = $fileLibrary->uploadFile($request,'file03',$reference->client->ref_client);
            $file04 = $fileLibrary->uploadFile($request,'file04',$reference->client->ref_client);

            $reference->file01 = $file01;
            $reference->file02 = $file02;
            $reference->file03 = $file03;
            $reference->file04 = $file04;

            $reference->save();

            return response()->json([
                    'message' =>'Référence créé avec succès',
                    'class_name'=>'alert-success',
                    'reference'=>$reference,
                    'ok'=>'ok'
                ]);
        }
       
    }
}
