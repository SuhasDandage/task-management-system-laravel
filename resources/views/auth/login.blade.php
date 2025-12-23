<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<style>
/* === same styles you already used (shortened here) === */
body{
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Arial,sans-serif;
    background:linear-gradient(135deg,#f8fafc,#e2e8f0);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}
.card{
    width:100%;
    max-width:420px;
    background:#fff;
    border-radius:16px;
    padding:40px 32px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
}
.form-group{margin-bottom:18px}
label{font-size:13px;font-weight:600}
input{
    width:100%;
    padding:12px 14px;
    border:1.5px solid #e2e8f0;
    border-radius:8px;
}
.btn{
    width:100%;
    padding:12px;
    background:#6366f1;
    color:#fff;
    border:none;
    border-radius:8px;
    font-weight:600;
}
.error{color:#dc2626;font-size:12px;margin-top:6px}
</style>
</head>

<body>

<div class="card">

<h2 style="text-align:center;margin-bottom:24px"> Login</h2>

{{-- Session Status --}}
@if (session('status'))
    <div style="color:#10b981;margin-bottom:12px">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- Email --}}
    <div class="form-group">
        <label>Email</label>
        <input type="email"
               name="email"
               value="{{ old('email') }}"
               required
               autofocus>
        @error('email')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    {{-- Password --}}
    <div class="form-group">
        <label>Password</label>
        <input type="password"
               name="password"
               required>
        @error('password')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    {{-- Remember --}}
    <div class="form-group">
        <label>
            <input type="checkbox" name="remember">
            Remember me
        </label>
    </div>

    {{-- Actions --}}
    <button class="btn">Log in</button>

    @if (Route::has('password.request'))
        <div style="margin-top:14px;text-align:center">
            <a href="{{ route('password.request') }}" style="color:#6366f1;font-size:13px">
                Forgot your password?
            </a>
        </div>
    @endif
</form>
        <div style="margin-top:14px;text-align:center">

<a href="{{ route('register') }}" class="link">
    Don’t have an account? Register
</a>
</div>
</div>

</body>
</html>
