<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Reference;
use App\Parc;
use App\InfoUser;
use App\Service;

class SearchController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        
        $datas = [
            'clients'=>$clients
        ];

        return view('search.searchs')->with($datas);
    }

   public function find()
   {
       $idClient = $_GET['idClient'];
       $keyword = $_GET['keyword'];

       $references = Reference::search($keyword)->where('id_client',$idClient)->get();
       $parcs = Parc::search($keyword)->where('id_client',$idClient)->get();
       $infoUsers = InfoUser::search($keyword)->where('id_client',$idClient)->get();
       $services = Service::search($keyword)->where('id_client',$idClient)->get();


       $zero = true;

       if($references->count()>0 || $parcs->count()>0 || 
        $infoUsers->count()>0 || $services->count()>0)
       {
            $zero = false;
       }

       $data = [
        'zero'=>$zero,
        'references'=>$references,
        'parcs'=>$parcs,
        'infoUsers'=>$infoUsers,
        'services'=>$services
       ];

       return view('search.partial.search-list')->with($data);
   }
}
