@extends('base')
@section('content')

  <div class="container">
    @auth
      <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file">
        <button type="submit">保存</button>
      </form>
      <div>
        @foreach($images as $image)
        <img src="{{ $image->filename }}" alt="" srcset="">
        @endforeach
      </div>
      @else
        @if (Route::has('register'))
          <div>
            <p>ユーザ登録してからアップロードしてね</p>
          </div>
        @endif
    @endauth

  </div>
@endsection