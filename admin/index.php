<?php
session_start();
require "../config.php";

?>

<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin — PT Sawit Plakat Tinggi</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

  <!-- style css  -->
  <link rel="stylesheet" href="../css/style.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="../img/palm-tree.png" type="image/x-icon">

</head>
<body>

<!-- SIDEBAR -->
<div id="sidebar" class="sidebar d-flex flex-column p-3">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div class="brand d-flex align-items-center gap-2">
      <div class="bg-white text-dark rounded-2 p-1" style="width:36px;height:36px;display:flex;align-items:center;justify-content:center">🌴</div>
      <div class="ms-1">
        <div>PT Sawit</div>
        <div class="small">Plakat Tinggi</div>
      </div>
    </div>
    <button id="btnCollapse" class="btn btn-sm btn-outline-light d-none d-lg-inline" title="Toggle sidebar">
      <i class="bi bi-chevron-left"></i>
    </button>
  </div>

  <hr style="border-color:rgba(255,255,255,0.04)">

  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item mb-1">
      <a href="#" class="nav-link active d-flex align-items-center gap-2">
        <i class="bi bi-house-door-fill fs-5"></i> <span class="nav-text">Dashboard</span>
      </a>
    </li>
    <li class="nav-item mb-1">
      <a href="../admin/kalkulator.php" class="nav-link d-flex align-items-center gap-2">
        <i class="bi bi-calculator-fill fs-5"></i> <span class="nav-text">Kalkulator</span>
      </a>
    </li>
    <li class="nav-item mb-1">
      <a href="#" class="nav-link d-flex align-items-center gap-2">
        <i class="bi bi-wallet2 fs-5"></i> <span class="nav-text">Pemasukan</span>
      </a>
    </li>
    <li class="nav-item mb-1">
      <a href="#" class="nav-link d-flex align-items-center gap-2">
        <i class="bi bi-receipt-cutoff fs-5"></i> <span class="nav-text">Pengeluaran</span>
      </a>
    </li>
    <li class="nav-item mb-1">
      <a href="#" class="nav-link d-flex align-items-center gap-2">
        <i class="bi bi-graph-up-arrow fs-5"></i> <span class="nav-text">Laporan</span>
      </a>
    </li>
    <li class="nav-item mt-3">
      <a href="#" class="nav-link d-flex align-items-center gap-2">
        <i class="bi bi-gear-fill fs-5"></i> <span class="nav-text">Pengaturan</span>
      </a>
    </li>
  </ul>

  <div class="mt-auto small">
    <hr style="border-color:rgba(255,255,255,0.04)">
    <div class="d-flex align-items-center gap-2">
      <img src="https://i.pravatar.cc/64?img=3" alt="user" class="avatar">
      <div>
        <div style="font-weight:700">Admin</div>
        <div class="small">admin@ptsawit.co</div>
      </div>
    </div>
  </div>
</div>
<!-- /SIDEBAR -->

