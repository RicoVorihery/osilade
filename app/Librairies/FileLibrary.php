<?php

namespace App\Librairies;
use Config;
use Storage;
use File;

class FileLibrary
{
	
	public function uploadFile($request,$fileName,$refClient)
	{
		if($request->hasFile($fileName) && $request->file($fileName)->isValid())
        {
            $file = $request->file($fileName);
            $name = $file->getClientOriginalName();
            $size = $file->getSize();

            $path = $file->storeAs($refClient,$name);
            
            return $name;
        }
        else
        	return null;
	}

    public function deleteFile($reference,$number)
    {
        $file_dir = Config::get('files.file_dir');
        $full_path = $file_dir.$reference->client->ref_client.'/';

        $file = null;
        switch ($number) {
            case '01':
                $file = $reference->file01;
                $reference->file01 = null;
                break;
            case '02':
                $file = $reference->file02;
                $reference->file02 = null;
                break;
            case '03':
                $file = $reference->file03;
                $reference->file03 = null;
                break;
            case '04':
                $file = $reference->file04;
                $reference->file04 = null;
                break;

            default:
                break;
        }

        if(file_exists($full_path.$file)){
            return File::delete($full_path.$file);        
        }
        else
            return false;
    }
}