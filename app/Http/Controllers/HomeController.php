<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function certificado() 
    {
        $headers = [
            'X-Consumer-Key' => 'M4hDAfNkQijWdn8166O1qSd34QFlbrnO',
            'X-Consumer-Secret' => 'bAIg88WKWx8o6pesWHS6HTXGCFtxELsmmsgEHtWhIJYGwBma',
            'X-Access-Token' => '2011-aL6I0LvKVKrdsuqYXfyfy4QoDSpbCjkYBbH8YZUUUqp7Mk8D',
            'X-Access-Token-Secret' => 'isDDxhlLfDqBaKhxqD2TFVRiq2pjT517bUZZVMmsJEyZuYjZ',
        ];

        $certificadoA1 = json_decode(Http::withHeaders($headers)->accept('application/json')->get('https://webmaniabr.com/api/1/nfe/certificado/'));

        return view('validade', compact('certificadoA1'));
    }

    public function status() 
    {
        $headers = [
            'X-Consumer-Key' => 'M4hDAfNkQijWdn8166O1qSd34QFlbrnO',
            'X-Consumer-Secret' => 'bAIg88WKWx8o6pesWHS6HTXGCFtxELsmmsgEHtWhIJYGwBma',
            'X-Access-Token' => '2011-aL6I0LvKVKrdsuqYXfyfy4QoDSpbCjkYBbH8YZUUUqp7Mk8D',
            'X-Access-Token-Secret' => 'isDDxhlLfDqBaKhxqD2TFVRiq2pjT517bUZZVMmsJEyZuYjZ',
        ];

        $status = json_decode(Http::withHeaders($headers)->accept('application/json')->get('https://webmaniabr.com/api/1/nfe/sefaz/'));

        return view('status', compact('status'));
    }
}
