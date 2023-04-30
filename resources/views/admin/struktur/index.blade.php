@extends('admin.layouts.App')
@section('container')

<center>
    <h1 style="font-family: Abhaya Libre ExtraBold">STRUKTUR</h1><hr>
</center>
@if($message = Session::get('berhasil'))
<div class="alert alert-success" role="alert">
    {{ session('berhasil') }}
  </div>
    @endif
    <div class="col-md-12 bg-white p-4">
        <a href="/admin/struktur/create"><button class="btn btn-success mb-3">Tambah Stuktur</button></a>
        <table class="table table-responsive table-bordered table-hover table-stripped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    {{-- <th>Image</th> --}}
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($strukturs as $struktur)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $struktur->title }}</td>
                        {{-- <td><img src="/storage/{{$struktur->image}}" alt="" height='100px' width='150px'></td>--}}
                        <td>
                            {{-- edit --}}
                            <a href="/admin/struktur/{{ $struktur->id }}/edit">
                                <button class="btn btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </a>
                            {{-- delete  --}}
                            <form action="/admin/struktur/{{ $struktur->id }}" method="post" class="d-inline">
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
                Data Struktur  belum Tersedia.
            </div>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection