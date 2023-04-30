@extends('admin.layouts.App')
@section('container')

<center>
    <h3 style="font-family: Abhaya Libre ExtraBold">Edit Artikel</h3><hr>
</center>
<div class="col-md-12 col-sm-8 bg-white p-4" >
    <form method="post" action="/admin/struktur/{{ $struktur->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
        {{-- judul --}}
        <div class="form-group" >
            <label>Judul struktur</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul struktur" required autofocus value="{{ old('title', $struktur->title) }}">
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <br>
        <div class="col-md-12">
            <div class="form-group">
                <input type="file" name="image" placeholder="Choose image" id="image">
                @error('image')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <small>Input gambar jika ingin memperbarui</small>
        </div>
        <br>
        <div class="form-group">

        <input type="submit" class="form-control btn btn-primary" style="background-color:MediumSeaGreen;" value="Simpan Perubahan">

    </div>
    </form>   
</div>


@endsection
 
