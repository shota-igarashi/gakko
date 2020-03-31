<?php

namespace App\Http\Controllers;

use App\Gakko;
use App\User;
use App\Admin;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Auth;

class GakkoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('gakko.create');
    }
    //新規作成
    public function store(Request $request)
    {
        Gakko::create($request->all());
        $gakko = new Gakko; #追加
        $gakko->user_id = $request->user_id;
        return redirect('/home');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    //編集
    public function edit(User $user)
    {
      $user_id = Auth::id();
      $gakko = Gakko::where('admin_id',$user_id)->first();
      \Log::info($gakko);
      return view('gakko.edit', compact('gakko'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $update = [
          'school_name' => $request->school_name,
          'school_category' => $request->school_category,
          'area' => $request->area,
          'area_detail' => $request->area_detail,
          'logo' => $request->logo,
          'url' => $request->url,
          'contact' => $request->contact,
          'facebook' => $request->facebook,
          'instagram' => $request->instagram,
          'twitter' => $request->twitter,
          'line' => $request->line,
      ];
      $user_id = Auth::id();
      Gakko::where('admin_id',$user_id)->update($update);
      return back()->with('success', '更新されました');
    }

}
