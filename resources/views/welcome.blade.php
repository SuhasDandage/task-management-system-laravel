<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Secure Auth</title>

<style>
*{margin:0;padding:0;box-sizing:border-box}
body{
    font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Arial,sans-serif;
    background:linear-gradient(135deg,#f8fafc,#e2e8f0);
    min-height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
}
.auth-container{width:100%;max-width:420px}
.card{
    background:#fff;
    border-radius:16px;
    padding:40px 32px;
    box-shadow:0 10px 25px rgba(0,0,0,.1);
}
.header{text-align:center;margin-bottom:28px}
.header h1{font-size:1.7rem;color:#1e293b;font-weight:700}
.header p{font-size:14px;color:#64748b}

/* Tabs */
.tabs{display:flex;margin-bottom:24px}
.tabs button{
    flex:1;
    padding:10px;
    border:none;
    cursor:pointer;
    background:#f1f5f9;
    font-weight:600;
}
.tabs button.active{
    background:#6366f1;
    color:#fff;
}

/* Form */
.form-group{margin-bottom:18px}
label{font-size:13px;font-weight:600}
input{
    width:100%;
    padding:12px 14px;
    border:1.5px solid #e2e8f0;
    border-radius:8px;
    margin-top:6px;
}
input:focus{
    outline:none;
    border-color:#6366f1;
    box-shadow:0 0 0 3px rgba(99,102,241,.15);
}
.password-wrapper{position:relative}
.toggle{
    position:absolute;
    right:10px;
    top:50%;
    transform:translateY(-50%);
    background:none;
    border:none;
    cursor:pointer;
}

/* Button */
.btn{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#6366f1;
    color:#fff;
    font-size:15px;
    font-weight:600;
    cursor:pointer;
}
.btn:hover{background:#4f46e5}

.link{
    display:block;
    margin-top:14px;
    text-align:center;
    font-size:13px;
    color:#6366f1;
    cursor:pointer;
}

/* Hide */
.hidden{display:none}
</style>
</head>

<body>

<div class="auth-container">
<div class="card">

<div class="header">
    <h1>Task Management</h1>
    <p>Secure authentication portal</p>
</div>

<div class="tabs">
    <button id="loginTab" class="active">Login</button>
    <button id="registerTab">Register</button>
</div>

<!-- LOGIN FORM (Breeze compatible) -->
<form id="loginForm" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <div class="password-wrapper">
            <input type="password" name="password" required>
            <button type="button" class="toggle">👁</button>
        </div>
    </div>

    <div class="form-group">
        <label>
            <input type="checkbox" name="remember"> Remember me
        </label>
    </div>

    <button class="btn">Sign In</button>
</form>

<!-- REGISTER FORM (Breeze compatible) -->
<form id="registerForm" method="POST" action="{{ route('register') }}" class="hidden">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required>
    </div>

    <div class="form-group">
        <label>Password</label>
        <div class="password-wrapper">
            <input type="password" name="password" required>
            <button type="button" class="toggle">👁</button>
        </div>
    </div>

    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button class="btn">Create Account</button>
</form>

</div>
</div>

<script>
/* Tabs */
const loginTab = document.getElementById('loginTab');
const registerTab = document.getElementById('registerTab');
const loginForm = document.getElementById('loginForm');
const registerForm = document.getElementById('registerForm');

loginTab.onclick = () => {
    loginTab.classList.add('active');
    registerTab.classList.remove('active');
    loginForm.classList.remove('hidden');
    registerForm.classList.add('hidden');
};

registerTab.onclick = () => {
    registerTab.classList.add('active');
    loginTab.classList.remove('active');
    registerForm.classList.remove('hidden');
    loginForm.classList.add('hidden');
};

/* Password Toggle */
document.querySelectorAll('.toggle').forEach(btn => {
    btn.onclick = () => {
        const input = btn.previousElementSibling;
        input.type = input.type === 'password' ? 'text' : 'password';
    };
});
</script>

</body>
</html>
