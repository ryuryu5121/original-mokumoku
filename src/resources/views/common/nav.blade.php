{{-- ナビゲーション --}}
<nav class="navbar navbar-expand-lg navbar-light container items-center">
    <div class="container-fluid d-flex align-items-center justify-content-around">
        <a class="navbar-brand font-sans text-2xl" href="{{ route('event.index') }}">{{ 'もくもく会' }}</a>
        <form class="row" id="search-form" method="GET" action="{{ route('event.index') }}">
          <div class="col-8">
            <input class="form-control mr-sm-2" id="search-input" type="search" name="search" placeholder="キーワードを入力" value="{{ isset($word) ? $word : '' }}">
          </div>
          <div class="col">
            <button class="btn btn-outline-success my-2 my-sm-0 " type="submit">検索</button>
          </div>
        </form>
      <div class="flex justify-content-between">
        @auth
      {{-- ユーザー新規登録・ログイン済みならマイページ、ログアウト表示 --}}
        <button class="inline-flex text-white items-center bg-emerald-500 border-0 py-1 px-3 mx-2 mb-4 focus:outline-none hover:bg-emerald-400 rounded text-base mt-4 md:mt-0">
          <a href="">マイページ</a>
        </button>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="inline-flex text-white items-center bg-red-500 border-0 py-1 px-3 mx-2 mb-4 focus:outline-none hover:bg-red-400 rounded text-base mt-4 md:mt-0">
            <a href="">ログアウト</a>
          </button>
        </form>
      @else
        <button class="inline-flex text-white items-center bg-emerald-500 border-0 py-1 px-3 mx-2 mb-4 focus:outline-none hover:bg-emerald-400 rounded text-base mt-4 md:mt-0">
          <a href="{{ route('register') }}">新規登録</a>
        </button>
        <button class="inline-flex text-white items-center bg-emerald-500 border-0 py-1 px-3 mx-2 mb-4 focus:outline-none hover:bg-emerald-400 rounded text-base mt-4 md:mt-0">
          <a href="{{ route('login') }}">ログイン</a>
        </button>
      @endauth
      </div>
    </div>
  </nav>
