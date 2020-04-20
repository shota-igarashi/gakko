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
            <img src="{{ asset('/storage/img/'.$department->department_cover) }}" width="100%">
          </div>
          @endisset
          <input type="file" name="department_cover" class="uploadFile">
        </div>
        
        <!-- cropper -->
        <div id="img-cropper-image" class="popup" data-name="image">
          <div class="close-area">
            <p class="fa fa-times">☓</p>
          </div>
          <div class="cropper-image-inner">
            <div class="wrapper"></div>
            <div class="cropper-bar">
              <div class="btn btn-primary">画像を加工する</div>
            </div>
          </div>
        </div>

        <div class="cropper-file" data-name="image">
          <input type="file" id="datafile">
          <label for="datafile">画像を選ぶ</label>
          <!-- プレビューが表示される枠 -->
          <div class="img-pre-wrap">
            <div class="img-preview">
              <img id="image" src="picture.jpg" style="display: block; max-width: 100%;">
            </div>
          </div>
          <input type="hidden" name="image_cropp_width">
          <input type="hidden" name="image_cropp_height">
          <input type="hidden" name="image_cropp_x">
          <input type="hidden" name="image_cropp_y">
        </div>
        <!-- //cropper -->

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
        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
        <script>
        (function($) {
            $(function () {
                var route_prefix = "{{ url(config('lfm.prefix')) }}";
                $('#lfm').filemanager('image', {prefix: route_prefix});
            });
        })(jQuery);
        </script>

        <textarea id="my-editor" name="department_text" class="form-control" value="{{ $department->department_text }}">{!! $department->department_text !!}</textarea>
        <script>
        (function($) {
            $(function () {
                var options = {
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                };
                CKEDITOR.replace('my-editor', options);
                $('textarea.my-editor').ckeditor(options);
            });
        })(jQuery);
        </script>
        
        <!-- <div id="editor" data-target="#content" class="js-quill-editor department-editor bg-light bborder-top-0 rounded-bottom">{!! $department->department_text !!}</div>
          <input id="content" type="hidden" class="" name="department_text" value="{{ $department->department_text }}"> -->

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


<!-- <script>
  $(function (){
    $('.cropper-file').change(function(){
      $('#img-cropper-image').addClass('show').fadeIn();
      $(this).val('');
  });
});
</script> -->

<script>
  $(function () {
    // 「画像を加工する」もしくはモーダルを閉じたことで発火
    // CropperのデータをHTMLに挿入する
    $('[id="img-cropper-image"]').on('click', '.btn,.fa-times', function () {
      $('.popup').fadeOut();
      var imgCropper = $(this).parents('[id="img-cropper-image"]');
      var imageName = imgCropper.data('name');
      var data = imgCropper.find('.wrapper > img').cropper('getData');

      $('input[name="'+ imageName +'_cropp_width"]').val(Math.round(data.width));
      $('input[name="'+ imageName +'_cropp_height"]').val(Math.round(data.height));
      $('input[name="'+ imageName +'_cropp_x"]').val(Math.round(data.x));
      $('input[name="'+ imageName +'_cropp_y"]').val(Math.round(data.y));
      imgCropper.css({'width':'0','height':'0','position':'static'});
    });

    // ファイルがアップロードされたことで発火
    // Cropperを起動する
    $('[id^="datafile"]').on('change', function (e) {
      var file = e.target.files[0],
      reader = new FileReader(),
      previewDiv = $(this).parents('.cropper-file').find(".img-preview"),
      croppDiv = $('#img-cropper-' + $(this).parents('.cropper-file').data('name'));

      // 画像ファイル以外の場合は何もしない
      if(file.type.indexOf("image") < 0){
        return false;
      }
      // check over 2MB
      if (file.size > 2097152) {
        alert('お手数ですが、画像のサイズは2MB以下のものをご用意ください。');
        return;
      }

      img = new Image();
      img.onload = function () {
        // ファイル読み込みが完了した際のイベント登録
        reader.onload = (function(file) {
          return function(e) {
            //既存のプレビューを削除
            previewDiv.empty();
            // .prevewの領域の中にロードした画像を表示するimageタグを追加
            previewDiv.append($('<img>').attr({
              src: e.target.result,
              title: file.name
            })).show();

            croppDiv.css({}).show();

            //既存のcropper用画像を削除
            croppDiv.find('.wrapper').empty();
            // #img-cropperの領域の中にロードした画像を表示するimageタグを追加
            var appendImage = $('<img id="clopImg">').attr({
              src: e.target.result,
              title: file.name
            });
            croppDiv.find('.wrapper').append(appendImage);
            appendImage.ready(function () {
              var image = croppDiv.find('img');
              image.cropper({
                preview: '.img-preview',
                aspectRatio: 3 / 2,
                movable: false,
                cropBoxResizable:false,
                built:function(){
                  $("#clopImg").cropper(
                      "setData",{left:192,top:77.5,width:116,height:145}
                  );
                }
              });
            });
          };
        })(file);
        reader.readAsDataURL(file);
      };
      img.src = (window.URL || window.webkitURL).createObjectURL(file);
    });
  });
</script>

@endsection
