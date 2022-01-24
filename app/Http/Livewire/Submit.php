<?php

namespace App\Http\Livewire;

use DB;
use Auth;

use Illuminate\Support\Facades\Storage;
use File;
use GuzzleHttp\Psr7;
use GuzzleHttp\Promise;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithFileUploads;

class Submit extends Component
{

    use WithFileUploads;
    public $audio;

public $value;
    public $url;
    public $ids;
    public $status;
    public $request;
    public function submit(){


$filename = $this -> audio  -> store('file', 'public');




         $ACCESS_TOKEN="dbd93045435d4484a6f21d533488555d"
        ;
        // POST Data
         // URL
         $apiURL = 'https://api.assemblyai.com/v2/transcript';
         $apiURL1='https://api.assemblyai.com/v2/upload';
         // POST Data
         $audio =$this -> audio;
         $postInput1 = [

        Storage::get('storage/'.$filename)
         ];


         // Headers
         $headers = [
            'Authorization'=> $ACCESS_TOKEN,



         ];
         $photo = fopen('storage/'.$filename, 'r');

         $response1 = Http::withHeaders($headers)-> attach( 'attachment', $photo, 'audio.m4a')->post($apiURL1);

    }

    public function recieve()
    {
        $this -> value = Cache::get('value');
    }








    public function render()
    {

        return view('livewire.submit');
    }
}
