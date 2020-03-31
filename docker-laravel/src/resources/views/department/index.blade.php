@extends('layouts.app')
@section('content')
<div class="container-fluid justify-content-center row center-block px-0 mx-0 bg-white">
  @include('layouts.sidebar')

    <div class="col-10 px-5 pt-5">
      <p class="h4 fw-500 mb-4">募集学科</p>
      <div class="ml-0 mb-2 clearfix">
        <div class="float-left">
          <form id="bulk-delete" method="POST" action="{{ route('department.delete')}}">
            @csrf
            <input type="submit" class="btn-sm bg-light" value="選択した記事を削除">
          </form>
        </div>
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
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr class="bg-light border-bottom-1 text-secondary" style="font-size:12px;">
                          <th class="border-top-0 border-left-0 border-right-0 pr-0"><input id="all" type="checkbox" style="transform:scale(1.3);"></th>
                          <th class="border-top-0 border-left-0 fw-400" style="width:35%">タイトル</th>
                          <th class="border-top-0 border-left-0 fw-400">学部</th>
                          <th class="border-top-0 border-left-0 fw-400">学科</th>
                          <th class="border-top-0 border-left-0 fw-400">ステータス</th>
                          <th class="border-top-0 border-left-0 fw-400" style="width:5%">PV数</th>
                          <th class="border-top-0 border-left-0 border-right-0 fw-400">ブックマークされた数</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($departments as $department)
                      <tr>
                        <td class="border-left-0 border-right-0 pr-0">
                          <input class="list" type="checkbox" name="ids[]" value="{{ $department->id }}" form="bulk-delete" style="transform:scale(1.3);">
                        </td>
                        <td class="border-left-0">
                          @isset ($department->department_cover)
                          <div>
                            <img src="{{ asset('/storage/img/'.$department->department_cover) }}">
                          </div>
                          @endisset
                          <p class="mb-2 fw-600">
                          {{ $department->department_title }}
                          </p>
                         <div class="h6 fw-400 d-flex align-items-center mb-0" style="font-size:13px;">
                           <a href="">募集を表示</a><span class="d-inline-block px-2 text-muted small">|</span>
                           <a href="{{ route('department.edit',$department->id)}}">募集を編集</a><span class="d-inline-block px-2 text-muted small">|</span>
                           <form action="{{ route('department.destroy', $department->id)}}" method="POST">
                               @csrf
                               @method('DELETE')
                               <input class="d-inline btn-sm bg-light py-0" style="font-size:11px;" type="submit" name="" value="削除">
                           </form>
                         </div>
                        </td>
                       <td>
                         <p style="font-size:12px;">{{ $department->department_gakubu}}</p>
                       </td>
                       <td>
                         <p style="font-size:12px;">{{ $department->department_gakka}}</p>
                       </td>
                       <td>
                         <p class="text-secondary small mb-1">作成日：{{ $department->created_at->format('Y年m月d日') }}</p>
                         <p class="text-secondary small mb-0">更新日：{{ $department->updated_at->format('Y年m月d日') }}</p>
                       </td>
                       <td>{{ $department->title }}</td>
                       <td>{{ $department->title }}</td>
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
