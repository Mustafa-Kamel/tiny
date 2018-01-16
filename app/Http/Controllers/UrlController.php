<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\url;

class UrlController extends Controller
{
    public function index() {
    	return view('index');
    }

    public function store() {
        $site_root = env('APP_URL', 'http://localhost');
    	$this->validate(request(), ['url' => 'required|URL']);
    	$url = request('url');
    	if(str_contains($url, $site_root)) {
    		return redirect('/')->with(['url' => $url, 'res' => 'This is already a short url']);
    	}
    	
    	$res = url::where('url', $url)->get();
    	if ($res->first()) {
    		return redirect('/')->with('url', $site_root.'/'.$res->first()->key);
    	} else {
	    	$key = str_random(8);
    		url::create(['url' => $url, 'key' => $key]);
    		return redirect('/')->with('url', $site_root.'/'.$key);
    	}
    }

    public function show(Url $url) {
    	return redirect($url->url);
    }
}
