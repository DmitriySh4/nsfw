<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;
use App\Http\Requests\AdvertisementRequest;
use App\Components\FileUploader;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class AdvertisementController extends Controller
{
    public function submit(AdvertisementRequest $data) {
    	$advert = new Advertisement();
    	$advert->order_id = Str::random(10);
    	$advert->fill($data->input());
    	$advert->save();
        $advertisement_id = $advert->id;
        $FileUploader = new FileUploader();
        $FileUploader->save($data, $advertisement_id);
        $price = Category::where('id', $data->category_id)->pluck('price');
        Mail::to($data->email)->send(new SendMail($data->name, $price, $advert->order_id));

    	return view('advertisement.payment', ['data' => $advert]);
    }

    public function create() {
    	return view('advertisement.create', ['data' => Category::all()]);
    }

    public function index() {
    	return view('advertisement.index', ['data' => Advertisement::orderby('active')->get()]);
    }

    public function activate($id) {
    	Advertisement::where('id', $id)->update(['active' => 1]);
    	return redirect()->route('advertisementIndex');
    }

    public function deactivate($id) {
    	Advertisement::where('id', $id)->update(['active' => 0]); 	
    	return redirect()->route('advertisementIndex');
    }

    public function getAdvertisementSingle($id) {
    	return view('advertisement.single', ['advs' => Advertisement::where('id', $id)->get(), 'data' => Category::all()]);
    }
}
