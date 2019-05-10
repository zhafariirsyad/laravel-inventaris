<?php

namespace App\Http\Controllers;

use App\BorrowDetail;
use App\Borrow;
use App\Item;
use Carbon\Carbon;
use App\BrokenItem;
use Illuminate\Http\Request;

class BorrowDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $cek = BorrowDetail::where(['borrow_id' => $request->borrow_id, 'item_id' => $request->item_id]);
        $this->validate($request,[
            'item_id' => 'required',
            'borrow_id' => 'required',
            'total' => 'required|numeric|min:1|max:9999',
        ]);
        $item = Item::find($request->item_id);

        if ($cek->count() > 0) {
            $cek->update(['total'=> $cek->first()->total + $request->total]);

            $item->update([
                'total' => $item->total - $request->total
            ]);
            return back();
        } else {
            if ($item->total < $request->total) {
                return back()->with('message','Total pinjam kelebihan');
            } else {
                BorrowDetail::create($request->all());   
                $item->update([
                    'total' => $item->total - $request->total
                ]);
            }   
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function show($borrow)
    {
        return view('pages.borrow.return',[
            'borrow' => Borrow::find($borrow),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(BorrowDetail $borrowDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$borrow)
    {
        $old_borrow = Borrow::find($borrow);

        for($i=0;$i < count($request->total_broken);$i++)
        {
            $item = Item::find($request->id_item[$i]);
            if ($request->total[$i] < $request->total_broken[$i]) {
                return back()->with('message','Barang Rusaknya Kelebihan');
            }
            $total = $request->total[$i] - $request->total_broken[$i];
            $item->update([
                'total' => $item->total + $total
            ]);
            if ($request->total_broken[$i] > 0) {
                BrokenItem::create([
                    'item_id' => $request->id_item[$i],
                    'total' => $request->total_broken[$i],
                    'borrow_id' => $old_borrow->id,
                    'broken_date' => Carbon::now(),
                ]);
            }            
            
            $old_borrow->update(['status'=>'returned']);
        }
        return redirect()->route('borrow.index')->with('message','Success Mengembalikan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BorrowDetail  $borrowDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(BorrowDetail $borrowDetail)
    {
        $item = $borrowDetail->item;
        $total = $borrowDetail->total;

        $item->update([
            'total' => $item->total + $total
        ]);

        $borrowDetail->delete();

        return back();
    }
}
