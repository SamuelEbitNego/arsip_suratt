@extends('layouts.app1')

@section('content')
<center>
     <h1 class="mb-3 text-center">Dashboard Arsip Surat</h1>
     <div class="row">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center">
                <i class="fas fa-envelope-open-text fa-2x"></i>
                <h5 class="mt-2">Jumlah Surat Total</h5>
            </div>
            <div class="card-body text-center">
                <h2 class="font-weight-bold">{{ $totalSurat }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-success text-white text-center">
                <i class="fas fa-calendar-alt fa-2x"></i>
                <h5 class="mt-2">Jumlah Surat Per Bulan</h5>
            </div>
            <div class="card-body text-center">
                <h2 class="font-weight-bold">{{ $suratPerBulan }}</h2>
            </div>
        </div>
    </div>
    
    <!-- Card Jumlah Surat Per Tahun -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-info text-white text-center">
                <i class="fas fa-calendar fa-2x"></i>
                <h5 class="mt-2">Jumlah Surat Per Tahun</h5>
            </div>
            <div class="card-body text-center">
                <h2 class="font-weight-bold">{{ $suratPerTahun }}</h2>
            </div>
        </div>
    </div>
</div>
          <div class="card-header bg-secondary text-white">
               <h4 class="mb-0 text-center">Perbandingan Surat Masuk dan Surat Keluar</h4>
          </div>
               <canvas id="masukKeluarChart" width="400" height="200"></canvas>
          <div class="card-header bg-secondary text-white">
               <h4 class="mb-0">Statistik Klasifikasi Surat Masuk vs Surat Keluar</h4>
          </div>
               <canvas id="klasifikasiChart" width="400" height="200"></canvas>
          <br>
          <div class="col-12">
                    <div class="card-header bg-danger text-white">
                         <i class="fas fa-exclamation-triangle"></i> Surat Habis Masa Retensi
                    </div>
                    <div class="card-body">
                         <table class="table table-hover table-bordered">
                              <thead class="thead-dark">
                                   <tr>
                                        <th>Kode Surat</th>
                                        <th>Nama Surat</th>
                                        <th>Tanggal Expired</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   @foreach($suratExpired as $surat)
                                   <tr>
                                        <td>{{ $surat->nomor_surat }}</td>
                                        <td>{{ $surat->nama_surat }}</td>
                                        <td>{{ $surat->tanggal_retensi }}</td>
                                   </tr>
                                   @endforeach
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
</center>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
     const klasifikasiLabels = @json($klasifikasiLabels);
     const klasifikasiMasukData = @json($klasifikasiMasukData);
     const klasifikasiKeluarData = @json($klasifikasiKeluarData);

     const ctx = document.getElementById('klasifikasiChart').getContext('2d');
     const klasifikasiChart = new Chart(ctx, {
          type: 'bar',
          data: {
               labels: klasifikasiLabels,
               datasets: [{
                         label: 'Surat Masuk',
                         data: klasifikasiMasukData,
                         backgroundColor: 'rgba(54, 162, 235, 0.6)',
                         borderColor: 'rgba(54, 162, 235, 1)',
                         borderWidth: 1,
                    },
                    {
                         label: 'Surat Keluar',
                         data: klasifikasiKeluarData,
                         backgroundColor: 'rgba(255, 99, 132, 0.6)',
                         borderColor: 'rgba(255, 99, 132, 1)',
                         borderWidth: 1,
                    },
               ],
          },
          options: {
               responsive: true,
               scales: {
                    y: {
                         beginAtZero: true,
                    },
               },
          },
     });
</script>
<script>
     const masukKeluarData = {
        labels: ['Surat Masuk', 'Surat Keluar'], // Label kategori
        datasets: [{
            label: 'Jumlah Surat',
            data: [{{ $totalSuratMasuk }}, {{ $totalSuratKeluar }}], // Data dari backend
            backgroundColor: [
                'rgba(54, 162, 235, 0.6)', // Warna biru untuk Surat Masuk
                'rgba(255, 99, 132, 0.6)'  // Warna merah untuk Surat Keluar
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)', // Border biru untuk Surat Masuk
                'rgba(255, 99, 132, 1)'  // Border merah untuk Surat Keluar
            ],
            borderWidth: 1
        }]
    };

    // Konfigurasi untuk chart
    const masukKeluarConfig = {
        type: 'bar', // Tipe diagram batang
        data: masukKeluarData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false // Menyembunyikan legenda
                },
            },
            scales: {
                y: {
                    beginAtZero: true, // Mulai dari angka 0
                    title: {
                        display: true,
                        text: 'Jumlah Surat'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Jenis Surat'
                    }
                }
            }
        }
    };

    // Render chart
    const ctxMasukKeluar = document.getElementById('masukKeluarChart').getContext('2d');
    const masukKeluarChart = new Chart(ctxMasukKeluar, masukKeluarConfig);
</script>
@endsection
<style>
@media (max-width: 768px) {
            .row {
                justify-content: center;
            }
          }a
</style>