<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeInfo;

class TypeInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeInfos = TypeInfo::all();
        $datas = [
            'typeInfos'=>$typeInfos
        ];

        return view('settings.type-info.type-infos')->with($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.type-info.create-type-info');
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
            'titre' =>'required|unique:type_infos',
            ]);

        $typeInfo = new TypeInfo;

        $data = $request->all();
        $typeInfo->fill($data)->save();

        flash('Type Information '.$typeInfo->titre.' créé avec succès!')->success();
        return redirect('parametres/type-infos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeInfo = TypeInfo::find($id);
        if(!$typeInfo)
            abort(404);

        return view('settings.type-info.show-type-info')
            ->with('typeInfo',$typeInfo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeInfo = TypeInfo::find($id);
        if(!$typeInfo)
            abort(404);

        return view('settings.type-info.edit-type-info')
            ->with('typeInfo',$typeInfo);
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
            'titre' =>'required|unique_with:type_infos,'.$id,
            ]);

        $typeInfo = TypeInfo::find($id);

        $data = $request->all();
        $typeInfo->fill($data)->save();

        flash('Type Information '.$typeInfo->titre.' mis à jour avec succès!')->success();
        return redirect('parametres/type-infos/'.$typeInfo->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeInfo = TypeInfo::find($id);
        if(!$typeInfo)
            abort(404);

        $typeInfo->delete();
        flash('Type Information '.$typeInfo->titre.' a été supprimé avec succès!')->success();
        return redirect('parametres/type-infos');
    }
}
