@extends('layouts.adminheader')

@section('content')
<div class="container-fluid">

  <div class="container-fluid mt-4">
      <div class="signup-step">
        <ul class="signup-bar">
          <li class="signup-current"><span>管理者登録</span></li>
          <li class="signup-disabled"><span>学校登録</span></li>
          <li class="signup-disabled"><span>完了</span></li>
        </ul>
      </div>
  </div>

    <div class="w-50 mt-5 mx-auto">
      <h3 class="font-weight-bold text-center mb-3" style="letter-spacing:1px;">モノ進学 学校管理者登録フォーム</h3>
      <p class="text-center mb-4 h6" style="letter-spacing:1px;">さぁ、新しいカタチの広報活動を始めよう！</p>
        <div class="">
            <div class="card">
                <div class="card-header text-center font-weight-bold">
                  管理者情報の登録をしてください
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control-lg form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control-lg form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control-lg form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード（確認）</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control-lg form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100 p-3" style="letter-spacing:1px;">登録する</button>
                            </div>
                        </div>
                    </form>
                </div><!-- .card -->
            </div>
            <p class="text-center mt-4 small text-muted">
              <a href="">利用規約</a>と<a href="">プライバシーポリシー</a>をご確認のうえお申し込みください。<br>
              Copyright monomode co.,ltd ALL RIGHTS RESERVED.
            </p>
        </div>
    </div>
</div>
@endsection
