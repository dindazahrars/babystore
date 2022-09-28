<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
Use App\Order;
Use App\Barang;
use Validator;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function _contruct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {

        $order = Order::with('barang')->latest()->paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword)
        {
            $order = Order::where('name','LIKE',"%$filterKeyword%")->paginate(1);
        }
        return view('order.index', compact('order'));
    }//end method

    public function create()
    {
        $barang = Barang::all();
        return view('order.create', compact('barang'));
    }//end method

    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'id'=>'required',
            'harga'=>'required|max:255',

        ]);
        if($validasi->fails())
        {
            return redirect()->route('order.create')->withInput()->withErrors($validasi);
            alert()->error('Error','Errors to add');
        }

        Order::create($data);
        toast('berhasil di tambah', 'success');
        return redirect()->route('transaksi.create');
    }//end method

    public function destroy($idorder)
    {
        $data = Order::findOrFail($idorder);
        $data->delete();
        return redirect()->route('order.index');
    }//end method


    public function show($idorder)
    {
        $order = Order::findOrFail($idorder);
        return view('order.show',compact('order'));
    }//end method


    public function edit($idorder)
    {
        $barang = Barang::all();
        $order = Order::findOrFail($idorder);
        return view('order.edit',compact('order','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idorder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idorder)
    {
    $order = Order::findOrFail($idorder);
    $data = $request->all();
    $validasi = Validator::make($data,[
        'id'=>'required',
        'harga'=>'required|max:255',
        ]);
        if($validasi->fails())
        {
            return redirect()->route('order.create',[$idorder])->withErrors($validasi);
            alert()->error('Error','Errors to edit');
        }

          $order->update($data);
          alert()->success('success to edit','success');
          return redirect()->route('order.index');
       }
}

?>
