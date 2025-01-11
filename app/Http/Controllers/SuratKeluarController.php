<?php

namespace App\Http\Controllers;

use App\Exports\SuratKeluarExport;
use App\Imports\SuratKeluarImport;
use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use PDF;
use Excel;
use Carbon\Carbon;

class SuratKeluarController extends Controller
{
     public function index(Request $request)
     {
          $query = SuratKeluar::query();

          // Filter berdasarkan nama
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

          $suratKeluar = $query->get();

          return view('suratkeluar.index', compact('suratKeluar'));
     }

     public function create()
     {
          return view('suratkeluar.create');
     }

     public function store(Request $request)
     {
          $request->validate([
               'nomor_surat' => 'required|string|max:255',
               'nama_surat' => 'required|string|max:255',
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
               'tanggal_surat' => 'required|date',
               'tanggal_retensi' => 'required|date',
               'retensi_expired' => 'required|boolean',
               'link' => 'required|string',
          ]);

          SuratKeluar::create($request->all());

          return redirect()->route('suratkeluar.index')->with('success', 'Surat Keluar berhasil ditambahkan.');
     }

     public function edit($id)
     {
          $suratKeluar = SuratKeluar::findOrFail($id);
          return view('suratkeluar.edit', compact('suratKeluar'));
     }

     public function update(Request $request, $id)
     {
          $suratKeluar = SuratKeluar::findOrFail($id);
          $suratKeluar->update($request->all());

          return redirect()->route('suratkeluar.index')->with('success', 'Surat Keluar berhasil diperbarui.');
     }

     public function destroy($id)
     {
          $suratKeluar = SuratKeluar::findOrFail($id);
          $suratKeluar->delete();

          return redirect()->route('suratkeluar.index')->with('success', 'Surat Keluar berhasil dihapus.');
     }

     public function export_PDF(Request $request)
     {
          $query = SuratKeluar::query();

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

          $suratKeluar = $query->get();

          // Load view and export to PDF
          $pdf = PDF::loadView('suratkeluar.export_surat_keluar_pdf', compact('suratKeluar'))->setPaper('a4', 'landscape');
          return $request->action === 'download' ? $pdf->download('surat_filtered.pdf') : $pdf->stream();
     }

     public function export_Excel(Request $request)
     {
          $query = SuratKeluar::query();

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

          $suratKeluar = $query->get();

          return Excel::download(new SuratKeluarExport($suratKeluar), 'surat_keluar.xlsx');
     }

     public function importForm()
     {
          return view('suratkeluar.import'); // create a view for the import form
     }

     public function import(Request $request)
     {
          $request->validate([
               'file' => 'required|mimes:xlsx,xls,csv|max:2048',
          ]);

          $file = $request->file('file');

          // Import the data
          Excel::import(new SuratKeluarImport, $file);

          return redirect()->route('suratkeluar.index')->with('success', 'Surat Keluar data has been imported successfully!');
     }
}
