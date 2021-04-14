<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Http\Requests\BannerRequest;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{

	public function index() {
    	return view('banner.index', ['data' => Banner::all()]);
    }

    public function submit(BannerRequest $data) {
    	$banner = new Banner();
    	$banner->fill($data->input());
    	
        $file = $data->file('image');
        $name = $file->getClientOriginalName();
        $uploadDir = 'public/banners/' . $data->position;
        $file->storeAs($uploadDir, $name);
        $banner->path = $uploadDir . '/' . $name;
    	$banner->save();
    	return redirect()->route('bannerIndex');
    }

    public function delete($id) {
    	Banner::where('id', $id)->delete();
    	
    	return redirect()->route('bannerIndex');
    }
}
