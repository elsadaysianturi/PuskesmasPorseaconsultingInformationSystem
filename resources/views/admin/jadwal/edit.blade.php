@extends('admin.layouts.App')
@section('container')

<center>
    <h3 style="font-family: Abhaya Libre ExtraBold">Edit Jadwal Operasional</h3><hr>
</center>
<div class="col-md-12 col-sm-8 bg-white p-4" >
    <form method="post" action="/admin/jadwal/{{ $jadwals->id }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- Hari --}}
  <label for="hari">Choose Day:  </label>
<select name="hari" id="hari">
    <option value="senin">Senin</option>
  <option value="selasa">Selasa</option>
  <option value="rabu">Rabu</option>
  <option value="kamis">Kamis</option>
  <option value="jumat">Jumat</option>
  <option value="sabtu">Sabtu</option><br>
  @error('hari')
   <div class="invalid-feedback">
    {{ $message }}
   </div>
   @enderror
  </div><br>
</select><br>
        {{-- jam --}}<br>
        <div class="form-group" >
            <label>Jam mulai</label>
            <input type="time" class="form-control @error('jam') is-invalid @enderror" name="jam" id="jam" placeholder="Judul artikel" required autofocus value="{{ old('jam', $jadwals->jam) }}">
            @error('jam')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div><br>
        {{-- jam2--}}
        <div class="form-group" >
            <label>Jam Istirahat</label>
            <input type="time" class="form-control @error('jam2') is-invalid @enderror" name="jam2" id="jam2" placeholder="Jam Istirahat" required autofocus value="{{ old('jam2', $jadwals->jam2) }}">
            @error('jam2')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div><br>
        {{-- jam4--}}
        <div class="form-group" >
            <label>Jam Selesai</label>
            <input type="time" class="form-control @error('jam4') is-invalid @enderror" name="jam4" id="jam4" placeholder="Jam Selesai" required autofocus value="{{ old('jam4', $jadwals->jam4) }}">
            @error('jam4')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div><br>
        {{-- jam3 --}}
        <div class="form-group" >
            <label>Jam Selesai</label>
            <input type="time" class="form-control @error('jam3') is-invalid @enderror" name="jam3" id="jam3" placeholder="Judul artikel" required autofocus value="{{ old('jam3', $jadwals->jam3) }}">
            @error('jam3')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div><br>
        <br>
        
        <br>
        <div class="form-group">

        <input type="submit" class="form-control btn btn-primary" style="background-color:MediumSeaGreen;" value="Simpan Perubahan">

    </div>
    </form>   
</div>



@endsection
 
