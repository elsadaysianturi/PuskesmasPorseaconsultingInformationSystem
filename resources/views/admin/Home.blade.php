
@extends('admin.layouts.App')

@section('container')
    <!-- Beranda Start -->
    <div class="container">
    <p style="color:black">
        Pelayanan Puskesmas porsea dimasa pandemi,tidak jarang memicu kepadatan pasien yang melanggar prosedur kesehatan yang berlaku.
        fasilitas pelayanan kesehatan yang menyelenggarakan upaya kesehatan masyarakat dan upaya kesehatan perseorangan tingkat pertama, dengan lebih mengutamakan upaya promotif dan preventif, untuk mencapai derajat kesehatan masyarakat yang setinggi-tingginya.Upaya kesehatan tersebut diselenggarakan dengan menitikberatkan kepada pelayanan untuk masyarakat luas guna mencapai derajat kesehatan yang optimal, tanpa mengabaikan mutu pelayanan kepada perorangan. Puskesmas dipimpin oleh seorang kepala Puskesmas yang bertanggung jawab kepada Dinas Kesehatan Kabupaten/Kota.

    </p>
    </div>
<!-- Beranda End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="d-flex flex-column">
                    <h1>STRUKTUR ORGANISASI PUSKESMAS PORSEA</h1>
                    <a href="/admin/struktur"><button class="btn btn-success mb-3">Tambah Stuktur</button></a>
                    <br>

                    <img src="{{asset('img/organisasi.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
               <h1 class="mb-4">JADWAL KERJA PUSKESMAS PORSEA</h1>
               <a href="/admin/jadwal/create"><button class="btn btn-success mb-3">Tambah Jadwal</button></a><br>
               <table class="table table-responsive table-bordered table-hover table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Istirahat</th>
                    <th>Jam Selesai</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($jadwal as $jadwal)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jadwal->hari }}</td>
                        <td>{{ $jadwal->jam }}</td>
                        <td>{{ $jadwal->jam2 }} -
                        {{ $jadwal->jam4 }}</td>
                        <td>{{ $jadwal->jam3 }}</td>

                        <td> 
                            {{-- edit --}}
                            <a href="/admin/jadwal/{{ $jadwal->id }}/edit">
                                <button class="btn btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </a>
                            {{-- delete  --}}
                            <form action="/admin/jadwal/{{ $jadwal->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            
                                    <button class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                            </form>
                            
                        </td>
                    </tr>
                    @empty
            <div class="alert alert-danger">
                Data Jadwal  belum Tersedia.
            </div>
            @endforelse
            </tbody>
        </table>

            </div>
        </div>
    </div>
</div>
<!-- About End -->

@endsection