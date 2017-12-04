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
    	$this->validate(request(), ['url' => 'required|URL']);
    	$url = request('url');
    	if(str_contains($url, 'tiny.dev')) {
    		return redirect('/')->with(['url' => $url, 'res' => 'This is already a short url']);
    	}
    	
    	$res = url::where('url', $url)->get();
    	if ($res->first()) {
    		return redirect('/')->with('url', 'tiny.dev/'.$res->first()->key);
    	} else {
	    	$key = str_random(8);
    		url::create(['url' => $url, 'key' => $key]);
    		return redirect('/')->with('url', 'tiny.dev/'.$key);
    	}
    }

    public function show(Url $url) {
    	return redirect($url->url);
    }
}
