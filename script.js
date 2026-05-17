const ctx = document.getElementById('chartKeuangan');
new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
    datasets: [
      { label: 'Pemasukan', data: [120, 150, 180, 90, 200, 170], backgroundColor: 'rgba(25,135,84,0.7)' },
      { label: 'Pengeluaran', data: [100, 80, 130, 70, 150, 120], backgroundColor: 'rgba(220,53,69,0.7)' }
    ]
  }
});