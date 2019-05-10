<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\BrokenItem;
use Illuminate\Http\Request;

class BrokenItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.broken_item.index',[
            'data' => BrokenItem::where('total','>',0)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrokenItem  $brokenItem
     * @return \Illuminate\Http\Response
     */
    public function show(BrokenItem $brokenItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrokenItem  $brokenItem
     * @return \Illuminate\Http\Response
     */
    public function edit(BrokenItem $brokenItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrokenItem  $brokenItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrokenItem $brokenItem)
    {
        $item = $brokenItem->item;
        $total = $brokenItem->total;

        $brokenItem->update([
            'fix_date'=>Carbon::now()
        ]);

        $item->update([
            'total' => $item->total + $total
        ]); 


        return back()->with('message','Sukses Memperbaiki');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrokenItem  $brokenItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrokenItem $brokenItem)
    {
        //
    }
}
