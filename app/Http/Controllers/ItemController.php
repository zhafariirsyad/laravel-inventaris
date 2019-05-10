<?php

namespace App\Http\Controllers;

use App\Type;
use Auth;
use Carbon\Carbon;
use Log;
use App\Room;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.item.index',[
            'data' => Item::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.item.create',[
            'type' => Type::all(),
            'room' => Room::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'type_id' => 'required',
            'room_id' => 'required',
            'total' => 'numeric|required',
            'description' => 'required',
        ]);

        Item::create([
            'name' => $request->name,
            'condition' => "good",
            'description' => $request->description,
            'total' => $request->total,
            'type_id' => $request->type_id,
            'room_id' => $request->room_id,
            'user_id' => Auth::user()->id,
            'register_date' => Carbon::now()
        ]);
        Log::info("Barang telah ditambahkan oleh ". Auth::user()->name);
        return redirect()->route('item.index')->with('message','Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('pages.item.show',[
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('pages.item.edit',[
            'edit' => $item,
            'type' => Type::all(),
            'room' => Room::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request,[
            'name' => 'required',
            'type_id' => 'required',
            'room_id' => 'required',
            'total' => 'numeric|required',
            'description' => 'required',
        ]);

        $data = new Item($request->all());
        $data->register_date = Carbon::now();
        
        $item->update($request->all());;

        return redirect()->route('item.index')->with('message','Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return back()->with('message','Success');
    }
}
