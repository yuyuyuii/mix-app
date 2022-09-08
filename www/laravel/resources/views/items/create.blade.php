@extends('base')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="text-center">
          データ入力
        </h2>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="float-right">
          <!-- TODO: route()を使う -->
          <a class="btn btn-outline-secondary" href="{{ route('index') }}">戻る</a>
          <button class="btn btn-outline-secondary save" type="submit" form="myform">保存</button>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <!-- TODO: actionの指定 -->
        <form action="{{ route('store') }}" method="post" id="myform">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach( $errors->all() as $error )
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          {{ csrf_field() }}

          <div class="form-group">
            <label>名前</label>
            <input type="text" name="name" placeholder="記入例:山田孝之" class="form-controll" value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label>年齢</label>
            <input type="number" name="age"class="form-controll" value="{{ old('age') }}">
          </div>
          <div class="form-group">
            <label>性別</label>
            <div class="form-check">
              <input type="radio" name="sex" id="sex-male" value="1" class="form-check-input" value="">
              <label class="form-check-label" for="sex-male">男性</label>
            </div>
            <div class="form-check">
              <input type="radio" name="sex" id="sex-female" value="2" class="form-check-input" value="{{ old('sex') }}">
              <label class="form-check-label" for="sex-male">女性</label>
            </div>
            <div class="form-check">
              <input type="radio" name="sex" id="sex-unspecified" value="3" class="form-check-input" value="{{ old('sex') }}">
              <label class="form-check-label" for="sex-male">指定なし</label>
            </div>
          </div>          
          <div class="form-group">
            <label>備考欄</label>
            <textarea name="memo" class="form-controll" value="{{ old('memo') }}"></textarea>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="float-right">
          <!-- TODO: route()を使う -->
          <a class="btn btn-outline-secondary" href="{{ route('index') }}">戻る</a>
          <button class="btn btn-outline-secondary save" type="submit" form="myform">保存</button>
        </div>
    </div>
  </div>
@endsection