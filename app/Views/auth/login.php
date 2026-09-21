<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul ?? 'Login Admin | Animedesu'; ?></title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Mulish', sans-serif;
            background: radial-gradient(circle at 20% 20%, #1a2236 0%, #0b0f19 80%);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }
        .login-card {
            background: rgba(18, 25, 41, 0.75);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5), 0 0 30px rgba(229, 54, 55, 0.15);
            width: 100%;
            max-width: 440px;
            padding: 40px 35px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .brand-logo {
            text-align: center;
            margin-bottom: 25px;
        }
        .brand-logo h2 {
            font-weight: 900;
            letter-spacing: 1px;
            margin: 0;
            color: #fff;
        }
        .brand-logo h2 span {
            color: #e53637;
        }
        .brand-logo p {
            color: #8d99ae;
            font-size: 14px;
            margin-top: 5px;
        }
        .form-group label {
            font-size: 13px;
            font-weight: 600;
            color: #b7c0ce;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .input-group-text {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-right: none;
            color: #8d99ae;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
        }
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #fff !important;
            height: 48px;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .input-group .form-control {
            border-left: none;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: #e53637;
            box-shadow: 0 0 10px rgba(229, 54, 55, 0.25);
        }
        .input-group:focus-within .input-group-text {
            border-color: #e53637;
            color: #e53637;
        }
        .btn-toggle-password {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-left: none;
            color: #8d99ae;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            padding: 0 14px;
            cursor: pointer;
            transition: color 0.2s;
        }
        .btn-toggle-password:hover {
            color: #fff;
        }
        .btn-login {
            background: linear-gradient(135deg, #e53637 0%, #b31e20 100%);
            border: none;
            color: #fff;
            height: 48px;
            border-radius: 8px;
            font-weight: 700;
            letter-spacing: 0.5px;
            font-size: 15px;
            box-shadow: 0 8px 20px rgba(229, 54, 55, 0.4);
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 10px;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(229, 54, 55, 0.6);
            color: #fff;
        }
        .back-link {
            text-align: center;
            margin-top: 25px;
        }
        .back-link a {
            color: #8d99ae;
            font-size: 13px;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-link a:hover {
            color: #fff;
        }
        .demo-badge {
            background: rgba(229, 54, 55, 0.1);
            border: 1px dashed rgba(229, 54, 55, 0.3);
            border-radius: 8px;
            padding: 12px;
            font-size: 12px;
            color: #d1d5db;
            margin-top: 20px;
            text-align: center;
        }
        .demo-badge code {
            color: #ff7675;
            background: rgba(0,0,0,0.3);
            padding: 2px 6px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="brand-logo">
        <h2>Anime<span>desu</span></h2>
        <p>Admin Control Panel</p>
    </div>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert" style="background: rgba(220, 53, 69, 0.2); border-color: rgba(220, 53, 69, 0.4); color: #ff8591; font-size: 13px;">
            <i class="fas fa-exclamation-circle mr-1"></i> <?= session()->getFlashdata('error'); ?>
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close" style="outline: none;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert" style="background: rgba(40, 167, 69, 0.2); border-color: rgba(40, 167, 69, 0.4); color: #75b798; font-size: 13px;">
            <i class="fas fa-check-circle mr-1"></i> <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close" style="outline: none;">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <form action="/auth/loginProcess" method="POST">
        <div class="form-group">
            <label for="username">Username atau Email</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="username" name="username"
                       placeholder="Masukkan username atau email" autocomplete="username"
                       value="<?= esc(old('username') ?? ''); ?>" required autofocus>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi (Password)</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Masukkan password" autocomplete="current-password" required>
                <div class="input-group-append">
                    <button class="btn btn-toggle-password" type="button" id="togglePassword" aria-label="Lihat password">
                        <i class="fas fa-eye" id="toggleIcon"></i>
                    </button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-login">
            <i class="fas fa-sign-in-alt mr-2"></i> Masuk ke Panel
        </button>
    </form>

    <div class="demo-badge">
        <i class="fas fa-key mr-1"></i> Kredensial Default:<br>
        User: <code>admin</code> &nbsp;|&nbsp; Pass: <code>admin123</code>
    </div>

    <div class="back-link">
        <a href="/"><i class="fas fa-arrow-left mr-1"></i> Kembali ke Beranda Animedesu</a>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        toggleIcon.classList.toggle('fa-eye');
        toggleIcon.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>
