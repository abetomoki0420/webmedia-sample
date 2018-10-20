@extends('layouts.mediaTemplate')

@section('title','ログイン')

@section('content')
<div class="siimple-form-title">ログイン</div>
  <form class="siimple-form" method="POST" action="{{ route('login') }}">
      @csrf
      <div class="siimple-field">
        <label for="name" class="siimple-field-label">{{ __('Name') }}</label>
        <input id="name" type="name" class="siimple-input" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
          <div class="siimple--color-error">{{ $errors->first('name') }}</div>
        @endif
      </div>

      <div class="siimple-field">
        <label for="password" class="siimple-field-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="siimple-input" name="password" required>
        @if ($errors->has('password'))
          <div class="siimple--color-error">{{ $errors->first('password') }}</div>
        @endif
      </div>
      <div class="siimple-field">
        <label class="siimple-label">{{ __('Remembdiver Me') }}</label>
        <div class="siimple-checkbox">
          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
          <label for="remember"></label>
        </div>
      </div>
      <div class="siimple-field">
        <button type="submit" class="siimple-btn siimple-btn--primary">
            {{ __('Login') }}
        </button>
      </div>
  </form>
@endsection
