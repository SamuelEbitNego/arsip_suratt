# Metode Pengembangan Perangkat Lunak

Dalam pengembangan Aplikasi SIMASKUS, metode yang digunakan adalah Model Waterfall. Model ini dipilih karena memberikan pendekatan yang sistematis dan berurutan dalam pengembangan perangkat lunak. Setiap tahap dalam Waterfall harus diselesaikan sebelum melanjutkan ke tahap berikutnya, yang memungkinkan pengembangan yang terstruktur dan dokumentasi yang baik.

## Teknologi dan Bahasa Pemrograman

Dalam pengembangan SIMASKUS, digunakan berbagai teknologi modern yang mendukung pembangunan sistem yang handal:

### Backend Development
- **PHP 8.0**: Bahasa pemrograman utama untuk pengembangan backend
- **Laravel 9.0**: Framework PHP yang digunakan untuk struktur aplikasi
- **MySQL 8.0**: Sistem manajemen basis data untuk penyimpanan data
- **Composer**: Package manager untuk mengelola dependensi PHP
- **Apache**: Web server untuk hosting aplikasi

### Frontend Development
- **HTML5**: Markup language untuk struktur halaman web
- **CSS3**: Styling language untuk desain antarmuka
- **JavaScript**: Bahasa pemrograman untuk interaktivitas client-side
- **Bootstrap 5**: Framework CSS untuk responsive design
- **jQuery**: Library JavaScript untuk manipulasi DOM dan AJAX

### Development Tools
- **Git**: Sistem kontrol versi untuk manajemen kode
- **Visual Studio Code**: IDE untuk pengembangan
- **XAMPP**: Package development environment
- **PhpMyAdmin**: Tool untuk manajemen database MySQL

## Tahapan Model Waterfall

### 1. Analisis Kebutuhan (Requirements Analysis)

Pada tahap ini, dilakukan pengumpulan kebutuhan secara lengkap untuk menganalisis dan mendokumentasikan kebutuhan sistem. Proses ini meliputi:

- Observasi sistem pengarsipan surat yang berjalan
- Wawancara dengan pengguna dan stakeholder
- Identifikasi masalah dalam sistem manual
- Analisis kebutuhan fungsional dan non-fungsional
- Dokumentasi hasil analisis kebutuhan

Hasil dari tahap ini adalah spesifikasi kebutuhan perangkat lunak yang detail, mencakup semua fitur dan fungsi yang diperlukan dalam SIMASKUS.

### 2. Desain Sistem (System Design)

Setelah analisis kebutuhan selesai, tahap selanjutnya adalah desain sistem. Tahap ini mentranslasikan kebutuhan perangkat lunak ke dalam representasi desain yang akan diimplementasikan. Aktivitas dalam tahap ini meliputi:

- Perancangan arsitektur sistem
- Desain database dan struktur data
- Perancangan antarmuka pengguna (UI/UX)
- Desain alur kerja sistem
- Pembuatan diagram UML (Use Case, Class Diagram, dll)

### 3. Implementasi (Implementation)

Pada tahap ini, desain sistem diterjemahkan ke dalam kode program. Proses implementasi meliputi:

- Pengembangan basis data menggunakan MySQL
- Pemrograman backend menggunakan framework Laravel
- Pengembangan frontend dengan Bootstrap
- Implementasi fitur-fitur sesuai spesifikasi
- Penerapan sistem keamanan dan validasi

### 4. Pengujian (Testing)

Setelah implementasi selesai, dilakukan serangkaian pengujian untuk memastikan sistem berfungsi sesuai kebutuhan. Tahap pengujian mencakup:

- Unit Testing untuk menguji komponen individual
- Integration Testing untuk menguji integrasi antar komponen
- System Testing untuk menguji sistem secara keseluruhan
- User Acceptance Testing (UAT)
- Pengujian keamanan dan performa

### 5. Deployment

Setelah pengujian selesai dan sistem dinyatakan layak, tahap selanjutnya adalah deployment ke lingkungan produksi:

- Persiapan server dan infrastruktur
- Instalasi dan konfigurasi sistem
- Migrasi data (jika ada)
- Dokumentasi sistem
- Pelatihan pengguna

### 6. Pemeliharaan (Maintenance)

Tahap terakhir adalah pemeliharaan sistem yang sudah berjalan:

- Monitoring performa sistem
- Perbaikan bug yang ditemukan
- Pembaruan sistem sesuai kebutuhan
- Backup data regular
- Dukungan teknis kepada pengguna

## Kelebihan Penggunaan Model Waterfall

1. **Struktur yang Jelas**
   - Tahapan pengembangan yang terstruktur dan berurutan
   - Dokumentasi yang lengkap di setiap tahap
   - Mudah dalam monitoring progress

