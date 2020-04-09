<?php

namespace App\Http\Controllers;

use App\Department;//モデル名をバックスラッシュの後に入力
use App\User;//モデル名をバックスラッシュの後に入力
use Illuminate\Http\Request;
use Validator;// Validator
use Illuminate\Support\Facades\Auth;
use Encore\Admin\Facades\Admin;
use Illuminate\Support\Facades\Storage;



class DepartmentController extends Controller
{   //一覧表示

    public function index(User $user)
    {
      $user_id = Auth::id();
      $department = Department::where('admin_id',$user_id)->get();
      $department = Department::orderBy('updated_at', 'desc')->get();
      \Log::info($department);
      return view('department.index',[
          'departments' => $department,
      ]);
    }

    public function create()
    {
        return view('department.create');
    }
    //新規作成
    public function store(Request $request)
    {
        Department::create($request->all());
        $department = new Department; #追加
        $department->user_id = $request->user_id;
        return back()->with('success', '投稿完了しました');
    }
    //編集
    public function edit($id)
    {
        $department = Department::find($id);
        return view('department.edit', compact('department'));
    }

    protected function validator(Request $request)
    {
        return Validator::make($request, [
          'department_cover' => 'file|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('department_cover')){
					if ($request->file('department_cover')->isValid()) {
						// $fileName = $request->file->getClientOriginalName();
						// $exists = Storage::disk($this->filesystem)->exists($request->upload_path.'/'.$fileName);
 
            // if ($exists) {
            //     Storage::disk($this->filesystem)->delete($request->upload_path.'/'.$fileName);
						// }
						
						// //   Storage::delete($request->depatment_cover);
						// 	// $files = $department->department_cover;
            //   Storage::delete('public/img/'.'department_cover');
              $path = $request->file('department_cover')->store('public/img/');
              $request->department_cover = basename($path);
              // Department::create(['department_cover' => basename($path)]);
              \Log::info($path);

          } else {
              return redirect()
                  ->back()
                  ->withInput()
                  ->withErrors();
          }
        }
        $update = [
            'department_gakubu' => $request->department_gakubu,
            'department_gakka' => $request->department_gakka,
            'department_title' => $request->department_title,
            'department_intro' => $request->department_intro,
            'department_text' => $request->department_text,
            'department_ob' => $request->department_ob,
            'department_cover' => $request->department_cover,
          ];
        Department::where('id', $id)->update($update);
        return back()->with('success', '更新されました');
    }
    //削除
    public function destroy($id)
    {
        Department::find($id)->delete();
        return back()->with('success', '削除しました');
    }
    //選択一括削除
    public function delete(Request $request)
    {
        \App\Department::destroy($request->ids);
        \Log::info($request);
        return redirect('/department');
    }
    //ファイルアップロード
    // public function upload(Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => [
    //             // 必須
    //             'required',
    //             // アップロードされたファイルであること
    //             'file',
    //             // 画像ファイルであること
    //             'image',
    //             // MIMEタイプを指定
    //             'mimes:jpg,png',
    //         ]
    //     ]);
    //
    //     if ($request->file->isValid([])) {
    //         $path = $request->file->store('public/img');
    //         Department::create(['department_cover' => basename($path)]);
    //         return redirect('/')->with(['success'=> 'ファイルを保存しました']);
    //     } else {
    //         return redirect()
    //             ->back()
    //             ->withInput()
    //             ->withErrors();
    //     }
    // }
}
