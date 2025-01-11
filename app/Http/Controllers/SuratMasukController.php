<?php

namespace App\Http\Controllers;

use ZipArchive;
use App\Exports\SuratMasukExport;
use App\Imports\SuratMasukImport;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use PDF;
use Excel;
use Carbon\Carbon;

class SuratMasukController extends Controller
{
     public function index(Request $request)
     {
          $query = SuratMasuk::query();

          if ($request->filled('nama')) {
               $query->where('nama_surat', 'like', '%' . $request->nama . '%');
          }

          // Filter berdasarkan tanggal
          if ($request->filled('tanggal')) {
               $query->whereDate('tanggal_surat', $request->tanggal);
          }

          // Filter berdasarkan kode klasifikasi
          if ($request->filled('kode_klasifikasi')) {
               $query->where('kode_klasifikasi', $request->kode_klasifikasi);
          }

          // Filter berdasarkan status retensi
          if ($request->filled('status_retensi')) {
               if ($request->status_retensi === 'habis') {
                    $query->where('retensi_expired', true);
               } elseif ($request->status_retensi === 'berlaku') {
                    $query->where('retensi_expired', false);
               }
          }

          // Filter berdasarkan disposisi
          if ($request->filled('disposisi')) {
               $query->where('disposisi', $request->disposisi);
          }

          $suratMasuk = $query->get();

          return view('suratmasuk.index', compact('suratMasuk'));
     }

     public function create()
     {
          return view('suratmasuk.create');
     }

     public function store(Request $request)
     {
          $request->validate([
               'nomor_surat' => 'required|string|max:255',
               'nama_surat' => 'required|string|max:255',
               'tanggal_surat' => 'required|date',
               'tanggal_diterima' => 'required|date',
               'kode_klasifikasi' => 'required|string|max:255',
               'kurun_waktu' => 'required|string|max:255',
               'tingkat_perkembangan' => 'required|string|max:255',
               'jumlah' => 'required|integer',
               'no_filling_cabinet' => 'required|string|max:255',
               'no_laci' => 'required|string|max:255',
               'no_folder' => 'required|string|max:255',
               'keterangan_biasa' => 'required|string',
               'keterangan_terbatas' => 'required|string',
               'keterangan_rahasia' => 'required|string',
               'keterangan_sangat_rahasia' => 'required|string',
               'jangka_simpan' => 'required|string|max:255',
               'tanggal_retensi' => 'required|date',
               'retensi_expired' => 'required|boolean',
               'link' => 'required|string'
          ]);

          SuratMasuk::create($request->all());

          return redirect()->route('suratmasuk.index')->with('success', 'Surat Masuk berhasil ditambahkan.');
     }

     public function edit($id)
     {
          $suratMasuk = SuratMasuk::findOrFail($id);
          return view('suratmasuk.edit', compact('suratMasuk'));
     }

     public function update(Request $request, $id)
     {
          $suratMasuk = SuratMasuk::findOrFail($id);

          $suratMasuk->update($request->all());

          return redirect()->route('suratmasuk.index')->with('success', 'Surat Masuk berhasil diperbarui.');
     }

     public function destroy($id)
     {
          $suratMasuk = SuratMasuk::findOrFail($id);
          $suratMasuk->delete();

          return redirect()->route('suratmasuk.index')->with('success', 'Surat Masuk berhasil dihapus.');
     }

     public function export_PDF(Request $request)
     {
          $query = SuratMasuk::query();

          // Apply filters
          if ($request->filled('nama')) {
               $query->where('nama_surat', 'like', '%' . $request->nama . '%');
          }
          if ($request->filled('tanggal')) {
               $query->whereDate('tanggal_surat', $request->tanggal);
          }
          if ($request->filled('kode_klasifikasi')) {
               $query->where('kode_klasifikasi', 'like', '%' . $request->kode_klasifikasi . '%');
          }
          if ($request->filled('status_retensi')) {
               $query->where('retensi_expired', $request->status_retensi === 'habis');
          }

          if ($request->filled('disposisi')) {
               $query->where('disposisi', 'like', '%' . $request->disposisi . '%');
          }

          $suratMasuk = $query->get();

          // Load view and export to PDF
          $pdf = PDF::loadView('suratmasuk.export_surat_masuk_pdf', compact('suratMasuk'))->setPaper('a4', 'landscape');
          return $request->action === 'download' ? $pdf->download('surat_filtered.pdf') : $pdf->stream();
     }

     public function export_Excel(Request $request)
     {
          $query = SuratMasuk::query();

          // Apply filters
          if ($request->filled('nama')) {
               $query->where('nama_surat', 'like', '%' . $request->nama . '%');
          }
          if ($request->filled('tanggal')) {
               $query->whereDate('tanggal_surat', $request->tanggal);
          }
          if ($request->filled('kode_klasifikasi')) {
               $query->where('kode_klasifikasi', 'like', '%' . $request->kode_klasifikasi . '%');
          }
          if ($request->filled('status_retensi')) {
               $query->where('retensi_expired', $request->status_retensi === 'habis');
          }

          if ($request->filled('disposisi')) {
               $query->where('disposisi', 'like', '%' . $request->disposisi . '%');
          }

          $suratMasuk = $query->get();

          return Excel::download(new SuratMasukExport($suratMasuk), 'surat_masuk.xlsx');
     }

     public function importForm()
     {
          return view('suratmasuk.import'); // create a view for the import form
     }

     public function import(Request $request)
     {
          $request->validate([
               'file' => 'required|mimes:xlsx,xls,csv|max:2048',
          ]);

          $file = $request->file('file');

          // Import the data
          Excel::import(new SuratMasukImport, $file);

          return redirect()->route('suratmasuk.index')->with('success', 'Surat Masuk data has been imported successfully!');
     }
}
