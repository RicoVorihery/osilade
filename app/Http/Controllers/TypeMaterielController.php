<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeMateriel;

class TypeMaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeMateriels = TypeMateriel::all();
        $datas = [
            'typeMateriels'=>$typeMateriels
        ];

        return view('settings.type-materiel.type-materiels')->with($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.type-materiel.create-type-materiel');
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
            'titre' =>'required|unique:type_materiels',
            ]);

        $typeMateriel = new TypeMateriel;

        $data = $request->all();
        $typeMateriel->fill($data)->save();

        flash('Type Materiel '.$typeMateriel->titre.' créé avec succès!')->success();
        return redirect('parametres/type-materiels');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeMateriel = TypeMateriel::find($id);
        if(!$typeMateriel)
            abort(404);

        return view('settings.type-materiel.show-type-materiel')
            ->with('typeMateriel',$typeMateriel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeMateriel = TypeMateriel::find($id);
        if(!$typeMateriel)
            abort(404);

        return view('settings.type-materiel.edit-type-materiel')
            ->with('typeMateriel',$typeMateriel);
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
            'titre' =>'required|unique_with:type_materiels,'.$id,
            ]);

        $typeMateriel = TypeMateriel::find($id);

        $data = $request->all();
        $typeMateriel->fill($data)->save();

        flash('Type Materiel '.$typeMateriel->titre.' mis à jour avec succès!')->success();
        return redirect('parametres/type-materiels/'.$typeMateriel->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $typeMateriel = TypeMateriel::find($id);
        if(!$typeMateriel)
            abort(404);

        $typeMateriel->delete();
        flash('Type Materiel '.$typeMateriel->titre.' a été supprimé avec succès!')->success();
        return redirect('parametres/type-materiels');
    }
}
