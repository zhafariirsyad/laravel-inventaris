<?php

namespace App\Http\Controllers;

use App\Borrow;
use App\BorrowDetail;
use App\Employee;
use App\Item;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('web')->check()) {
            $data = Borrow::latest()->get();
        } else {
            $data = Borrow::withCount('detail_borrow')->where('employee_id',Auth::guard('employee')->user()->id)->latest()->get();
        }

        return view('pages.borrow.index',[
            'data' => $data
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.borrow.create',[
            'employee' => Employee::all(),
            'item'     => Item::all()
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
        $carbon = Carbon::now();
        if(Auth::guard('web')->check()) {
            $data = Borrow::create([
                'borrow_date' => $carbon,
                'return_date' => $carbon->addDays($request->long_borrow),
                'status' => 'uncomplete',
                'employee_id' => $request->employee_id,
                'user_id' => Auth::user()->id,
                'approve' => 1
            ]);
            return redirect()->route('borrow.show',$data->id);
            
        } else {
            $data = Borrow::create([
                'borrow_date' => $carbon,
                'return_date' => $carbon->addDays($request->long_borrow),
                'status' => 'booked',
                'employee_id' => Auth::guard('employee')->user()->id,
                'approve' => 0
            ]);
            return redirect()->route('borrow.index')->with('message','Success');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {

        return view('pages.borrow.next',[
            'borrow' => $borrow,
            'item' => Item::all(),
            'detail' => BorrowDetail::all()

        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        if(Auth::guard('web')->check())
        {
            $borrow->update(['status'=>'borrowed']);
            return redirect()->route('borrow.index')->with('message','Success');
        }
        else
        {
            $borrow->update(['status'=>'booked']);
            return redirect()->route('borrow.index')->with('message','Success');   
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Borrow $borrow)
    {
        if ($request->approve == 1) {
            $borrow->update([
                'user_id' => Auth::user()->id,
                'status' => 'uncomplete'
            ]);
            return back()->with('message','Berhasil Di Approve');
        } else {
            $borrow->delete();
            return back()->with('message','Permintaan Ditolak');
        }   
    }

    public function detail(Borrow $borrow)
    {
        $data = BorrowDetail::where('borrow_id',$borrow->id)->get();

        return view('pages.borrow.detail',compact('data'));
    }
}
