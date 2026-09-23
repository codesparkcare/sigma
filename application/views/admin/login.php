<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Sigma Height Elevators</title>
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="<?= base_url('assets/favicon.svg') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/favicon-32x32.png') ?>">
    <link rel="shortcut icon" href="<?= base_url('assets/favicon.ico') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/favicon.png') ?>">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome 6 Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #e60000;
            --primary-hover: #cc0000;
            --dark-bg: #090d16;
            --dark-card: #111827;
            --border-color: #1f293d;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #070a10 0%, #0f172a 50%, #090d16 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
            color: #ffffff;
            position: relative;
            overflow-x: hidden;
        }

        /* Subtle animated background glow */
        body::before {
            content: '';
            position: absolute;
            top: -20%;
            left: 50%;
            transform: translateX(-50%);
            width: 700px;
            height: 500px;
            background: radial-gradient(circle, rgba(230, 0, 0, 0.18) 0%, rgba(230, 0, 0, 0) 70%);
            pointer-events: none;
            z-index: 0;
        }

        .login-card {
            width: 100%;
            max-width: 440px;
            background: rgba(17, 24, 39, 0.92);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5), 0 0 0 1px rgba(230, 0, 0, 0.15);
            padding: 38px 32px;
            position: relative;
            z-index: 10;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 24px;
        }

        .login-logo img {
            height: 48px;
            object-fit: contain;
            filter: drop-shadow(0 2px 8px rgba(230, 0, 0, 0.3));
        }

        .login-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 700;
            font-size: 1.45rem;
            text-align: center;
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }

        .login-subtitle {
            text-align: center;
            color: #94a3b8;
            font-size: 0.85rem;
            margin-bottom: 28px;
        }

        .form-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group-text {
            background-color: #1e293b;
            border: 1px solid #334155;
            color: #94a3b8;
            border-right: none;
            border-radius: 10px 0 0 10px;
        }

        .form-control {
            background-color: #1e293b;
            border: 1px solid #334155;
            color: #ffffff;
            font-size: 0.92rem;
            padding: 11px 14px;
            border-radius: 0 10px 10px 0;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            background-color: #1a2333;
            border-color: var(--primary);
            color: #ffffff;
            box-shadow: 0 0 0 3px rgba(230, 0, 0, 0.2);
        }

        .btn-toggle-eye {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-left: none;
            color: #94a3b8;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            padding: 0 14px;
            transition: color 0.2s;
        }

        .btn-toggle-eye:hover {
            color: #ffffff;
        }

        .input-group:focus-within .input-group-text,
        .input-group:focus-within .btn-toggle-eye {
            border-color: var(--primary);
        }

        .btn-login {
            background: linear-gradient(135deg, #e60000 0%, #b30000 100%);
            border: none;
            color: #ffffff;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            margin-top: 10px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 14px rgba(230, 0, 0, 0.35);
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #ff1a1a 0%, #e60000 100%);
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(230, 0, 0, 0.5);
            color: #ffffff;
        }

        .login-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 0.8rem;
            color: #64748b;
        }

        .login-footer a {
            color: #94a3b8;
            text-decoration: none;
            transition: color 0.2s;
        }

        .login-footer a:hover {
            color: var(--primary);
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-logo">
            <a href="<?= site_url('') ?>">
                <img src="<?= base_url('assets/Sigma-Elevator-White-logo.png') ?>" alt="Sigma Height Elevators">
            </a>
        </div>

        <h1 class="login-title">Admin Portal</h1>
        <p class="login-subtitle">Sign in to manage Sigma Height Elevators</p>

        <!-- Flash Message Alerts -->
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger d-flex align-items-center gap-2 py-2 px-3 mb-4 rounded-3" style="font-size: 0.85rem; background: rgba(220, 38, 38, 0.15); border: 1px solid rgba(220, 38, 38, 0.3); color: #fca5a5;" role="alert">
                <i class="fa-solid fa-circle-exclamation text-danger fs-6"></i>
                <div><?= $this->session->flashdata('error') ?></div>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success d-flex align-items-center gap-2 py-2 px-3 mb-4 rounded-3" style="font-size: 0.85rem; background: rgba(22, 163, 74, 0.15); border: 1px solid rgba(22, 163, 74, 0.3); color: #86efac;" role="alert">
                <i class="fa-solid fa-circle-check text-success fs-6"></i>
                <div><?= $this->session->flashdata('success') ?></div>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('admin/do_login') ?>" method="POST" autocomplete="off">
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label" for="password">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" style="border-radius: 0;" required>
                    <button class="btn btn-toggle-eye" type="button" id="togglePasswordBtn" title="Show / Hide Password">
                        <i class="fa-solid fa-eye" id="togglePasswordIcon"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-login">
                <i class="fa-solid fa-right-to-bracket me-2"></i> Sign In
            </button>
        </form>

        <div class="login-footer">
            <a href="<?= site_url('') ?>" target="_blank">
                <i class="fa-solid fa-arrow-left me-1"></i> Return to Live Website
            </a>
            <div class="mt-2 text-muted" style="font-size: 0.75rem;">
                Sigma Height Elevators L.L.C • Dubai, UAE
            </div>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleBtn = document.getElementById('togglePasswordBtn');
        const passInput = document.getElementById('password');
        const toggleIcon = document.getElementById('togglePasswordIcon');

        if (toggleBtn && passInput) {
            toggleBtn.addEventListener('click', function() {
                if (passInput.type === 'password') {
                    passInput.type = 'text';
                    toggleIcon.classList.remove('fa-eye');
                    toggleIcon.classList.add('fa-eye-slash');
                } else {
                    passInput.type = 'password';
                    toggleIcon.classList.remove('fa-eye-slash');
                    toggleIcon.classList.add('fa-eye');
                }
            });
        }
    });
    </script>
</body>
</html>
