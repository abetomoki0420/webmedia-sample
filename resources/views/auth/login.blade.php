@extends('layouts.mediaTemplate')

@section('content')
  <form class="siimple-form" method="POST" action="{{ route('login') }}">
      @csrf

      <div class="siimple-form-title">ログイン</div>
      <div class="siimple-field">
        <label for="name" class="siimple-label">{{ __('Name') }}</label>
        <input id="name" type="name" class="siimple-input" name="name" value="{{ old('name') }}" required autofocus>
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
        <label class="siimple-label">{{ __('Remember Me') }}</label>
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
