<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeService;

class TypeServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeServices = TypeService::all();
        $datas = [
            'typeServices'=>$typeServices
        ];

        return view('settings.type-service.type-services')->with($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.type-service.create-type-service');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'titre' =>'required|unique:type_services',
            ]);

        $typeService = new TypeService;

        $data = $request->all();
        $typeService->fill($data)->save();

        flash('Type Service '.$typeService->titre.' créé avec succès!')->success();
        return redirect('parametres/type-services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeService = TypeService::find($id);
        if(!$typeService)
            abort(404);

        return view('settings.type-service.show-type-service')
            ->with('typeService',$typeService);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeService = TypeService::find($id);
        if(!$typeService)
            abort(404);

        return view('settings.type-service.edit-type-service')
            ->with('typeService',$typeService);
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
        $this->validate($request,[
            'titre' =>'required|unique_with:type_services,'.$id,
            ]);

        $typeService = TypeService::find($id);

        $data = $request->all();
        $typeService->fill($data)->save();

        flash('Type Service '.$typeService->titre.' mis à jour avec succès!')->success();
        return redirect('parametres/type-services/'.$typeService->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeService = TypeService::find($id);
        if(!$typeService)
            abort(404);

        $typeService->delete();
        flash('Type Service '.$typeService->titre.' a été supprimé avec succès!')->success();
        return redirect('parametres/type-services');
    }
}
