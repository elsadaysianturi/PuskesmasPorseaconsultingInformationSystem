@extends('admin.layouts.App')

@section('container')

<center>
    <h3 style="font-family: Abhaya Libre ExtraBold">Tambah struktur</h3><hr>
</center>
<div class="col-md-12 col-sm-8 bg-white p-4" >
    <form method="post" action="/admin/struktur" enctype="multipart/form-data" >
    @csrf
        {{-- judul --}}
        <div class="form-group" >
            <label>Judul struktur</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul struktur" required autofocus value="{{ old('title') }}">
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
        </div>
        <br>
        <div class="form-group">

            <input type="submit" class="form-control btn btn-primary" style="background-color:MediumSeaGreen;" value="Tambah">

        </div>
    </form>   
</div>



@endsection
 