<!-- CONTENT -->
<div id="mainContent" class="content">

  <!-- TOPBAR -->
  <div class="d-flex align-items-center justify-content-between mb-4">
    <div class="d-flex align-items-center gap-3">
      <button id="btnMobileMenu" class="btn btn-light d-lg-none"><i class="bi bi-list"></i></button>
      <h4 class="mb-0">Dashboard</h4>
      <div class="ms-3 small text-muted">Ringkasan keuangan & aktivitas</div>
    </div>

    <div class="d-flex align-items-center gap-3">
      <div class="input-group d-none d-md-flex" style="width:320px">
        <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
        <input class="form-control" placeholder="Cari transaksi, petani, kwitansi..." />
      </div>

      <div class="d-flex align-items-center gap-2">
        <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-bell"></i></button>
        <div class="dropdown">
          <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://i.pravatar.cc/64?img=12" alt="me" class="avatar me-2">
            <strong class="d-none d-sm-inline">Admin</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
            <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> Profil</a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Pengaturan</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="../logout.php"><i class="bi bi-box-arrow-right"></i> Keluar</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- /TOPBAR -->

  <!-- KPI Cards -->
  <div class="row g-3 mb-3">
    <div class="col-md-3">
      <div class="card p-3 kpi-card">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <small class="text-muted">Pemasukan Hari Ini</small>
            <div class="h5 mb-0">Rp 12.500.000</div>
          </div>
          <div class="chip bg-success text-white">
            <i class="bi bi-arrow-up-right"></i> 8%
          </div>
        </div>
        <small class="text-muted mt-2">Per 16 Sep 2025</small>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 kpi-card">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <small class="text-muted">Pengeluaran Hari Ini</small>
            <div class="h5 mb-0">Rp 6.200.000</div>
          </div>
          <div class="chip bg-danger text-white">
            <i class="bi bi-arrow-down-right"></i> 3%
          </div>
        </div>
        <small class="text-muted mt-2">Per 16 Sep 2025</small>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 kpi-card">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <small class="text-muted">Laba Hari Ini</small>
            <div class="h5 mb-0">Rp 6.300.000</div>
          </div>
          <div class="chip bg-primary text-white">
            <i class="bi bi-currency-dollar"></i> Stabil
          </div>
        </div>
        <small class="text-muted mt-2">Per 16 Sep 2025</small>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card p-3 kpi-card">
        <div class="d-flex align-items-center justify-content-between">
          <div>
            <small class="text-muted">Total Ton Bulan Ini</small>
            <div class="h5 mb-0">3.250 ton</div>
          </div>
          <div class="chip bg-info text-white">
            <i class="bi bi-tree"></i>
          </div>
        </div>
        <small class="text-muted mt-2">Per Sep 2025</small>
      </div>
    </div>
  </div>
  <!-- /KPI Cards -->

  <div class="row g-3">
    <!-- Chart Area -->
    <div class="col-lg-8">
      <div class="card p-3 kpi-card h-100">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="mb-0">Grafik Pemasukan & Pengeluaran (Bulan)</h6>
          <small class="text-muted">Per: Sep 2025</small>
        </div>
        <canvas id="mainChart" height="120"></canvas>
      </div>

      <div class="card mt-3 p-3 kpi-card">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <h6 class="mb-0">Aktivitas Terbaru</h6>
          <small class="text-muted">24 jam terakhir</small>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Pembayaran kwitansi RCPT-20250916001 ke Budi S.
            <span class="text-success">Rp 2.250.000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Input pemasukan penjualan 150 ton
            <span class="text-primary">Rp 29.500.000</span>
          </li>
          <li class="list-group-item d-flex justify-content-between align-items-center">
            Pengeluaran transport truk 2 unit
            <span class="text-danger">Rp 4.200.000</span>
          </li>
        </ul>
      </div>
    </div>

    <!-- Table & Quick Form -->
    <div class="col-lg-4">
      <div class="card p-3 kpi-card mb-3">
        <h6>Input Cepat — Pembelian Sawit</h6>
        <form id="quickForm" class="mt-2">
          <div class="mb-2">
            <input class="form-control form-control-sm" type="text" placeholder="Nama Petani" required/>
          </div>
          <div class="row g-2">
            <div class="col-6">
              <input class="form-control form-control-sm" type="number" step="0.01" placeholder="Berat" required/>
            </div>
            <div class="col-6">
              <select class="form-select form-select-sm">
                <option value="kg">Kilogram (kg)</option>
                <option value="ton">Ton (ton)</option>
              </select>
            </div>
          </div>
          <div class="row g-2 mt-2">
            <div class="col-7">
              <input class="form-control form-control-sm" type="number" placeholder="Harga /kg" required/>
            </div>
            <div class="col-5">
              <button type="submit" class="btn btn-success btn-sm w-100">Simpan</button>
            </div>
          </div>
        </form>
      </div>

      <div class="card p-3 kpi-card">
        <h6>Transaksi Terakhir</h6>
        <table class="table table-sm mt-2 mb-0">
          <thead>
            <tr><th>Petani</th><th class="text-end">Jumlah</th></tr>
          </thead>
          <tbody>
            <tr><td>Budi S.</td><td class="text-end">2.25 ton</td></tr>
            <tr><td>Sri W.</td><td class="text-end">1.40 ton</td></tr>
            <tr><td>H. Ahmad</td><td class="text-end">0.85 ton</td></tr>
          </tbody>
        </table>
        <div class="text-end mt-2">
          <a href="#" class="small">Lihat semua</a>
        </div>
      </div>
    </div>
  </div>

  <footer class="mt-4 small text-muted">
    © PT Sawit Plakat Tinggi · Design by Muhammad Asari
  </footer>
</div>
<!-- /CONTENT -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Sidebar collapse toggle (desktop)
  const sidebar = document.getElementById('sidebar');
  const btnCollapse = document.getElementById('btnCollapse');
  const mainContent = document.getElementById('mainContent');
  btnCollapse?.addEventListener('click', () => {
    sidebar.classList.toggle('sidebar-collapsed');
    mainContent.classList.toggle('content-wide');
    // switch chevron
    btnCollapse.querySelector('i').classList.toggle('bi-chevron-left');
    btnCollapse.querySelector('i').classList.toggle('bi-chevron-right');
  });

  // Mobile menu open/close
  const btnMobileMenu = document.getElementById('btnMobileMenu');
  btnMobileMenu?.addEventListener('click', () => {
    sidebar.classList.toggle('show');
  });
  // close sidebar clicking outside on small screens
  document.addEventListener('click', (e) => {
    if (window.innerWidth < 992 && !sidebar.contains(e.target) && !btnMobileMenu.contains(e.target)) {
      sidebar.classList.remove('show');
    }
  });

  // Chart sample data
  const ctx = document.getElementById('mainChart').getContext('2d');
  const mainChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'],
      datasets: [
        {
          label: 'Pemasukan',
          data: [12000000,15000000,20000000,18000000,21000000,19000000,24000000,23000000,25000000,27000000,22000000,30000000],
          tension: 0.3,
          borderWidth: 2,
          fill: true,
          backgroundColor: 'rgba(16,185,129,0.12)',
          borderColor: 'rgba(16,185,129,0.9)',
          pointRadius: 3
        },
        {
          label: 'Pengeluaran',
          data: [8000000,9000000,10000000,11000000,12000000,9500000,15000000,16000000,17000000,14000000,13000000,16000000],
          tension: 0.3,
          borderWidth: 2,
          fill: true,
          backgroundColor: 'rgba(239,68,68,0.08)',
          borderColor: 'rgba(239,68,68,0.9)',
          pointRadius: 3
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: 'bottom' },
        tooltip: { mode: 'index', intersect: false }
      },
      interaction: { mode: 'index', intersect: false },
      scales: {
        y: { beginAtZero: true, ticks: { callback: v => v >= 1000 ? 'Rp ' + (v/1000000) + 'jt' : 'Rp ' + v } }
      }
    }
  });

  // Quick form submit (example local behavior)
  document.getElementById('quickForm')?.addEventListener('submit', (e) => {
    e.preventDefault();
    // you can replace this with fetch/ajax to submit to server
    alert('Data tersimpan (contoh). Sambungkan form ini ke endpoint server untuk menyimpan ke DB.');
    e.target.reset();
  });
</script>

</body>
</html>
