<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Arr;
Use App\User;
use Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function _contruct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $datas = DB::table('users')
            ->where('level', '=', 'admin')
            ->get();
        $user = User::paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword)
        {
            $user = User::where('name','LIKE',"%$filterKeyword%")->paginate(1);
        }
        return view('user.index', compact('user', 'datas'));
    }//end method

    public function create()
    {

        return view('user.create');
    }//end method

    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'level'=>'required|max:255',
            'password'=>'required|min:8',

        ]);
        if($validasi->fails())
        {
            alert()->error('Error','Errors to add');
            return redirect()->route('user.create')->withInput()->withErrors($validasi);
        }

        $data['password'] = bcrypt($data['password']);
        User::create($data);
        alert()->success('success to add','success');
        return redirect()->route('user.index');
    }//end method

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        alert()->info('Delete','data has been deleted');
        return redirect()->route('user.index');
    }//end method


    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show',compact('user'));
    }//end method


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
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
    $user = User::findOrFail($id);
    $data = $request->all();
    $validasi = Validator::make($data,[
     'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users,email,'.$id,
            'level'=>'required|max:255',
            'password'=>'sometimes|nullable|min:6'
        ]);
        if($validasi->fails())
        {
            alert()->error('Error','Errors to edit');
            return redirect()->route('user.create',[$id])->withErrors($validasi);
        }
        if($request->input('password'))
        {
            $data['password'] = bcrypt($data['password']);
       }
         else
         {
              $data = Arr::except($data,['password']);
         }
          $user->update($data);
             alert()->success('success to edit','success');
          return redirect()->route('user.index');
       }
}

?>
