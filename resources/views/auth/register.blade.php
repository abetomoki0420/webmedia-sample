@extends('layouts.mediaTemplate')

@section('content')
  <form class="siimple-form" method="POST" action="{{ route('register') }}">
      @csrf

      <div class="siimple-form-title">新規登録</div>
      <div class="siimple-field">
        <label for="name" class="siimple-label">{{ __('Name') }}</label>
        <input id="name" type="text" class="siimple-input" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
          <span class="siimple--color-error">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <div class="siimple-field">
        <label for="password" class="siimple-label">{{ __('Password') }}</label>
        <input id="password" type="password" class="siimple-input" name="password" required>
        @if ($errors->has('password'))
          <span class="siimple--color-error">{{ $errors->first('password') }}</span>
        @endif
      </div>

      <div class="siimple-field">
        <label for="password-confirm" class="siimple-label">{{ __('Confirm Password') }}</label>
        <input id="password-confirm" type="password" class="siimple-input" name="password_confirmation" required>
      </div>

      <div class="siimple-field">
        <button type="submit" class="siimple-btn siimple-btn--primary">
          {{ __('Register') }}
        </button>
      </div>
  </form>
@endsection
