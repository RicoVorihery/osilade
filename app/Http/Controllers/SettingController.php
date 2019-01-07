<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
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

    public function create()
    {
        if(!$this->currentUser->UserPermission->is_admin)
            return redirect('settings/restriction');

        return view('settings.create-setting');
    }

    public function store(Request $request)
    {
        if(!$this->currentUser->UserPermission->is_admin)
            return redirect('settings/restriction');

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password_visible = $request->password;
        $user->password = Hash::make($request->password);
        $user->save();

        //Créer user permission
        $data = [
            "id_user"=>$user->id,
            "modif_client"=>$request->modif_client,
            "modif_reference"=>$request->modif_reference,
            "modif_parc"=>$request->modif_parc,
            "modif_user"=>$request->modif_user,
            "modif_service"=>$request->modif_service,
            "is_admin"=>$request->is_admin
        ];
        $userPermission = new UserPermission;
        
        $userPermission->fill($data)->save();

        flash('Utilisateur "'.$user->name.'" créé avec succès!')->success();
        return redirect('parametres');
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
        $data = [
            "modif_client"=>$request->modif_client,
            "modif_reference"=>$request->modif_reference,
            "modif_parc"=>$request->modif_parc,
            "modif_user"=>$request->modif_user,
            "modif_service"=>$request->modif_service,
            "is_admin"=>$request->is_admin
        ];

        $userPermission->fill($data)->save();

        $user = User::find($userPermission->id_user);
        $user->name = $request->name;
        $user->username = $request->username;
        
        if($user->password_visible!=$request->password)
        {
            $user->password_visible = $request->password;
            $user->password = Hash::make($request->password);
        }

        $user->save();

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
