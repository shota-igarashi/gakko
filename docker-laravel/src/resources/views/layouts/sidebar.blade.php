<section class="sidebar col-2 bg-light p-0 border-right vh-100 min-vh-100 mh-100">
  <div class="school-account">
    <span>学校アカウント</span>
    <p>
      <?php $name = \App\Gakko::select('school_name')->get();
        echo $name;
      ?>
    </p>
  </div>

  <div class="sidebar_inner">
    <ul class="list-group list-group-flush">
      <li class="list-group-item pl-0 bg-light">
        <a class="d-flex align-items-center d-inline-block w-100 text-dark py-1" href="/home">
          <i class="material-icons pr-2">home</i>管理画面トップ
        </a>
      </li>
      <li class="list-group-item pl-0 bg-light">
        <a class="d-flex align-items-center d-inline-block w-100 text-dark py-1" href="/home">
          <i class="material-icons pr-2">home</i>フォロワー
        </a>
      </li>
      <li class="list-group-item pl-0 bg-light">
        <a class="d-flex align-items-center d-inline-block w-100 text-dark py-1" href="">
          <i class="material-icons pr-2">school</i>学校紹介
        </a>
      </li>
      <li class="list-group-item pl-0 bg-light">
        <a class="d-flex align-items-center d-inline-block w-100 text-dark py-1" href="{{ route('department.index') }}">
          <i class="material-icons pr-2">domain</i>募集学科
        </a>
      </li>
      <li class="list-group-item pl-0 bg-light">
        <a class="d-flex align-items-center d-inline-block w-100 text-dark py-1" href="">
          <i class="material-icons pr-2">account_circle</i>メンバー紹介
        </a>
      </li>
      <li class="list-group-item pl-0 bg-light">
        <a class="d-flex align-items-center d-inline-block w-100 text-dark py-1" href="">
          <i class="material-icons pr-2">keyboard_voice</i>インタビュー
        </a>
      </li>
      <li class="list-group-item pl-0 bg-light">
        <a class="d-flex align-items-center d-inline-block w-100 text-dark py-1" href="">
          <i class="material-icons pr-2">view_agenda</i>イベント・お知らせ
        </a>
      </li>
      <li class="list-group-item pl-0 bg-light">
        <a class="d-flex align-items-center d-inline-block w-100 text-dark py-1" href="">
          <i class="material-icons pr-2">view_agenda</i>特設ページ
        </a>
      </li>
    </ul>
    <div class="help">
      <a class="d-flex align-items-center" href=""><i class="material-icons pr-3">help</i>ヘルプセンター</a>
    </div>
  </div>
</section>
