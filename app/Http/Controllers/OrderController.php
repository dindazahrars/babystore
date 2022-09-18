<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
Use App\Order;
Use App\Product;
use Validator;

class OrderController extends Controller
{
    public function _contruct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $order = Order::with('product')->latest()->paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword)
        {
            $order = Order::where('name','LIKE',"%$filterKeyword%")->paginate(1);
        }
        return view('order.index', compact('order'));
    }//end method

    public function create()
    {
        $product = Product::all();
        return view('order.create', compact('product'));
    }//end method

    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'id'=>'required',
            'total'=>'required|max:255',
            'harga'=>'required|max:20',

        ]);
        if($validasi->fails())
        {
            return redirect()->route('order.create')->withInput()->withErrors($validasi);
        }

        Order::create($data);
        //toast('berhasil di tambah', 'success');
        return redirect()->route('order.index');
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
        $order = Order::findOrFail($idorder);
        return view('order.edit',compact('order'));
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
        'total'=>'required|max:255',
        'harga'=>'required|max:20',
        ]);
        if($validasi->fails())
        {
            return redirect()->route('order.create',[$idorder])->withErrors($validasi);
        }

          $order->update($data);
          return redirect()->route('order.index');
       }
}

?>
