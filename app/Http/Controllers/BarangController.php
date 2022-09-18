<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Barang;
use Illuminate\Support\Facades\Storage;
use Validator;
use Storange;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $barang = Barang::paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword)
        {
            $barang = Barang::where('name','LIKE',"%$filterKeyword%")->paginate(1);
        }
        return view('barang.index', compact('barang'));
    }//end method

    public function create()
    {

        return view('barang.create');
    }//end method

    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'nama'=>'required|max:255',
            'foto'=>'required|image|mimes:jpeg,jpg,png|max:2448',
            'brand'=>'required|max:255',
            'desc'=>'required|max:255',
            'stock'=>'required|max:255',
            'harga'=>'required|max:255',

        ]);

        if($validasi->fails())
        {
            return redirect()->route('barang.create')->withInput()->withErrors($validasi);
        }
        $foto = $request->file('foto');
        $extention = $foto->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
             $namafoto = "foto/".date('YmdHis').".".$extention;
             $upload_path = 'uploads/foto';
             $request->file('foto')->move($upload_path,$namafoto );
             $data['foto'] = $namafoto;

        Barang::create($data);

        return redirect()->route('barang.index');
            }
    }//end method

    public function destroy($id)
    {
        $data = Barang::findOrFail($id);
        $data->delete();
        return redirect()->route('barang.index');
    }//end method


    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.show',compact('barang'));
    }//end method


    public function edit($id)
    {

        $barang = Barang::findOrFail($id);
        return view('barang.edit',compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $data = $request->all();
        $validasi = Validator::make($data,[
            'nama'=>'required|max:255',
            'foto'=>'required|image|mimes:jpeg,jpg,png|max:2448',
            'brand'=>'required|max:255',
            'desc'=>'required|max:255',
            'stock'=>'required|max:255',
            'harga'=>'required|max:255',
        ]);
        if($validasi->fails())
        {
            return redirect()->route('barang.edit',[$id])->withErrors($validasi);
        }

if($request->hasFile('foto')) {
    if($request->file('foto')->isValid())
    {

        Storage::disk('upload')->delete($barang->id);
        $foto = $request->file('foto');
        $extention = $foto->getClientOriginalExtension();
        $namafoto = "foto/".date('YmdHis').".".$extention;
        $upload_path = 'uploads/foto';
        $request->file('foto')->move($upload_path,$namafoto );
        $data['foto'] = $namafoto;
       }
    }

        $barang->update($data);
        // alert()->success('Berhasil di edit','success');
        return redirect()->route('barang.index');



}
}
?>
