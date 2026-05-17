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


  <style>
    /* ========= GLOBAL ========= */
body {
  background: #f4f6f9;
  font-family: "Poppins", Arial, sans-serif;
  color: #212529;
  margin: 0;
  padding: 0;
}

h1, h2, h3, h4 {
  font-weight: 600;
  color: #14532d;
}

.card {
  background: #fff;
  border-radius: 12px;
  padding: 20px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

/* ========= FORM STYLE ========= */
label {
  font-weight: 500;
  margin-bottom: 6px;
  display: block;
}

input, select {
  width: 100%;
  padding: 10px 12px;
  border: 1px solid #ced4da;
  border-radius: 8px;
  font-size: 0.95rem;
  transition: 0.2s;
}

input:focus, select:focus {
  border-color: #16a34a;
  outline: none;
  box-shadow: 0 0 0 2px rgba(22,163,74,0.2);
}

/* ========= GRID ========= */
.grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 24px;
}

.row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
}

.actions {
  margin-top: 18px;
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}

/* ========= BUTTONS ========= */
.btn-primary {
  background: #16a34a;
  color: #fff;
  border: none;
  padding: 10px 16px;
  border-radius: 8px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
}

.btn-primary:hover {
  background: #14532d;
}

.btn-outline {
  background: transparent;
  border: 1px solid #16a34a;
  color: #16a34a;
  padding: 10px 16px;
  border-radius: 8px;
  font-weight: 500;
  cursor: pointer;
  transition: 0.3s;
}

.btn-outline:hover {
  background: #16a34a;
  color: #fff;
}

/* ========= SUMMARY ========= */
.summary {
  margin-top: 16px;
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
}

.pill {
  background: #e2fbe2;
  color: #14532d;
  font-size: 0.9rem;
  padding: 6px 12px;
  border-radius: 20px;
  font-weight: 500;
}

/* ========= RECEIPT ========= */
.receipt {
  border: 1px solid #e5e7eb;
  border-radius: 10px;
  padding: 16px;
  background: #fafafa;
}

.receipt .meta {
  display: flex;
  justify-content: space-between;
  margin-bottom: 12px;
}

.receipt h2 {
  margin: 10px 0;
  color: #16a34a;
}

.receipt .table {
  width: 100%;
  border-collapse: collapse;
  margin: 12px 0;
}

.receipt .table th, 
.receipt .table td {
  padding: 8px;
  border-bottom: 1px solid #ddd;
  font-size: 0.9rem;
}

.receipt .total {
  text-align: right;
  font-weight: 700;
  font-size: 1.1rem;
  margin-top: 12px;
  color: #14532d;
}

