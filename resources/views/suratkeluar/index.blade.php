@extends('layouts.app')

@section('content')
<div class="container">
     <center>
          <h1><b>Surat Keluar</b></h1>
     </center>
     <!-- Form Pencarian -->
     <form action="{{ route('suratkeluar.store') }}" method="GET">
          <div class="row mb-4">
               <div class="col-md-2">
                    <input type="text" name="nama" class="form-control" placeholder="Cari nama surat">
               </div>
               <div class="col-md-2">
                    <input type="date" name="tanggal" class="form-control" placeholder="Cari tanggal">
               </div>
               <div class="col-md-2">
                    <input type="text" name="kode_klasifikasi" class="form-control" placeholder="Cari kode klasifikasi">
               </div>
               <div class="col-md-2">
                    <select name="status_retensi" class="form-control">
                         <option value="">Semua Status Retensi</option>
                         <option value="habis">Sudah Habis</option>
                         <option value="berlaku">Masih Berlaku</option>
                    </select>
               </div>
          </div>
          <div class="row mb-3">
               <div class="col-md-12 text-left">
                    <button type="submit" class="btn btn-primary">
                         <i class="fas fa-search"></i> Cari Surat
                    </button>
               </div>
          </div>
     </form>

     <div class="d-flex flex-wrap gap-2 mb-3">
          <a href="{{ route('suratkeluar.create') }}" class="btn btn-success">
               <i class="fas fa-plus"></i> Tambah Surat
          </a>

          <a href="{{ route('suratkeluar.export_surat_keluar_pdf', array_merge(request()->all(), ['action' => 'download'])) }}" class="btn btn-danger">
               <i class="fas fa-file-pdf"></i> Export to PDF
          </a>

          <a href="{{ route('suratkeluar.export_keluar_excel', array_merge(request()->all(), ['action' => 'download'])) }}" class="btn btn-success">
               <i class="fas fa-file-excel"></i> Export to Excel
          </a>


          <a href="{{ route('suratkeluar.export_surat_keluar_pdf', array_merge(request()->all(), ['action' => 'preview'])) }}" class="btn btn-dark">
               <i class="fa-solid fa-eye"></i> Preview PDF
          </a>
     </div>

     <div class="container">
          <form action="{{ route('suratkeluar.import') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                    <input type="file" name="file" class="form-control" required">
               </div>
               <button type="submit" class="btn btn-primary">Import</button>
          </form>
     </div>

     <!-- Scrollable & Sticky Table -->
     <div class="table-responsive" style="overflow-x: auto; max-height: 500px;">
          <table class="table table-bordered table-hover mt-3">
               <thead class="thead">
                    <tr>
                         <th rowspan="2" class="align-middle text-center sticky">No</th>
                         <th rowspan="2" class="align-middle text-center sticky">BKU</th>
                         <th rowspan="2" class="align-middle text-center sticky">No. Surat</th>
                         <th rowspan="2" class="align-middle text-center sticky">Nama Surat</th>
                         <th rowspan="2" class="align-middle text-center sticky">Kode Klasifikasi</th>
                         <th rowspan="2" class="align-middle text-center sticky">Kurun Waktu</th>
                         <th rowspan="2" class="align-middle text-center sticky">Tingkat Perkembangan</th>
                         <th rowspan="2" class="align-middle text-center sticky">Jumlah</th>
                         <th rowspan="2" class="align-middle text-center sticky">No. Filling Cabinet</th>
                         <th colspan="2" class="align-middle text-center sticky">Lokasi Simpan</th>
                         <th colspan="4" class="align-middle text-center sticky">Keterangan (SKKAD)</th>
                         <th rowspan="2" class="align-middle text-center sticky">Jangka Simpan & Nasib Akhir</th>
                         <th rowspan="2" class="align-middle text-center sticky">Tanggal Surat</th>
                         <th rowspan="2" class="align-middle text-center sticky">Tanggal Retensi</th>
                         <th rowspan="2" class="align-middle text-center sticky">Status Retensi</th>
                         <th rowspan="2" class="align-middle text-center sticky">Link Google Drive </th>
                         <th rowspan="2" class="align-middle text-center sticky">Aksi</th>
                    </tr>
                    <tr>
                         <th class="align-middle text-center sticky">No. Laci</th>
                         <th class="align-middle text-center sticky">No. Folder</th>
                         <th class="align-middle text-center sticky">Biasa</th>
                         <th class="align-middle text-center sticky">Terbatas</th>
                         <th class="align-middle text-center sticky">Rahasia</th>
                         <th class="align-middle text-center sticky">Sangat Rahasia</th>
                    </tr>
               </thead>
               <tbody>
                    @foreach ($suratKeluar as $s)
                    <tr>
                         <td class="text-center">{{ $loop->iteration }}</td>
                         <td class="text-center">{{ $s->bku }}</td>
                         <td class="text-center">{{ $s->nomor_surat }}</td>
                         <td>{{ $s->nama_surat }}</td>
                         <td class="text-center">{{ $s->kode_klasifikasi }}</td>
                         <td class="text-center">{{ $s->kurun_waktu }}</td>
                         <td class="text-center">{{ $s->tingkat_perkembangan }}</td>
                         <td class="text-center">{{ $s->jumlah }}</td>
                         <td class="text-center">{{ $s->no_filling_cabinet }}</td>
                         <td class="text-center">{{ $s->no_laci }}</td>
                         <td class="text-center">{{ $s->no_folder }}</td>
                         <td class="text-center">{{ $s->keterangan_biasa }}</td>
                         <td class="text-center">{{ $s->keterangan_terbatas }}</td>
                         <td class="text-center">{{ $s->keterangan_rahasia }}</td>
                         <td class="text-center">{{ $s->keterangan_sangat_rahasia }}</td>
                         <td class="text-center">{{ $s->jangka_simpan }}</td>
                         <td class="text-center">{{ $s->tanggal_surat }}</td>
                         <td class="text-center">{{ $s->tanggal_retensi }}</td>
                         <td class="text-center">{{ $s->retensi_expired ? 'Sudah Habis' : 'Masih Berlaku' }}</td>
                         <td class="text-center"><a href="{{ $s->link }}" target="_blank">{{ $s->link }}</a></td>
                         <td class="text-center">
                              <a href="{{ route('suratkeluar.edit', $s->id) }}" class="btn btn-warning btn-sm" title="Edit Surat">
                                   <i class="fas fa-edit"></i>
                              </a>
                              <form action="{{ route('suratkeluar.destroy', $s->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?');">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger btn-sm" title="Hapus Surat">
                                        <i class="fas fa-trash"></i>
                                   </button>
                              </form>
                         </td>
                    </tr>
                    @endforeach
               </tbody>
          </table>
     </div>
</div>
@endsection

<style>
     .sticky-top {
          position: sticky;
          top: 0;
          background-color: #343a40;
          color: #fff;
          z-index: 1020;
     }

     .thead {
          background-color: #01e9fa;
          color: black;
     }

     th {
          font-weight: normal;
     }

     .form-group {
          width: 50%;
     }
</style>