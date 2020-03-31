<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Homeを表示
    public function getHome(){
      $title = 'ホーム';
      return view('home')->with('title', $title);
    }

    // 学科ページ
    public function getDepartment(){
      $title = '学部学科';
      return view('department')->with('title', $title);
    }

    // 学科投稿ページ
    public function getDepartmentpost(){
      $title = '学部学科の投稿・編集';
      return view('departmentpost')->with('title', $title);
    }
}
