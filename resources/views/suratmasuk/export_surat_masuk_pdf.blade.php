<!DOCTYPE html>
<html>

<head>
     <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
     <style>
          table {
               width: 100%;
               border-collapse: collapse;
               font-size: 10px;
          }

          .table-bordered th,
          .table-bordered td {
               border: 1px solid #000;
               padding: 5px;
               text-align: center;
          }

          .table-bordered th {
               background-color: #f2f2f2;
               font-weight: bold;
          }

          .table-hover tbody tr:hover {
               background-color: #e9ecef;
          }

          .align-middle {
               vertical-align: middle !important;
          }

          .container {
               border-bottom: 2px solid black;
               padding: 0px;
          }

          .logo {
               float: left;
               margin-right: 20px;
          }

          .header {
               font-size: 18px;
          }

          .sub-header {
               font-size: 20px;
               font-weight: bold;
          }

          .address {
               font-size: 17px;
          }

          .contact {
               font-size: 17px;
          }

          .city {
               font-size: 17px;
          }

          .postal-code {
               font-size: 17px;
               text-align: right;
               margin-top: -20px;
          }
     </style>
</head>

<body>
     <center>
          <div class="container">
               <img alt="Logo of Jaya Raya" class="logo" height="100" src="assets/img/logo.png" width="100" />
               <div class="header">
                    PEMERINTAH PROVINSI DAERAH KHUSUS IBUKOTA JAKARTA
               </div>
               <div class="header">
                    DINAS KOMUNIKASI, INFORMATIKA, DAN STATISTIK
               </div>
               <div class="sub-header1">
                    <b>SUKU DINAS KOMUNIKASI, INFORMATIKA, DAN STATISTIK</b>
               </div>
               <div class="sub-header1">
                    <b>ADMINISTRASI JAKARTA TIMUR</b>
               </div>
               <div class="address">
                    Jalan Dr. Sumarno Pulogebang Gedung Blok B1 Lt.1 dan Lt.3
               </div>
               <div class="contact">
                    Telp/Fax : 021-4800509 Website : timur.jakarta.go.id Email : kominfotik@jakarta.go.id
               </div>
               <div class="city">
                    J A K A R T A
               </div>
               <div class="postal-code">
                    Kode Pos 13950
               </div>
          </div>
          <h2 style="text-align: center;">Data Surat Masuk</h2>
          <table class="table table-bordered table-hover mt-2">
               <thead>
                    <tr>
                         <th rowspan="2" class="align-middle text-center">No</th>
                         <th rowspan="2" class="align-middle text-center">BKU</th>
                         <th rowspan="2" class="align-middle text-center">No. Surat</th>
                         <th rowspan="2" class="align-middle text-center">Dari</th>
                         <th rowspan="2" class="align-middle text-center">Nama Surat</th>
                         <th rowspan="2" class="align-middle text-center">Keterangan</th>
                         <th rowspan="2" class="align-middle text-center">Kode Klasifikasi</th>
                         <th rowspan="2" class="align-middle text-center">Kurun Waktu</th>
                         <th rowspan="2" class="align-middle text-center">Tingkat Perkembangan</th>
                         <th rowspan="2" class="align-middle text-center">Jumlah</th>
                         <th colspan="2" class="text-center">Lokasi Simpan</th>
                         <th rowspan="2" class="align-middle text-center">Jangka Simpan & Nasib Akhir</th>
                         <th rowspan="2" class="align-middle text-center">Tanggal Surat</th>
                         <th rowspan="2" class="align-middle text-center">Tanggal Diterima</th>
                         <th rowspan="2" class="align-middle text-center">Status Retensi</th>
                         <th rowspan="2" class="align-middle text-center">Disposisi</th>
                         <th rowspan="2" class="align-middle text-center">Link</th>
                    </tr>
                    <tr>
                         <th class="text-center">No. Laci</th>
                         <th class="text-center">No. Folder</th>
                    </tr>
               </thead>
               <tbody>
                    @foreach ($suratMasuk as $index => $s)
                    <tr>
                         <td class="text-center">{{ $index + 1 }}</td>
                         <td class="text-center">{{ $s->bku }}</td>
                         <td class="text-left">{{ $s->nomor_surat }}</td>
                         <td class="text-left">{{ $s->dari }}</td>
                         <td>{{ $s->nama_surat }}</td>
                         <td>{{ $s->keterangan }}</td>
                         <td class="text-center">{{ $s->kode_klasifikasi }}</td>
                         <td class="text-center">{{ $s->kurun_waktu }}</td>
                         <td class="text-center">{{ $s->tingkat_perkembangan }}</td>
                         <td class="text-center">{{ $s->jumlah }}</td>
                         <td class="text-center">{{ $s->no_laci }}</td>
                         <td class="text-center">{{ $s->no_folder }}</td>
                         <td class="text-center">{{ $s->jangka_simpan }}</td>
                         <td class="text-center">{{ $s->tanggal_surat }}</td>
                         <td class="text-center">{{ $s->tanggal_diterima }}</td>
                         <td class="text-center">{{ $s->retensi_expired ? 'Habis' : 'Berlaku' }}</td>
                         <td class="text-center">{{ $s->disposisi }}</td>
                         <td class="text-center"><a href="{{ $s->link }}" target="_blank">Link</a></td>
                    </tr>
                    @endforeach
               </tbody>
          </table>

          <style>
               table {
                    margin-left: -10px;
               }
          </style>
</body>

</html>