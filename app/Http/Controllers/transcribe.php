<?php

namespace App\Http\Controllers;


use DB;
use Auth;
use File;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Psr7;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class transcribe extends Controller
{
    public function index()
    {


        return view("transcript");
    }
    public function request()
    {


        $ACCESS_TOKEN="02ZZxVfCnYXS2K_faOWpmuPiVUFBELSlLRdolkbSWBIICdhRQukeYZBpx9pMTqVJw-_TBiShVInhNbs2hVtP5omCcv69s"
        ;
        // POST Data
         // URL
         $apiURL = 'https://api.rev.ai/speechtotext/v1/jobs/';

         // POST Data
         $postInput = [
            'media_url' => request("url")
         ];

         // Headers
         $headers = [
            'Authorization'=> 'Bearer 02ZZxVfCnYXS2K_faOWpmuPiVUFBELSlLRdolkbSWBIICdhRQukeYZBpx9pMTqVJw-_TBiShVInhNbs2hVtP5omCcv69s',
            'Content-Type' => 'application/json',



         ];
         $headers1 = [
            'Authorization'=> 'Bearer 02ZZxVfCnYXS2K_faOWpmuPiVUFBELSlLRdolkbSWBIICdhRQukeYZBpx9pMTqVJw-_TBiShVInhNbs2hVtP5omCcv69s',
            'Accept' => 'text/plain',



         ];

         $response = Http::withHeaders($headers)->post($apiURL, $postInput);

         $statusCode = $response->status();
         $responseBody = json_decode($response->getBody(), true);

         echo $statusCode;  // status code

         $id= $responseBody["id"];
         $response1 = Http::withHeaders($headers1)->get($apiURL.$id/'transcript');
         dd($response1);



        }

 }



