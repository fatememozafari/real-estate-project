<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function upload($uploadedFile, $uploadPath)
    {
        $uploadedFileName = $uploadedFile->getClientOriginalName();
        $fileNameToStore = $this->randomToken(10) . time() . '_' . $uploadedFileName;

        $fileUploaded = $uploadedFile->move(public_path($uploadPath), $fileNameToStore);

        if($fileUploaded){
            return $fileNameToStore;
        }
        return null;

    }

    public function randomToken($length = 20)
    {
        $token = "";
        $characters = array_merge(range('A', 'Z'), range('a', 'z'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++){
            $rand = mt_rand(0, $max);
            $token .= $characters[$rand];
        }
        return $token;
    }
}
