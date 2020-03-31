@extends('layouts.app')

@section('content')
<div class="container justify-content-center row center-block">
    <section class="sidebar col-md-3">
      <div>
        <ul class="list-group">
          <li class="list-group-item">
            <a href="/department">募集学科</a>
          </li>
        </ul>
      </div>
    </section>

    <div class="col-md-9">
      <div class="">
        <h1>募集学科</h1>
        <div>
          <a href="/departmentpost">学科募集を作成する</a>
        </div>
      </div>
        <div class="">
            <div class="card">
                <div class="card-header">Dashboards</div>

                <div class="card-body">

                  <div class="table-responsive">
                      <table class="table table-striped">
                          <thead>
                              <tr>
                                  <th>学部</th>
                                  <th>学科</th>
                                  <th>{{ __('Created') }}</th>
                                  <th>{{ __('Updated') }}</th>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach ($posts as $post)
                              <tr>
                                  <td>
                                      <a href="{{ url('posts/'.$post->id) }}">{{ $post->title }}</a>
                                  </td>
                                  <td>{{ $post->body }}</td>
                                  <td>{{ $post->created_at }}</td>
                                  <td>{{ $post->updated_at }}</td>
                               </tr>
                          @endforeach
                          </tbody>
                      </table>
                  </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
