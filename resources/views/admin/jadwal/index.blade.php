@extends('admin.layouts.App')
@section('container')

<center>
    <h1 style="font-family: Abhaya Libre ExtraBold">JADWAL</h1><hr>
</center>
@if($message = Session::get('berhasil'))
<div class="alert alert-success" role="alert">
    {{ session('berhasil') }}
  </div>
    @endif
    <div class="col-md-12 bg-white p-4">
        <a href="/admin/jadwal/create"><button class="btn btn-success mb-3">Tambah Jadwal</button></a>
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
                        {{ $jadwal->jam4 }}
                        </td>
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
@endsection