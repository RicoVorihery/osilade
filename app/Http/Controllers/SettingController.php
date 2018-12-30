<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserPermission;
use Illuminate\Support\Facades\Auth;


class SettingController extends BaseController
{
    public function index()
    {
    	$userPermissions = UserPermission::all();

    	if(!$this->currentUser->UserPermission->is_admin)
    		return redirect('settings/restriction');

    	$data = [
    		'user'=>$this->currentUser,
    		'userPermissions'=>$userPermissions
    	];
    		return view('settings.settings')->with($data);
    }

    public function edit($id)
    {
        if(!$this->currentUser->UserPermission->is_admin)
            return redirect('settings/restriction');

        $userPermission = UserPermission::find($id);

        if(!$userPermission)
            abort(404);

        $data = [
            'userPermission'=>$userPermission
        ];

        return view('settings.edit-setting')->with($data);
    }

    public function update(Request $request, $id)
    {
        if(!$this->currentUser->UserPermission->is_admin)
            return redirect('settings/restriction');

        $userPermission = UserPermission::find($id);
        $data = $request->all();

        $userPermission->fill($data)->save();

        flash('Permission utilisateur "'.$userPermission->user->name.'" mis à jour avec succès!')->success();
        return redirect('parametres');
    }

    public function destroy($id)
    {
        if(!$this->currentUser->UserPermission->is_admin)
            return redirect('settings/restriction');
        
        $userPermission = UserPermission::find($id);

        if(!$userPermission)
            abort(404);
        
        $user = User::find($userPermission->id_user);

        $user->delete();

        flash('Utilisateur '.$user->name.' a été supprimé avec succès!')->success();
        return redirect('parametres');
    }



}