2. **Manajemen yang Baik**
   - Estimasi waktu dan biaya yang lebih akurat
   - Pembagian tugas yang jelas
   - Kontrol kualitas yang lebih baik

3. **Kesesuaian dengan Proyek**
   - Cocok untuk proyek dengan requirement yang jelas
   - Ideal untuk sistem yang membutuhkan reliabilitas tinggi
   - Sesuai untuk pengembangan sistem yang terstruktur

Model Waterfall dipilih dalam pengembangan SIMASKUS karena kebutuhan sistem yang sudah jelas dan terstruktur, serta pentingnya dokumentasi yang lengkap untuk sistem pengarsipan. Pendekatan sistematis ini memastikan bahwa setiap aspek pengembangan dapat direncanakan dan dieksekusi dengan baik, menghasilkan sistem yang handal dan sesuai dengan kebutuhan pengguna.

# BAB II PROJECT REPORT

## 2.1. Metode Pengembangan Perangkat Lunak

Dalam pengembangan Sistem Informasi Manajemen Arsip Surat (SIMASKU), metode yang digunakan adalah Waterfall. Metode Waterfall dipilih karena:

1. Requirement sistem sudah jelas dan tidak berubah-ubah
2. Definisi sistem bersifat stabil
3. Teknologi yang digunakan sudah dipahami
4. Tidak ada persyaratan yang ambiguous
5. Sumber daya teknis yang dibutuhkan tersedia

Metode Waterfall memiliki tahapan yang berurutan dan sistematis, dimana setiap tahap harus diselesaikan sebelum melanjutkan ke tahap berikutnya.

## 2.2. Tahap Pengembangan Perangkat Lunak

### Tabel 2.1 Tahap Analisis
| No | Kegiatan | Output | Durasi |
|----|----------|---------|---------|
| 1 | Pengumpulan kebutuhan sistem | Dokumen requirement | 1 minggu |
| 2 | Analisis proses bisnis | Flowchart sistem | 3 hari |
| 3 | Analisis kebutuhan fungsional | Daftar fitur sistem | 2 hari |
| 4 | Analisis kebutuhan non-fungsional | Spesifikasi sistem | 2 hari |

### Tabel 2.2 Tahap Desain 
| No | Kegiatan | Output | Durasi |
|----|----------|---------|---------|
| 1 | Desain database | ERD dan struktur tabel | 1 minggu |
| 2 | Desain interface | Wireframe UI/UX | 1 minggu |
| 3 | Desain arsitektur sistem | Diagram arsitektur | 3 hari |
| 4 | Desain API | Dokumentasi API | 3 hari |

### Tabel 2.3 Tahap Implementasi
| No | Kegiatan | Output | Durasi |
|----|----------|---------|---------|
| 1 | Setup development environment | Konfigurasi server & tools | 2 hari |
| 2 | Implementasi database | Database MySQL | 3 hari |
| 3 | Implementasi backend | REST API Laravel | 2 minggu |
| 4 | Implementasi frontend | Interface Bootstrap | 2 minggu |
| 5 | Implementasi fitur autentikasi | Sistem login/register | 3 hari |
| 6 | Implementasi manajemen surat | CRUD surat masuk/keluar | 1 minggu |
| 7 | Implementasi disposisi | Sistem disposisi | 4 hari |
| 8 | Implementasi laporan | Generate laporan PDF/Excel | 3 hari |

### Tabel 2.4 Tahap Pengujian
| No | Kegiatan | Output | Durasi |
|----|----------|---------|---------|
| 1 | Unit testing | Test report backend | 4 hari |
| 2 | Integration testing | Test report API | 3 hari |
| 3 | System testing | Test report sistem | 5 hari |
| 4 | User acceptance testing | Feedback pengguna | 3 hari |

### Tabel 2.5 Tahap Deployment
| No | Kegiatan | Output | Durasi |
|----|----------|---------|---------|
| 1 | Setup production server | Server yang terkonfigurasi | 2 hari |
| 2 | Deployment aplikasi | Aplikasi live | 1 hari |
| 3 | Migrasi database | Database production | 1 hari |
| 4 | Monitoring sistem | Log monitoring | 3 hari |

### Tabel 2.6 Tahap Maintenance
| No | Kegiatan | Output | Durasi |
|----|----------|---------|---------|
| 1 | Backup rutin | File backup | Ongoing |
| 2 | Pemantauan performa | Performance report | Ongoing |
| 3 | Perbaikan bug | Bug fixes | Sesuai kebutuhan |
| 4 | Update sistem | Versi terbaru | Sesuai kebutuhan |
