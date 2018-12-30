<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\TypeInfo;
use App\InfoUser;

class InfoUserController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!$this->currentUser->UserPermission->modif_user)
            return redirect('settings/restriction');

        $infoUsers = InfoUser::all();
        $clients = Client::all();

        $datas = [
            'infoUsers'=>$infoUsers,
            'clients'=>$clients
        ];

        return view('info-user.info-users')->with($datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->currentUser->UserPermission->modif_user)
            return redirect('settings/restriction');

        $clients = Client::all();
        $typeInfos = TypeInfo::all();

        $data = [
            'clients'=>$clients,
            'typeInfos'=>$typeInfos
        ];

        return view('info-user.create-info-user')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->currentUser->UserPermission->modif_user)
            return redirect('settings/restriction');

         $this->validate($request,[
            'nom' =>'required',
            ]);

        $infoUser = new InfoUser;

        $data = $request->all();
        $infoUser->fill($data)->save();

        flash('Info utilisateur '.$infoUser->nom.' créé avec succès!')->success();
        return redirect('info-users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$this->currentUser->UserPermission->modif_user)
            return redirect('settings/restriction');

        $infoUser = InfoUser::find($id);
        if(!$infoUser)
            abort(404);

        $data = [
            'infoUser'=>$infoUser
        ];


        return view('info-user.show-info-user')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$this->currentUser->UserPermission->modif_user)
            return redirect('settings/restriction');

        $infoUser = InfoUser::find($id);
        if(!$infoUser)
            abort(404);

        $clients = Client::all();
        $typeInfos = TypeInfo::all();

        $data = [
            'clients'=>$clients,
            'typeInfos'=>$typeInfos,
            'infoUser'=>$infoUser
        ];

        return view('info-user.edit-info-user')->with($data);
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
        if(!$this->currentUser->UserPermission->modif_user)
            return redirect('settings/restriction');

        $this->validate($request,[
            'nom' =>'required',
            ]);

        $infoUser = InfoUser::find($id);

        $data = $request->all();
        $infoUser->fill($data)->save();

        flash('Info utilisateur '.$infoUser->nom.' mis à jour avec succès!')->success();
        return redirect('info-users/'.$infoUser->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$this->currentUser->UserPermission->modif_user)
            return redirect('settings/restriction');

        $infoUser = InfoUser::find($id);
        if(!$infoUser)
            abort(404);

        $infoUser->delete();
        flash('Info utilisateur '.$infoUser->nom.' a été supprimé avec succès!')->success();
        return redirect('info-users');
    }


    //AJAX FUNC

    public function getInfoUsersByIdClient()
    {
        if(!$this->currentUser->UserPermission->modif_user)
            return redirect('settings/restriction');
        
        $id_client = $_GET['id_client'];

        $infoUsers = InfoUser::where('id_client',$id_client)->orderBy('nom')->get();


        return view('info-user.partial.info-users-list')->with('infoUsers',$infoUsers);
    }
}
