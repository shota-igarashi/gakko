@extends('layouts.app')

@section('content')
<div class="container-fluid justify-content-left row center-block px-0 mx-0 bg-white">
  @include('layouts.sidebar')
  <div class="col-7 px-5 pt-5">
      <p class="h4 fw-500 mb-3">募集学科の投稿・編集</p>

      {{-- 投稿完了時にフラッシュメッセージを表示 --}}
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
      	<button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
      @endif


      <form id="department-form" action="{{ route('department.update',$department->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- 学部・学科 -->
        <div id="department-category" class="d-flex justify-content-start align-items-center mb-4 mt-5">
          <p class="f-robot text-black-50 mr-3 mb-0" style="line-height: 50px;"><span class="h1">1</span><span class="h5 pr-1">/</span><span class="h4">5</span></p>
          <p class="h2 fw-700 text-dark" style="letter-spacing:1px;">学部学科の情報をいれましょう</p>
        </div>
        <div class="row">
          <div class="form-group col">
            <label for="department_gakubu" class="w-100 col-form-label text-md-left fw-500">学部を記入</label>
            <div>
              <input type="text" class="bg-light form-control-sg form-control" name="department_gakubu" placeholder="学部名" value="{{ $department->department_gakubu }}">
            </div>
          </div>
          <div class="form-group col">
            <label for="department_gakka" class="w-100 col-form-label text-md-left fw-500">学科を記入</label>
            <input type="text" class="bg-light form-control-sg form-control" name="department_gakka" placeholder="学科名" value="{{ $department->department_gakka }}">
          </div>
        </div>

        <div class="my-5 border"></div>

        <!-- タイトル -->
        <div id="department-title" class="d-flex justify-content-start align-items-center mb-4 mt-5">
          <p class="f-robot text-black-50 mr-3 mb-0" style="line-height: 50px;"><span class="h1 pr-1">2</span><span class="h5 pr-1">/</span><span class="h4">5</span></p>
          <p class="h2 fw-700 text-dark" style="letter-spacing:1px;">募集に魅力的なタイトルをつけて<br>ターゲットに呼びかけよう</p>
        </div>
        <div class="form-group">
          <div class="w-100">
            <input type="text" class="bg-light form-control-sg form-control" name="department_title" value="{{ $department->department_title }}" placeholder="タイトルを記入">
            <p class="text-muted h6 mt-4 font-weight-bold mt-5">例えばこんなタイトル</p>
            <p class="text-muted fw-400 h6 text-dark" style="letter-spacing:1px; line-height:25px;">
              ・デイリーアクティブユーザ100万人のサービスをグロースさせるエンジニア募集<br>
              ・事業の成長をデザインの力で加速させるUX/UIデザイナー探しています<br>
              ・新規サービス立ち上げ！営業スキルを磨いて同世代に差をつけたい学生募集！<br>
            </p>
          </div>
        </div>

        <div class="my-5 border"></div>

        <!-- カバー写真 -->
        <div id="department-cover" class="d-flex justify-content-start align-items-center mb-4 mt-5">
          <p class="f-robot text-black-50 mr-3 mb-0" style="line-height: 50px;"><span class="h1 pr-1">3</span><span class="h5 pr-1">/</span><span class="h4">5</span></p>
          <p class="h2 fw-700 text-dark" style="letter-spacing:1px;">カバー写真で注目を集めよう</p>
        </div>
        <div class="imagePreview"></div>
        <div class="input-group">
          @isset ($department->department_cover)
          <div>
            <img src="{{ asset('/storage/img/'.$department->department_cover) }}">
          </div>
          @endisset
          <input type="file" name="department_cover" class="uploadFile">
        </div>

        <div class="my-5 border"></div>

        <!-- 簡易説明 -->
        <div id="department-info" class="d-flex justify-content-start align-items-center mb-4 mt-5">
          <p class="f-robot text-black-50 mr-3 mb-0" style="line-height: 50px;"><span class="h1 pr-1">4</span><span class="h5 pr-1">/</span><span class="h4">5</span></p>
          <p class="h2 fw-700 text-dark" style="letter-spacing:1px;">簡潔な案内文でターゲットに伝えよう</p>
        </div>
        <div class="form-group">
          <div class="w-100">
            <textarea type="text" class="bg-light form-control-sg form-control" name="department_intro" placeholder="案内文を記入">{{ $department->department_intro }}</textarea>
            <p class="text-muted h6 mt-4 font-weight-bold mt-5">例えば英語英米文学科ならこんな案内文</p>
            <p class="text-muted fw-400 h6 text-dark" style="letter-spacing:1px; line-height:25px;">
              本学科では、「英語」という言語を通じ、主にイギリスとアメリカの文化や文学を学習・研究すると同時に、英語を自在に操るスキルを身につけることで、将来の活躍のフィールドを広げていきます。
            </p>
          </div>
        </div>

        <div class="my-5 border"></div>

        <!-- 自由紹介文 -->
        <div id="department-text" class="d-flex justify-content-start align-items-center mb-4 mt-5">
          <p class="f-robot text-black-50 mr-3 mb-0" style="line-height: 50px;"><span class="h1 pr-1">3</span><span class="h5 pr-1">/</span><span class="h4">5</span></p>
          <p class="h2 fw-700 text-dark" style="letter-spacing:1px;">自由に募集の紹介を書いてみましょう</p>
        </div>
        <div class="ql-wrap department-editor">
          <div id="toolbar" class="d-flex align-items-center rounded-top">
            <div id="toolbar-container">
              <span class="ql-formats">
                <select class="ql-header">
                  <option value="">本文</option>
                  <option value="1">見出し 1</option>
                  <option value="2">見出し 2</option>
                  <option value="3">見出し 3</option>
                  <option value="4">見出し 4</option>
                  <option value="5">見出し 5</option>
                  <option value="6">見出し 6</option>
                </select>
              </span>
              <span class="ql-formats">
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-underline"></button>
                <button class="ql-strike"></button>
              </span>
              <span class="ql-formats">
                <select class="ql-color"></select>
                <select class="ql-background"></select>
              </span>
              <span class="ql-formats">
                <button class="ql-list" value="ordered"></button>
                <button class="ql-list" value="bullet"></button>
                <button class="ql-indent" value="-1"></button>
                <button class="ql-indent" value="+1"></button>
              </span>
              <span class="ql-formats">
                <button class="ql-link"></button>
                <button class="ql-image"></button>
                <button class="ql-video"></button>
              </span>
            </div>
          </div>
          <div id="editor" data-target="#content" class="js-quill-editor department-editor bg-light bborder-top-0 rounded-bottom">{!! $department->department_text !!}</div>
          <input id="content" type="hidden" class="" name="department_text" value="{{ $department->department_text }}">
        </div><!-- //.ql-wrap -->

        <div class="my-5 border"></div>

        <!-- 卒業生の就職先を紹介 -->
        <div id="department-ob" class="d-flex justify-content-start align-items-center mb-4 mt-5">
          <p class="f-robot text-black-50 mr-3 mb-0" style="line-height: 50px;"><span class="h1 pr-1">4</span><span class="h5 pr-1">/</span><span class="h4">5</span></p>
          <p class="h2 fw-700 text-dark" style="letter-spacing:1px;">卒業生の就職先を紹介</p>
        </div>
        <div class="form-group">
          <div class="w-100">
            <textarea type="text" class="bg-light form-control-sg form-control" name="department_ob" placeholder="就職先を記入" rows="7">{{ $department->department_ob }}
            </textarea>
            <p class="text-muted h6 mt-4 font-weight-bold mt-5">例えばこんな感じ</p>
            <p class="text-muted fw-400 h6 text-dark" style="letter-spacing:1px; line-height:25px;">
              ■2017年3月～2019年3月卒業生実績<br>全日本空輸（株）、日本航空（株）、（株）AIRDO、（株）伊藤園、リンナイ（株）、（株）ヤクルト<br>
              2019年3月卒業生就職率98.7％（就職希望者787名、就職決定者777名）
            </p>
          </div>
        </div>
      </form>
  </div><!-- .maincolumn -->

  <!-- 右サイドバー -->
  <section class="col-3 mt-4 department-nav">
    <ul class="list-group shadow border-0 rounded position-fixed">
      <li class="list-group-item border-0">
        <a href="#department-category">学部学科の情報をいれましょう</a>
        <span>学部・学科</span>
      </li>
      <li class="list-group-item border-right-0 border-left-0">
        <a href="#department-title">募集に魅力的なタイトルをつけて<br>ターゲットに呼びかけよう</a>
        <span>募集タイトル</span>
      </li>
      <li class="list-group-item border-right-0 border-left-0">
        <a href="#department-cover">素敵なカバー写真で注目を集めよう</a>
        <span>カバー写真設定</span>
      </li>
      <li class="list-group-item border-right-0 border-left-0">
        <a href="#department-info">簡潔な案内文でターゲットに伝えよう</a>
        <span>学科簡易説明</span>
      </li>
      <li class="list-group-item border-right-0 border-left-0">
        <a href="#department-point">学科の特料をポイントで紹介しよう</a>
        <span>特徴紹介</span>
      </li>
      <li class="list-group-item border-right-0 border-left-0">
        <a href="#department-text">自由に募集の紹介を書いてみましょう</a>
        <span>学科紹介文</span>
      </li>
      <li class="list-group-item border-right-0 border-left-0">
        <a href="#department-ob">卒業生の就職先を紹介</a>
        <span>主な就職先</span>
      </li>
      <li class="bg-light list-group-item border-right-0 border-left-0 border-bottom-0">
        <p class="department-status"><i class="material-icons">meeting_room</i>ステータス：公開中</p>
        <div class="department-date">
          <i class="material-icons">av_timer</i>
          <p>作成：{{ $department->created_at->format('Y年m月d日') }}</p>
          <p>更新：{{ $department->updated_at->format('Y年m月d日') }}</p>
        </div>
        <div class="department-openbtn">
          <button type="button" class="btn btn-outline-secondary ready-btn">下書きとして保存</button>
          <button form="department-form" type="submit" class="btn btn-primary open-btn">更新する</button>
        </div>
      </li>
    </ul>
  </section>

</div><!-- .content -->
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
Quill.prototype.getHtml = function() {
    return this.container.querySelector('.ql-editor').innerHTML
}

$(document).ready(() => {
        $('.js-quill-editor').each((index, e) => {
            const $target  = $($(e).data('target'))
            const editor = new Quill(e, {
                modules: { toolbar: '#toolbar' },
                theme: 'snow'
            });
            editor.on('text-change', (delta) => {
                if (delta) {
                    // Quillエディタ内のHTMLをformに設定する
                    const html = editor.getHtml();
                    $target.val(html)
                }
            })
        })
});
</script>
@endsection
