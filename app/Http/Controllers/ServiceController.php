<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Service;

class ServiceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->currentUser->UserPermission->modif_service)
            return redirect('settings/restriction');

        $clients = Client::all();
        $services = Service::all();
        $data = [
            'clients'=>$clients,
            'services'=>$services
        ];

        return view('service.services')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->currentUser->UserPermission->modif_service)
            return redirect('settings/restriction');

        $clients = Client::all();
        // $typeServices = TypeService::all();

        $data = [
            'clients'=>$clients,
            // 'typeServices'=>$typeServices
        ];

        return view('service.create-service')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->currentUser->UserPermission->modif_service)
            return redirect('settings/restriction');

        $this->validate($request,[
            'titre' =>'required|unique_with:services,id_client',
            ]);

        $service = new Service;

        $data = $request->all();

        $service->fill($data)->save();

        flash('Service '.$service->titre.' créé avec succès!')->success();
        return redirect('services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->currentUser->UserPermission->modif_service)
            return redirect('settings/restriction');

         $service = Service::find($id);
        if(!$service)
            abort(404);

        $data = [
            'service'=>$service
        ];


        return view('service.show-service')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->currentUser->UserPermission->modif_service)
            return redirect('settings/restriction');

        $service = Service::find($id);
        if(!$service)
            abort(404);
        $clients = Client::all();
        // $typeServices = TypeService::all();

        $data = [
            'clients'=>$clients,
            // 'typeServices'=>$typeServices,
            'service'=>$service
        ];

        return view('service.edit-service')->with($data);
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
        if(!$this->currentUser->UserPermission->modif_service)
            return redirect('settings/restriction');

        $this->validate($request,[
            'titre' =>'required|unique_with:services,id_client,'.$id,
            ]);

        $service = Service::find($id);

        $data = $request->all();
        $service->fill($data)->save();

        flash('Service '.$service->titre.' mis à jour avec succès!')->success();
        return redirect('services/'.$service->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->currentUser->UserPermission->modif_service)
            return redirect('settings/restriction');

        $service = Service::find($id);
        if(!$service)
            abort(404);

        $service->delete();
        flash('Service '.$service->titre.' a été supprimé avec succès!')->success();
        return redirect('services');
    }


    //AJAX FUNCTIONS
    
    public function getServicesByIdClient()
    {
        if(!$this->currentUser->UserPermission->modif_service)
            return redirect('settings/restriction');
        
        $id_client = $_GET['id_client'];

        $services = Service::where('id_client',$id_client)->orderBy('titre')->get();


        return view('service.partial.services-list')->with('services',$services);
    }
}
