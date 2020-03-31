@extends('layouts.app')

@section('content')
<div class="container-fluid">

  <div class="container-fluid mt-4">
      <div class="signup-step">
        <ul class="signup-bar">
          <li class="signup-visited"><span>管理者登録</span></li>
          <li class="signup-current"><span>学校登録</span></li>
          <li class="signup-disabled"><span>完了</span></li>
        </ul>
      </div>
  </div>

  <div class="w-50 mt-5 mx-auto">
    <h3 class="font-weight-bold text-center mb-5" style="letter-spacing:1px;">あと1歩！学校情報を登録しましょう</h3>
    <div class="">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
              学校情報を登録してください
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('gakko.create')}}">
                    @csrf
                    <input type="hidden" name="admin_id" value="{{ Auth::id() }}">
                    <div class="form-group">
                        <label for="name" class="w-100 col-form-label text-md-left font-weight-bold"><span class="badge badge-danger mr-1 pb-1">必須</span>学校名</label>
                        <div class="w-100">
                          <input type="text" class="form-control-lg form-control @error('name') is-invalid @enderror" name="school_name" value="{{ old('school_name') }}" required autofocus>
                        </div>
                    </div>

                    <div class="row">
                      <div class="form-group col">
                          <label for="school_category" class="w-100 col-form-label text-md-left font-weight-bold"><span class="badge badge-danger mr-1 pb-1">必須</span>学校区分</label>
                          <div class="">
                            <select name="school_category" class="form-control form-control-lg" required>
                              <option value="" selected>選択してください</option>
                              <option value="国公立大学">国公立大学</option>
                              <option value="私立大学">私立大学</option>
                              <option value="短期大学">短期大学</option>
                              <option value="専門学校">専門学校</option>
                            </select>
                          </div>
                      </div>

                      <div class="form-group col">
                        <label for="area" class="w-100 col-form-label text-md-left font-weight-bold"><span class="badge badge-danger mr-1 pb-1">必須</span>地域</label>
                        <div class="">
                          <select name="area" class="form-control form-control-lg" required>
                            <option value="" selected>選択してください</option>
                            <option value="北海道">北海道</option>
                            <option value="青森県">青森県</option>
                            <option value="岩手県">岩手県</option>
                            <option value="宮城県">宮城県</option>
                            <option value="秋田県">秋田県</option>
                            <option value="山形県">山形県</option>
                            <option value="福島県">福島県</option>
                            <option value="茨城県">茨城県</option>
                            <option value="栃木県">栃木県</option>
                            <option value="群馬県">群馬県</option>
                            <option value="埼玉県">埼玉県</option>
                            <option value="千葉県">千葉県</option>
                            <option value="東京都">東京都</option>
                            <option value="神奈川県">神奈川県</option>
                            <option value="新潟県">新潟県</option>
                            <option value="富山県">富山県</option>
                            <option value="石川県">石川県</option>
                            <option value="福井県">福井県</option>
                            <option value="山梨県">山梨県</option>
                            <option value="長野県">長野県</option>
                            <option value="岐阜県">岐阜県</option>
                            <option value="静岡県">静岡県</option>
                            <option value="愛知県">愛知県</option>
                            <option value="三重県">三重県</option>
                            <option value="滋賀県">滋賀県</option>
                            <option value="京都府">京都府</option>
                            <option value="大阪府">大阪府</option>
                            <option value="兵庫県">兵庫県</option>
                            <option value="奈良県">奈良県</option>
                            <option value="和歌山県">和歌山県</option>
                            <option value="鳥取県">鳥取県</option>
                            <option value="島根県">島根県</option>
                            <option value="岡山県">岡山県</option>
                            <option value="広島県">広島県</option>
                            <option value="山口県">山口県</option>
                            <option value="徳島県">徳島県</option>
                            <option value="香川県">香川県</option>
                            <option value="愛媛県">愛媛県</option>
                            <option value="高知県">高知県</option>
                            <option value="福岡県">福岡県</option>
                            <option value="佐賀県">佐賀県</option>
                            <option value="長崎県">長崎県</option>
                            <option value="熊本県">熊本県</option>
                            <option value="大分県">大分県</option>
                            <option value="宮崎県">宮崎県</option>
                            <option value="鹿児島県">鹿児島県</option>
                            <option value="沖縄県">沖縄県</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group mt-3">
                      <div class="w-50 mx-auto">
                        <button type="submit" class="btn btn-primary p-3 w-100" style="letter-spacing:1px;">登録する</button>
                      </div>
                    </div>
                </form>
            </div><!-- .card-body -->
        </div><!-- .card -->
        <p class="text-center mt-4 small text-muted">
          <a href="">利用規約</a>と<a href="">プライバシーポリシー</a>をご確認のうえお申し込みください。<br>
          Copyright monomode co.,ltd ALL RIGHTS RESERVED.
        </p>
    </div>
  </div>
</div>
@endsection
