<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Validator;
use Storange;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $product = Product::paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword)
        {
            $product = Product::where('name','LIKE',"%$filterKeyword%")->paginate(1);
        }
        return view('product.index', compact('product'));
    }//end method

    public function create()
    {

        return view('product.create');
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
            return redirect()->route('product.create')->withInput()->withErrors($validasi);
        }
        $foto = $request->file('foto');
        $extention = $foto->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
             $namafoto = "foto/".date('YmdHis').".".$extention;
             $upload_path = 'uploads/foto';
             $request->file('foto')->move($upload_path,$namafoto );
             $data['foto'] = $namafoto;

        Product::create($data);

        return redirect()->route('product.index');
            }
    }//end method

    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();
        return redirect()->route('product.index');
    }//end method


    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show',compact('product'));
    }//end method


    public function edit($id)
    {

        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
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
        $product = Product::findOrFail($id);
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
            return redirect()->route('product.edit',[$id])->withErrors($validasi);
        }

if($request->hasFile('foto')) {
    if($request->file('foto')->isValid())
    {

        Storage::disk('upload')->delete($product->id);
        $foto = $request->file('foto');
        $extention = $foto->getClientOriginalExtension();
        $namafoto = "foto/".date('YmdHis').".".$extention;
        $upload_path = 'uploads/foto';
        $request->file('foto')->move($upload_path,$namafoto );
        $data['foto'] = $namafoto;
       }
    }

        $product->update($data);
        // alert()->success('Berhasil di edit','success');
        return redirect()->route('product.index');



}
}
?>
