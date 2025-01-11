@extends('layouts.app')

@section('content')
<div class="container">
     <h1>Edit Surat</h1>

     <!-- Include the ID in the route and use POST with a PUT method override -->
     <form action="{{ route('suratmasuk.update', $suratMasuk->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row mb-3">
               <div class="col-md-6">
                    <label for="bku">BKU</label>
                    <input type="text" name="bku" class="form-control" value="{{ $suratMasuk->bku }}" placeholder="Masukkan BKU">
               </div>
               <div class="col-md-6">
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control" value="{{ $suratMasuk->nomor_surat }}" placeholder="Masukkan Nomor Surat" required>
               </div>
               <div class="col-md-6">
                    <label for="dari">Dari</label>
                    <input type="text" name="dari" class="form-control" value="{{ $suratMasuk->dari }}" placeholder="Masukkan Dari Surat" required>
               </div>
          </div>

          <div class="row mb-3">
               <div class="col-md-6">
                    <label for="nama_surat">Nama Surat</label>
                    <input type="text" name="nama_surat" class="form-control" value="{{ $suratMasuk->nama_surat }}" placeholder="Masukkan Nama Surat" required>
               </div>
               <div class="col-md-6">
                    <label for="nama_surat">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" value="{{ $suratMasuk->keterangan }}" placeholder="Masukkan Keterangan Surat" required>
               </div>
               <div class="col-md-6">
                    <label for="kode_klasifikasi">Kode Klasifikasi</label>
                    <input type="text" name="kode_klasifikasi" class="form-control" value="{{ $suratMasuk->kode_klasifikasi }}" placeholder="Masukkan Kode Klasifikasi" required>
               </div>
          </div>

          <div class="row mb-3">
               <div class="col-md-6">
                    <label for="kurun_waktu">Kurun Waktu</label>
                    <input type="text" name="kurun_waktu" class="form-control" value="{{ $suratMasuk->kurun_waktu }}" placeholder="Masukkan Kurun Waktu" required>
               </div>
               <div class="col-md-6">
                    <label for="tingkat_perkembangan">Tingkat Perkembangan</label>
                    <input type="text" name="tingkat_perkembangan" class="form-control" value="{{ $suratMasuk->tingkat_perkembangan }}" placeholder="Masukkan Tingkat Perkembangan" required>
               </div>
          </div>

          <div class="row mb-3">
               <div class="col-md-6">
                    <label for="jumlah">Jumlah</label>
                    <input type="name" name="jumlah" class="form-control" value="{{ $suratMasuk->jumlah }}" placeholder="Masukkan Jumlah" required>
               </div>
               <div class="col-md-6">
                    <label for="no_filling_cabinet">No. Filling Cabinet</label>
                    <input type="text" name="no_filling_cabinet" class="form-control" value="{{ $suratMasuk->no_filling_cabinet }}" placeholder="Masukkan No. Filling Cabinet" required>
               </div>
          </div>

          <div class="row mb-3">
               <div class="col-md-6">
                    <label for="no_laci">No. Laci</label>
                    <input type="text" name="no_laci" class="form-control" value="{{ $suratMasuk->no_laci }}" placeholder="Masukkan No. Laci" required>
               </div>
               <div class="col-md-6">
                    <label for="no_folder">No. Folder</label>
                    <input type="text" name="no_folder" class="form-control" value="{{ $suratMasuk->no_folder }}" placeholder="Masukkan No. Folder" required>
               </div>
          </div>

          <div class="row mb-3">
               <div class="col-md-3">
                    <label for="keterangan_biasa">Keterangan (Biasa)</label>
                    <select name="keterangan_biasa" class="form-control">
                         <option value="-" enable>-</option>
                         <option value="iya">Iya</option>
                         <option value="-">-</option>
                    </select>
               </div>
               <div class="col-md-3">
                    <label for="keterangan_terbatas">Keterangan (Terbatas)</label>
                    <select name="keterangan_terbatas" class="form-control">
                         <option value="-" enable>-</option>
                         <option value="iya">Iya</option>
                         <option value="-">-</option>
                    </select>
               </div>
               <div class="col-md-3">
                    <label for="keterangan_rahasia">Keterangan (Rahasia)</label>
                    <select name="keterangan_rahasia" class="form-control">
                         <option value="-" enable>-</option>
                         <option value="iya">Iya</option>
                         <option value="-">-</option>
                    </select>
               </div>
               <div class="col-md-3">
                    <label for="keterangan_sangat_rahasia">Keterangan (Sangat Rahasia)</label>
                    <select name="keterangan_sangat_rahasia" class="form-control">
                         <option value="-" enable>-</option>
                         <option value="iya">Iya</option>
                         <option value="-">-</option>
                    </select>
               </div>
          </div>

          <div class="row mb-3">
               <div class="col-md-6">
                    <label for="jangka_simpan">Jangka Simpan & Nasib Akhir</label>
                    <input type="text" name="jangka_simpan" class="form-control" value="{{ $suratMasuk->jangka_simpan }}" placeholder="Masukkan Jangka Simpan & Nasib Akhir" required>
               </div>
               <div class="col-md-6">
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" class="form-control" value="{{ $suratMasuk->tanggal_surat }}" required>
               </div>
          </div>

          <div class="row mb-3">
               <div class="col-md-6">
                    <label for="tanggal_retensi">Tanggal Diterima</label>
                    <input type="date" name="tanggal_diterima" class="form-control" value="{{ $suratMasuk->tanggal_diterima }}" required>
                    <label for="tanggal_retensi">Tanggal Retensi</label>
                    <input type="date" name="tanggal_retensi" class="form-control" value="{{ $suratMasuk->tanggal_retensi }}" required>
               </div>
               <div class="col-md-3">
                    <label for="disposisi">Disposisi</label>
                    <select name="disposisi" class="form-control">
                         <option value="-" enable>-</option>
                         <option value="TU">TU</option>
                         <option value="ASTIK">ASTIK</option>
                         <option value="KIP">KIP</option>
                         <option value="ID">ID</option>
                    </select>
               </div>
               <div class="row mb-3">
                    <div class="col-md-6">
                         <label for="link">Link Google Drive</label>
                         <input type="text" name="link" class="form-control" value="{{ $suratMasuk->link }}" placeholder="Link surat" required>
                    </div>
                    <div class="col-md-6">
                         <label for="retensi_expired">Status Retensi</label>
                         <select name="retensi_expired" class="form-control">
                              <option value="0" {{ $suratMasuk->retensi_expired == 0 ? 'selected' : '' }}>Masih Berlaku</option>
                              <option value="1" {{ $suratMasuk->retensi_expired == 1 ? 'selected' : '' }}>Sudah Habis</option>
                         </select>
                    </div>
               </div>

               <!-- Tombol Simpan -->
               <div class="row">
                    <div class="col-md-12 text-right">
                         <button type="submit" class="btn btn-success">
                              <i class="fas fa-save"></i> Simpan Surat
                         </button>
                    </div>
               </div>
     </form>
</div>
@endsection