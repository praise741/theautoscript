<?php

namespace App\Jobs;
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
use Spatie\WebhookClient\ProcessWebhookJob;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WebhookHandler  extends ProcessWebhookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $result= $this -> webhookCall;
        

        $ACCESS_TOKEN="dbd93045435d4484a6f21d533488555d";
        $apiURL = 'https://api.assemblyai.com/v2/transcript';
        $headers = [
            'Authorization'=> $ACCESS_TOKEN,
        ];

        $data= json_decode($this -> webhookCall);
        http_response_code(200);
       $apiURL = 'https://api.assemblyai.com/v2/transcript'.'/'. $data["transcript_id"];



        $response = Http::withHeaders($headers)->get($apiURL);
        return $response;
        dd($response);
       }

    }
