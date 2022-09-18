<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Transaksi;
Use App\Order;
Use App\User;
use Validator;

class TransaksiController extends Controller
{
    public function _contruct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $transaksi = Transaksi::with('order','user')->latest()->paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword)
        {
            $transaksi = Transaksi::where('name','LIKE',"%$filterKeyword%")->paginate(1);
        }
        return view('transaksi.index', compact('transaksi'));
    }//end method

    public function create()
    {
        $order = Order::all();
        $user = User::all();
        return view('transaksi.create', compact('order','user'));
    }//end method

    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'id'=>'required',
            'idorder'=>'required',
            'status'=>'required|max:255',
            'metode'=>'required|max:20',

        ]);
        if($validasi->fails())
        {
            return redirect()->route('transaksi.create')->withInput()->withErrors($validasi);
        }

        Transaksi::create($data);
        //toast('berhasil di tambah', 'success');
        return redirect()->route('transaksi.index');
    }//end method

    public function destroy($idt)
    {
        $data = Transaksi::findOrFail($idt);
        $data->delete();
        return redirect()->route('transaksi.index');
    }//end method


    public function show($idt)
    {
        $transaksi = Transaksi::findOrFail($idt);
        return view('transaksi.show',compact('transaksi'));
    }//end method


    public function edit($idt)
    {
        $transaksi = Transaksi::findOrFail($idt);
        return view('transaksi.edit',compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idt)
    {
    $transaksi = Transaksi::findOrFail($idt);
    $data = $request->all();
    $validasi = Validator::make($data,[
        'id'=>'required',
        'idorder'=>'required',
        'status'=>'required|max:255',
        'metode'=>'required|max:20',
        ]);
        if($validasi->fails())
        {
            return redirect()->route('transaksi.create',[$idt])->withErrors($validasi);
        }

          $transaksi->update($data);
          return redirect()->route('transaksi.index');
       }
}

?>
