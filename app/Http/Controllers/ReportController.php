<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Borrow;
use App\BrokenItem;
use App\Item;
use App\Room;

class ReportController extends Controller
{
    public function index()
    {
    	return view('pages.report.index');
    }

    public function create($param)
    {
    	if ($param == "all") {
    		return view('pages.report.load',[
    			'data' => Borrow::all(),
    			'type' => $param
    		]);
    	} elseif($param == "broken") {
    		return view('pages.report.load',[
    			'broken' => BrokenItem::where('total','>',0)->get(),
    			'type' => $param
    		]);
    	}
    	
    }

    public function barang()
    {
    	return view('pages.report.barang',[
    		'item' => Item::all()
    	]);
    }

    public function ruang()
    {
    	return view('pages.report.ruang',[
    		'room' => Room::all()
    	]);
    }

    public function load_ruang(Request $request)
    {
    	$data = Item::where('room_id',$request->room_id)->get();
    	return view('pages.report.load_ruang',compact('data'));
    }
}

