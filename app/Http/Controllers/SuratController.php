<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use App\Exports\SuratExport;
use Excel;
use PDF;
use App\Exports\SuratsExport;
use Carbon\Carbon;



class SuratController extends Controller
{
    // Fungsi untuk menampilkan daftar surat dengan filter pencarian
    public function index(Request $request)
    {
        $query = Surat::query();

        // Filter by name, date, classification code, and retention status
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
            if ($request->status_retensi === 'habis') {
                $query->where('retensi_expired', true);
            } elseif ($request->status_retensi === 'berlaku') {
                $query->where('retensi_expired', false);
            }
        }

        $surat = $query->get();
        return view('surat.index', compact('surat'));
    }

    public function create()
    {
        return view('surat.create');
    }

    // Fungsi untuk menyimpan surat baru
    public function store(Request $request)
    {
        // Validate the input data
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

        // Store the surat data into the database
        Surat::create($request->all());

        // Redirect back with a success message
        return redirect()->route('surat.index')->with('success', 'Surat berhasil ditambahkan.');
    }

    // Fungsi untuk menampilkan form edit surat
    public function edit($id)
    {
        $surat = Surat::findOrFail($id);

        return view('surat.edit', compact('surat'));
    }

    // Fungsi untuk memperbarui surat yang sudah ada
    public function update(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);

        // Update fields
        $surat->nama_surat = $request->nama_surat;
        $surat->kode_klasifikasi = $request->kode_klasifikasi;
        $surat->kurun_waktu = $request->kurun_waktu;
        $surat->tingkat_perkembangan = $request->tingkat_perkembangan;
        $surat->jumlah = $request->jumlah;
        $surat->no_filling_cabinet = $request->no_filling_cabinet;
        $surat->no_laci = $request->no_laci;
        $surat->no_folder = $request->no_folder;
        $surat->keterangan_biasa = $request->keterangan_biasa;
        $surat->keterangan_terbatas = $request->keterangan_terbatas;
        $surat->keterangan_rahasia = $request->keterangan_rahasia;
        $surat->keterangan_sangat_rahasia = $request->keterangan_sangat_rahasia;
        $surat->jangka_simpan = $request->jangka_simpan;
        $surat->tanggal_surat = $request->tanggal_surat;
        $surat->tanggal_retensi = $request->tanggal_retensi;
        $surat->retensi_expired = (int) $request->retensi_expired;
        $surat->link = $request->link;

        // Save the updated surat
        $surat->save();

        return redirect()->route('surat.index')->with('success', 'Surat updated successfully.');
    }


    // Fungsi untuk menghapus surat
    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Surat berhasil dihapus.');
    }

    // Fungsi untuk menampilkan detail surat
    public function show($id)
    {
        $surat = Surat::findOrFail($id);

        return view('surat.show', compact('surat'));
    }

    // Fungsi untuk mengekspor data surat ke file PDF
    public function export_PDF(Request $request)
    {
        $query = Surat::query();

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

        $surat = $query->get();

        // Load view and export to PDF
        $pdf = PDF::loadView('surat.export_pdf', compact('surat'))->setPaper('a4', 'landscape');
        return $request->action === 'download' ? $pdf->download('Daftar_Surat.pdf') : $pdf->stream();
    }

    public function export_Excel(Request $request)
    {
        $query = Surat::query();

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

        $surat = $query->get();

        return Excel::download(new SuratsExport($surat), 'Daftar_Surat.xlsx');
    }
}