/* ========= RESPONSIVE ========= */
@media (max-width: 992px) {
  .grid {
    grid-template-columns: 1fr;
  }
  .row {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 576px) {
  h1 {
    font-size: 1.3rem;
  }
  .actions {
    flex-direction: column;
  }
  .btn-primary, .btn-outline {
    width: 100%;
    text-align: center;
  }
}

  </style>
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
      <a href="../admin/index.php" class="nav-link active d-flex align-items-center gap-2">
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
      <h4 class="mb-0">Kalkulator</h4>
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

<!-- Halaman Kalkulator start -->
    <div class="container">
    <header>
      <div>
        <h1>Pembayaran Sawit — Kalkulator & Kwitansi</h1>
        <div class="small">Masukkan berat, harga per kilo (atau per ton), lalu cetak kwitansi pembayarannya.</div>
      </div>
    </header>

    <main class="card" style="margin-top:18px">
      <div class="grid">
        <!-- Form -->
        <section>
          <h3 style="margin-top:0;margin-bottom:12px">Input Transaksi</h3>

          <label>Nama Petani / Pemasok</label>
          <input id="farmerName" type="text" placeholder="contoh: Budi Santoso" />

          <div style="height:12px"></div>

          <div class="row">
            <div>
              <label>Berat</label>
              <div style="display:flex;gap:8px;align-items:center">
                <input id="weight" type="number" min="0" step="0.01" placeholder="mis. 2.5" />
                <select id="unit">
                  <option value="kg">Kilogram (kg)</option>
                  <option value="ton">Ton (ton)</option>
                </select>
              </div>
            </div>
            <div>
              <label>Harga</label>
              <div style="display:flex;gap:8px;align-items:center">
                <input id="price" type="number" min="0" step="1" placeholder="harga per kg (mis. 2000)" />
                <select id="priceUnit">
                  <option value="perKg">/kg</option>
                  <option value="perTon">/ton</option>
                </select>
              </div>
            </div>
          </div>

          <div style="height:12px"></div>

          <label>Detail Pembayaran</label>
          <input id="bankName" type="text" placeholder="Nama bank (mis. BRI)" />
          <div style="height:8px"></div>
          <div class="row">
            <input id="accountName" type="text" placeholder="Nama rekening" />
            <input id="accountNumber" type="text" placeholder="No. rekening" />
          </div>

          <div class="actions">
            <button class="btn-primary" id="calcBtn">Hitung & Tampilkan Kwitansi</button>
            <button class="btn-outline" id="resetBtn">Reset</button>
            <button class="btn-outline" id="printBtn">Cetak Kwitansi</button>
          </div>

          <div class="summary" aria-hidden="true">
            <div class="pill">Total Berat: <span id="displayWeight">-</span></div>
            <div class="pill">Harga /kg: <span id="displayPrice">-</span></div>
            <div class="pill">Total Bayar: <span id="displayTotal">-</span></div>
          </div>

          <footer class="small">Catatan: Jika menggunakan satuan ton, 1 ton = 1000 kg.</footer>
        </section>

        <!-- Receipt preview -->
        <aside>
          <h3 style="margin-top:0;margin-bottom:12px">Preview Kwitansi</h3>
          <div id="receipt" class="receipt">
            <div class="meta">
              <div>
                <strong id="rcptTitle">KWITANSI PEMBAYARAN</strong><br>
                <span id="rcptNo">No: -</span>
              </div>
              <div class="small" id="rcptDate">-</div>
            </div>

            <h2 id="rcptFarmer">-</h2>
            <div class="small">Pembayaran ke rekening: <span id="rcptBank">-</span> — <span id="rcptAccount">-</span></div>

            <table class="table" aria-hidden="false">
              <thead>
                <tr><th>Item</th><th>Detail</th><th style="text-align:right">Jumlah</th></tr>
              </thead>
              <tbody id="rcptItems">
                <tr><td>Berat</td><td id="rcptWeightUnit">-</td><td style="text-align:right" id="rcptWeight">-</td></tr>
                <tr><td>Harga</td><td id="rcptPriceUnit">-</td><td style="text-align:right" id="rcptPrice">-</td></tr>
              </tbody>
            </table>

            <div class="total">Total Bayar: <span id="rcptTotal">-</span></div>
            <div style="height:8px"></div>
            <div class="small">Terima kasih — kwitansi ini sah sebagai bukti pembayaran.</div>
          </div>
        </aside>
      </div>
    </main>
  </div>

  

   

  <footer class="mt-4 small text-muted">
    © PT Sawit Plakat Tinggi · Design by Muhammad Asari
  </footer>
</div>
<!-- /CONTENT -->

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // ===== Sidebar Toggle =====
  const sidebar = document.getElementById('sidebar');
  const btnCollapse = document.getElementById('btnCollapse');
  const mainContent = document.getElementById('mainContent');
  btnCollapse?.addEventListener('click', () => {
    sidebar.classList.toggle('sidebar-collapsed');
    mainContent.classList.toggle('content-wide');
    btnCollapse.querySelector('i').classList.toggle('bi-chevron-left');
    btnCollapse.querySelector('i').classList.toggle('bi-chevron-right');
  });

  // ===== Mobile Menu =====
  const btnMobileMenu = document.getElementById('btnMobileMenu');
  btnMobileMenu?.addEventListener('click', () => {
    sidebar.classList.toggle('show');
  });
  document.addEventListener('click', (e) => {
    if (window.innerWidth < 992 && !sidebar.contains(e.target) && !btnMobileMenu.contains(e.target)) {
      sidebar.classList.remove('show');
    }
  });

  // ===== Utility =====
  const fmtIDR = (v)=> new Intl.NumberFormat('id-ID',{style:'currency',currency:'IDR',maximumFractionDigits:0}).format(Math.round(v));
  const el = id => document.getElementById(id);

  // ===== Reset Form =====
  function resetForm(){
    el('farmerName').value='';
    el('weight').value='';
    el('unit').value='kg';
    el('price').value='';
    el('priceUnit').value='perKg';
    el('bankName').value='';
    el('accountName').value='';
    el('accountNumber').value='';
    clearReceipt();
  }

  function clearReceipt(){
    el('displayWeight').textContent='-';
    el('displayPrice').textContent='-';
    el('displayTotal').textContent='-';

    el('rcptNo').textContent='No: -';
    el('rcptDate').textContent='-';
    el('rcptFarmer').textContent='-';
    el('rcptBank').textContent='-';
    el('rcptAccount').textContent='-';
    el('rcptWeight').textContent='-';
    el('rcptWeightUnit').textContent='-';
    el('rcptPrice').textContent='-';
    el('rcptPriceUnit').textContent='-';
    el('rcptTotal').textContent='-';
  }

  // ===== Kalkulasi =====
  function calculate(){
    const farmer = el('farmerName').value.trim() || '—';
    const weightRaw = parseFloat(el('weight').value);
    const unit = el('unit').value;
    const priceRaw = parseFloat(el('price').value);
    const priceUnit = el('priceUnit').value;
    const bank = el('bankName').value.trim() || '-';
    const accName = el('accountName').value.trim() || '-';
    const accNo = el('accountNumber').value.trim() || '-';

    if(isNaN(weightRaw) || isNaN(priceRaw)){
      alert('Masukkan nilai berat dan harga yang valid.');
      return;
    }

    const weightKg = unit === 'ton' ? weightRaw * 1000 : weightRaw;
    const pricePerKg = priceUnit === 'perTon' ? priceRaw / 1000 : priceRaw;
    const total = weightKg * pricePerKg;

    // summary
    el('displayWeight').textContent = weightKg + ' kg ('+weightRaw+' '+unit+')';
    el('displayPrice').textContent = fmtIDR(pricePerKg) + ' /kg';
    el('displayTotal').textContent = fmtIDR(total);

    // receipt
    const rcptNo = 'RCPT-' + Date.now().toString().slice(-8);
    const dateStr = new Date().toLocaleString('id-ID', {dateStyle:'medium', timeStyle:'short'});

    el('rcptNo').textContent = 'No: ' + rcptNo;
    el('rcptDate').textContent = dateStr;
    el('rcptFarmer').textContent = farmer;
    el('rcptBank').textContent = bank;
    el('rcptAccount').textContent = accNo + ' — ' + accName;
    el('rcptWeightUnit').textContent = unit === 'ton' ? weightRaw + ' ton' : weightRaw + ' kg';
    el('rcptWeight').textContent = weightKg + ' kg';
    el('rcptPriceUnit').textContent = priceUnit === 'perTon' ? priceRaw + ' /ton' : fmtIDR(priceRaw) + ' /kg';
    el('rcptPrice').textContent = priceUnit === 'perTon' ? fmtIDR(priceRaw/1000) + ' /kg' : fmtIDR(priceRaw) + ' /kg';
    el('rcptTotal').textContent = fmtIDR(total);

    el('receipt').scrollIntoView({behavior:'smooth'});
  }

  // ===== Cetak Kwitansi =====
  function printReceipt(){
    const farmer   = el('rcptFarmer').textContent;
    const rcptNo   = el('rcptNo').textContent;
    const rcptDate = el('rcptDate').textContent;
    const bank     = el('rcptBank').textContent;
    const account  = el('rcptAccount').textContent;
    const weight   = el('rcptWeight').textContent;
    const weightU  = el('rcptWeightUnit').textContent;
    const price    = el('rcptPrice').textContent;
    const priceU   = el('rcptPriceUnit').textContent;
    const total    = el('rcptTotal').textContent;

    const printWindow = window.open('', '_blank');
    const style = `
      <style>
        body{font-family:Arial, Helvetica, sans-serif;padding:20px;color:#333}
        h1{margin:0;text-align:center;font-size:20px}
        .header{text-align:center;margin-bottom:20px}
        .meta{margin:15px 0;font-size:14px}
        .meta div{margin-bottom:4px}
        table{width:100%;border-collapse:collapse;margin-top:10px}
        th,td{border:1px solid #666;padding:8px;font-size:14px}
        th{background:#f0f0f0;text-align:left}
        .total{margin-top:12px;font-size:16px;font-weight:bold;text-align:right;color:#14532d}
        .sign-table {
  width: 100%;
  margin-top: 50px;
  border: none;
  border-collapse: collapse;
}
.sign-table td {
  border: none;
  font-size: 14px;
  vertical-align: bottom;
}
        .footer{margin-top:30px;font-size:12px;text-align:center;color:#555}
      </style>
    `;

    const content = `
      <div class="header">
        <h1>KWITANSI PEMBAYARAN</h1>
        <div><strong>PT Sawit Plakat Tinggi</strong></div>
      </div>
      <div class="meta">
        <div>${rcptNo}</div>
        <div>Tanggal: ${rcptDate}</div>
        <div>Nama Petani/Pemasok: <strong>${farmer}</strong></div>
        <div>Pembayaran ke Rekening: ${bank} — ${account}</div>
      </div>
      <table>
        <thead>
          <tr><th>Item</th><th>Detail</th><th style="text-align:right">Jumlah</th></tr>
        </thead>
        <tbody>
          <tr><td>Berat</td><td>${weightU}</td><td style="text-align:right">${weight}</td></tr>
          <tr><td>Harga</td><td>${priceU}</td><td style="text-align:right">${price}</td></tr>
        </tbody>
      </table>
      <div class="total">Total Bayar: ${total}</div>
       <table class="sign-table">
  <tr>
    <td style="text-align:center; width: 40%;">
      Penerima,<br><br><br><br>
      (___________________)
    </td>
    <td style="text-align:center; width: 40%;">
      Hormat Kami,<br><br><br><br>
      (PT Sawit Plakat Tinggi)
    </td>
  </tr>
</table>
      <div class="footer">
        Terima kasih — kwitansi ini sah sebagai bukti pembayaran.
      </div>
    `;

    printWindow.document.write('<html><head><title>Kwitansi Pembayaran</title>'+style+'</head><body>'+content+'</body></html>');
    printWindow.document.close();
    printWindow.focus();
    setTimeout(()=>{ printWindow.print(); printWindow.close(); }, 500);
  }

  // ===== Event Listener =====
  el('calcBtn')?.addEventListener('click', calculate);
  el('resetBtn')?.addEventListener('click', resetForm);
  el('printBtn')?.addEventListener('click', printReceipt);
</script>


</body>
</html>
