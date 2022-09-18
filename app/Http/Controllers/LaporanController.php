<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Transaksi;
use App\Laporan;
Use App\User;
use Validator;

class LaporanController extends Controller
{
    public function _contruct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $laporan = Laporan::with('user','transaksi')->latest()->paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword)
        {
            $laporan = Laporan::where('name','LIKE',"%$filterKeyword%")->paginate(1);
        }
        return view('laporan.index', compact('laporan'));
    }//end method

    public function create()
    {
        $transaksi = Transaksi::all();
        $user = User::all();
        return view('laporan.create', compact('transaksi','user'));
    }//end method

    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'idt'=>'required',
            'id'=>'required',
            'tgl_laporan'=>'required',
            'total_laporan'=>'required|max:255',

        ]);
        if($validasi->fails())
        {
            return redirect()->route('laporan.create')->withInput()->withErrors($validasi);
        }

        Laporan::create($data);
        //toast('berhasil di tambah', 'success');
        return redirect()->route('laporan.index');
    }//end method

    public function destroy($idt)
    {
        $data = Laporan::findOrFail($idt);
        $data->delete();
        return redirect()->route('laporan.index');
    }//end method


    public function show($idt)
    {
        $laporan = Laporan::findOrFail($idt);
        return view('laporan.show',compact('laporan'));
    }//end method


    public function edit($idt)
    {
        $laporan = Laporan::findOrFail($idt);
        return view('laporan.edit',compact('laporan'));
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
    $laporan = Laporan::findOrFail($idt);
    $data = $request->all();
    $validasi = Validator::make($data,[
        'idt'=>'required',
        'id'=>'required',
        'tgl_laporan'=>'required',
        'total_laporan'=>'required|max:255',
        ]);
        if($validasi->fails())
        {
            return redirect()->route('laporan.create',[$idt])->withErrors($validasi);
        }

          $laporan->update($data);
          return redirect()->route('laporan.index');
       }
}

?>
