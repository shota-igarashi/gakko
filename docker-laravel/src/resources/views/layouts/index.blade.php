@extends('layouts.app')
@section('content')
<div class="container-fluid justify-content-center row center-block px-0 mx-0 bg-white">
  @include('layouts.sidebar')

    <div class="col-10 px-5 pt-5">
      <div class="ml-0 mb-4 clearfix">
        <p class="h4 fw-500 float-left">募集学科</p>
        <div class="btn-group float-right btn-group-sm" role="group" aria-label="基本のボタングループ">
          <button type="button" class="px-3 bg-light btn page-link text-dark d-inline-block">すべて</button>
          <button type="button" class="px-3 bg-light btn page-link text-dark d-inline-block">公開中</button>
          <button type="button" class="px-3 bg-light btn page-link text-dark d-inline-block">下書き</button>
        </div>
        <div class="float-right">
          <a href="{{ route('department.create') }}" class="btn btn-primary btn-sm mr-2">+ 学科募集を作成する</a>
        </div>
      </div>
        <div class="">
            <div class="card">
                <div class="card-body p-0">

                  <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead>
                              <tr class="bg-light text-center border-bottom-1">
                                  <th class="border-top-0 border-left-0 fw-400 small">タイトル</th>
                                  <th class="border-top-0 border-left-0 fw-400 small">学部</th>
                                  <th class="border-top-0 border-left-0 fw-400 small">学科</th>
                                  <th class="border-top-0 border-left-0 fw-400 small">ステータス</th>
                                  <th class="border-top-0 border-left-0 fw-400 small">観覧者数</th>
                                  <th class="border-top-0 border-left-0 border-right-0 fw-400 small">ブックマークされた数</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach ($departments as $department)
                          <tr>
                           <td>
                             <p>{{ $department->title }}</p>
                             <div class="h6">
                               <a href="">募集を表示</a><span class="d-inline-block pl-1">|</span>
                                   @csrf
                                   @method('DELETE')
                                   <input type="submit" name="" value="削除">
                               </form>
                             </div>
                           </td>
                               <td>
                                 <p>{{ $department->created_at }}</p>
                                 <p>{{ $department->updated_at }}</p>
                               </td>
                               <td>{{ $department->title }}</td>
                               <td>{{ $department->message }}</td>
                               <td>{{ $department->name }}</td>
                               <td></td>
                           </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
