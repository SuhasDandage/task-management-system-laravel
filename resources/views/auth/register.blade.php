<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>

<style>
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
    max-width:440px;
    background:#fff;
    border-radius:16px;
    padding:40px 32px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
}
h2{text-align:center;margin-bottom:24px;color:#1e293b}
.form-group{margin-bottom:18px}
label{font-size:13px;font-weight:600;color:#374151}
input{
    width:100%;
    padding:12px 14px;
    border:1.5px solid #e2e8f0;
    border-radius:8px;
}
input:focus{
    outline:none;
    border-color:#6366f1;
    box-shadow:0 0 0 3px rgba(99,102,241,.15);
}
.btn{
    width:100%;
    padding:12px;
    background:#6366f1;
    color:#fff;
    border:none;
    border-radius:8px;
    font-weight:600;
    cursor:pointer;
}
.btn:hover{background:#4f46e5}
.link{
    display:block;
    text-align:center;
    margin-top:16px;
    color:#6366f1;
    font-size:14px;
    text-decoration:none;
}
.error{
    color:#dc2626;
    font-size:12px;
    margin-top:6px;
}
</style>
</head>

<body>

<div class="card">

<h2>Create Your Account</h2>

<form method="POST" action="{{ route('register') }}">
    @csrf

    {{-- Name --}}
    <div class="form-group">
        <label>Name</label>
        <input type="text"
               name="name"
               value="{{ old('name') }}"
               required
               autofocus>
        @error('name')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    {{-- Email --}}
    <div class="form-group">
        <label>Email</label>
        <input type="email"
               name="email"
               value="{{ old('email') }}"
               required>
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

    {{-- Confirm Password --}}
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password"
               name="password_confirmation"
               required>
        @error('password_confirmation')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <button class="btn">Register</button>
</form>

{{-- Login Link --}}
<a href="{{ route('login') }}" class="link">
    Already registered? Log in
</a>


</div>

</body>
</html>
