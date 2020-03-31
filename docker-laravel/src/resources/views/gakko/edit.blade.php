@extends('layouts.app')
@section('content')
<div class="container-fluid justify-content-left row center-block pr-0 mr-0 bg-white">
  @include('layouts.sidebar')

    <div class="col-7 px-5 py-5">
      <p class="h4 fw-500 mb-3">学校基本情報の編集</p>

      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
      	<button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
      </div>
      @endif

      <div class="">
        <div class="card">
          <div class="card-header text-center fw-500">
            学校情報を登録してください
          </div>
        <div class="card-body p-5">
          <form action="/gakko/edit" method="POST">
              @csrf
              @method('PUT')
              <p class="h5 border-bottom border-primary pb-2">学校基本情報</p>
              <div class="form-group">
                <label for="school_name" class="w-100 col-form-label text-md-left fw-500"><span class="badge badge-danger mr-1 pb-1">必須</span>学校名</label>
                <div class="w-100">
                  <input id="school_name" type="text" class="form-control-sg form-control" name="school_name" value="{{ $gakko->school_name }}" required>
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>


              <div class="row">
                <div class="form-group col">
                  <label for="school_category" class="w-100 col-form-label text-md-left fw-500"><span class="badge badge-danger mr-1 pb-1">必須</span>学校区分（私立・公立・専門・短大）</label>
                  <div class="">
                    <select id="school_category" name="school_category" class="form-control form-control-sg" required>
                      <option value="国公立大学" @if ($gakko->school_category=='国立大学') selected @endif>国公立大学</option>
                      <option value="私立大学" @if ($gakko->school_category=='私立大学') selected @endif>私立大学</option>
                      <option value="短期大学" @if ($gakko->school_category=='短期大学') selected @endif>短期大学</option>
                      <option value="専門学校" @if ($gakko->school_category=='専門学校') selected @endif>専門学校</option>
                    </select>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <div class="form-group col">
                  <label for="area" class="w-100 col-form-label text-md-left fw-500"><span class="badge badge-danger mr-1 pb-1">必須</span>地域（都道府県）</label>
                  <div class="">
                    <select id="area" name="area" class="form-control form-control-sg" required>
                      <option value="北海道" @if ($gakko->area=='北海道') selected @endif>北海道</option>
                      <option value="青森県" @if ($gakko->area=='青森県') selected @endif>青森県</option>
                      <option value="岩手県" @if ($gakko->area=='岩手県') selected @endif>岩手県</option>
                      <option value="宮城県" @if ($gakko->area=='宮城県') selected @endif>宮城県</option>
                      <option value="秋田県" @if ($gakko->area=='秋田県') selected @endif>秋田県</option>
                      <option value="山形県" @if ($gakko->area=='山形県') selected @endif>山形県</option>
                      <option value="福島県" @if ($gakko->area=='福島県') selected @endif>福島県</option>
                      <option value="茨城県" @if ($gakko->area=='茨城県') selected @endif>茨城県</option>
                      <option value="栃木県" @if ($gakko->area=='栃木県') selected @endif>栃木県</option>
                      <option value="群馬県" @if ($gakko->area=='群馬県') selected @endif>群馬県</option>
                      <option value="埼玉県" @if ($gakko->area=='埼玉県') selected @endif>埼玉県</option>
                      <option value="千葉県" @if ($gakko->area=='千葉県') selected @endif>千葉県</option>
                      <option value="東京都" @if ($gakko->area=='東京都') selected @endif>東京都</option>
                      <option value="神奈川県" @if ($gakko->area=='神奈川県') selected @endif>神奈川県</option>
                      <option value="新潟県" @if ($gakko->area=='新潟県') selected @endif>新潟県</option>
                      <option value="富山県" @if ($gakko->area=='富山県') selected @endif>富山県</option>
                      <option value="石川県" @if ($gakko->area=='石川県') selected @endif>石川県</option>
                      <option value="福井県" @if ($gakko->area=='福井県') selected @endif>福井県</option>
                      <option value="山梨県" @if ($gakko->area=='山梨県') selected @endif>山梨県</option>
                      <option value="長野県" @if ($gakko->area=='長野県') selected @endif>長野県</option>
                      <option value="岐阜県" @if ($gakko->area=='岐阜県') selected @endif>岐阜県</option>
                      <option value="静岡県" @if ($gakko->area=='静岡県') selected @endif>静岡県</option>
                      <option value="愛知県" @if ($gakko->area=='愛知県') selected @endif>愛知県</option>
                      <option value="三重県" @if ($gakko->area=='三重県') selected @endif>三重県</option>
                      <option value="滋賀県" @if ($gakko->area=='滋賀県') selected @endif>滋賀県</option>
                      <option value="京都府" @if ($gakko->area=='京都府') selected @endif>京都府</option>
                      <option value="大阪府" @if ($gakko->area=='大阪府') selected @endif>大阪府</option>
                      <option value="兵庫県" @if ($gakko->area=='兵庫県') selected @endif>兵庫県</option>
                      <option value="奈良県" @if ($gakko->area=='奈良県') selected @endif>奈良県</option>
                      <option value="和歌山県" @if ($gakko->area=='和歌山県') selected @endif>和歌山県</option>
                      <option value="鳥取県" @if ($gakko->area=='鳥取県') selected @endif>鳥取県</option>
                      <option value="島根県" @if ($gakko->area=='島根県') selected @endif>島根県</option>
                      <option value="岡山県" @if ($gakko->area=='岡山県') selected @endif>岡山県</option>
                      <option value="広島県" @if ($gakko->area=='広島県') selected @endif>広島県</option>
                      <option value="山口県" @if ($gakko->area=='山口県') selected @endif>山口県</option>
                      <option value="徳島県" @if ($gakko->area=='徳島県') selected @endif>徳島県</option>
                      <option value="香川県" @if ($gakko->area=='香川県') selected @endif>香川県</option>
                      <option value="愛媛県" @if ($gakko->area=='愛媛県') selected @endif>愛媛県</option>
                      <option value="高知県" @if ($gakko->area=='高知県') selected @endif>高知県</option>
                      <option value="福岡県" @if ($gakko->area=='福岡県') selected @endif>福岡県</option>
                      <option value="佐賀県" @if ($gakko->area=='佐賀県') selected @endif>佐賀県</option>
                      <option value="長崎県" @if ($gakko->area=='長崎県') selected @endif>長崎県</option>
                      <option value="熊本県" @if ($gakko->area=='熊本県') selected @endif>熊本県</option>
                      <option value="大分県" @if ($gakko->area=='大分県') selected @endif>大分県</option>
                      <option value="宮崎県" @if ($gakko->area=='宮崎県') selected @endif>宮崎県</option>
                      <option value="鹿児島県" @if ($gakko->area=='鹿児島県') selected @endif>鹿児島県</option>
                      <option value="沖縄県" @if ($gakko->area=='沖縄県') selected @endif>沖縄県</option>
                    </select>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="area_detail" class="w-100 col-form-label text-md-left fw-500">住所</label>
                <div class="w-100">
                  <input id="area_detail" type="text" class="form-control-sg form-control" name="area_detail" value="{{ $gakko->area_detail }}">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group">
                  <label for="url" class="w-100 col-form-label text-md-left fw-500">ホームページURL</label>
                  <div class="w-100">
                    <input id="url" type="text" class="form-control-sg form-control" name="url" value="{{ $gakko->url }}">
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
              </div>

              <div class="form-group">
                  <label for="contact" class="w-100 col-form-label text-md-left fw-500">お問合せ窓口</label>
                  <div class="w-100">
                    <textarea id="contact" style="height:100px;" type="textarea" class="form-control-sg form-control" name="contact">{{ $gakko->contact }}</textarea>
                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
              </div>

              <p class="mt-5 h5 border-bottom border-primary py-2">SNSアカウント</p>
              <div class="row">
                <div class="form-group col">
                  <label for="facebook" class="w-100 col-form-label text-md-left fw-500">facebook（URL）</label>
                  <input id="facebook" type="text" class="form-control-sg form-control" name="facebook" value="{{ $gakko->facebook }}">
                </div>
                <div class="form-group col">
                  <label for="instagram" class="w-100 col-form-label text-md-left fw-500">instagram</label>
                  <input id="instagram" type="text" class="form-control-sg form-control" name="instagram" value="{{ $gakko->instagram }}">
                </div>
              </div>
              <div class="row">
                <div class="form-group col">
                  <label for="twitter" class="w-100 col-form-label text-md-left fw-500">twitter</label>
                  <input id="twitter" type="text" class="form-control-sg form-control" name="twitter" value="{{ $gakko->twitter }}">
                </div>
                <div class="form-group col">
                  <label for="line" class="w-100 col-form-label text-md-left fw-500">LINE</label>
                  <input id="line" type="text" class="form-control-sg form-control" name="line" value="{{ $gakko->line }}">
                </div>
              </div>

              <div class="form-group mb-0">
                <button type="submit" name="submit" style="width:300px;" class="mt-3 d-block mx-auto btn btn-primary p-3" style="letter-spacing:1px;">更新する</button>
              </div>
          </form>
        </div>
      </div>
    </div>
</div>
@endsection
