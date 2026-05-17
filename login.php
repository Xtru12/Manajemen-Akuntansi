<?php
session_start();
require "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_or_username = $_POST['email'];
    $password = $_POST['password'];

    // cek user berdasarkan username atau email
    $sql = "SELECT * FROM users WHERE email=? OR username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email_or_username, $email_or_username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && hash('sha256', $password) === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location:admin/index.php");
        exit;
    } else {
        echo "<script>alert('Email/Username atau Password salah!'); window.location='admin/index.php';</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login — PT Sawit Plakat Tinggi</title>

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/palm-tree.png" type="image/x-icon">

  <!-- Custom CSS -->
  <style>
    body {
      min-height: 100vh;
      background: linear-gradient(135deg, #14532d, #166534);
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Segoe UI", Roboto, Arial, sans-serif;
    }

    .login-card {
      width: 100%;
      max-width: 420px;
      background: #fff;
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
      animation: fadeIn 0.6s ease;
    }

    .login-card .brand {
      font-weight: 700;
      color: #14532d;
    }

    .login-card .form-control {
      border-radius: 10px;
      font-size: 0.95rem;
      padding: 0.6rem 0.9rem;
    }

    .btn-login {
      background: #166534;
      border: none;
      border-radius: 10px;
      padding: 0.7rem;
      font-weight: 600;
      transition: background 0.2s ease;
    }

    .btn-login:hover {
      background: #14532d;
    }

    .login-card .small a {
      text-decoration: none;
      color: #166534;
      font-weight: 500;
    }
    .login-card .small a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

<div class="login-card">
  <div class="text-center mb-4">
    <div class="bg-success bg-opacity-10 text-success rounded-circle d-inline-flex align-items-center justify-content-center" style="width:64px;height:64px;font-size:2rem;">
      🌴
    </div>
    <h4 class="mt-2 brand">PT Sawit Plakat Tinggi</h4>
    <p class="text-muted small mb-0">Silakan masuk ke akun Anda</p>
  </div>

  <!-- Login Form -->
  <form action="admin/index.php" method="post">
    <div class="mb-3">
      <label for="email" class="form-label">Email atau Username</label>
      <input type="text" class="form-control" id="email" name="email" placeholder="admin@ptsawit.co" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Kata Sandi</label>
      <div class="input-group">
        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
          <i class="bi bi-eye"></i>
        </button>
      </div>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
        <label class="form-check-label small" for="rememberMe">
          Ingat saya
        </label>
      </div>
      <a href="#" class="small">Lupa password?</a>
    </div>
    <button type="submit" class="btn btn-login text-white w-100">Masuk</button>
  </form>

  <div class="text-center mt-4 small">
    © 2025 PT Sawit Plakat Tinggi
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Toggle password visibility
  document.getElementById("togglePassword").addEventListener("click", function() {
    const pwd = document.getElementById("password");
    const icon = this.querySelector("i");
    if (pwd.type === "password") {
      pwd.type = "text";
      icon.classList.remove("bi-eye");
      icon.classList.add("bi-eye-slash");
    } else {
      pwd.type = "password";
      icon.classList.remove("bi-eye-slash");
      icon.classList.add("bi-eye");
    }
  });
</script>
</body>
</html>