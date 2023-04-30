@extends('admin.layouts.App')

@section('container')

<center>
 <h3 style="font-family: Abhaya Libre ExtraBold">Tambah Jadwal</h3>
 <hr>
</center>
<div class="col-md-12 col-sm-8 bg-white p-4">
 <form method="post" action="/admin/jadwal" enctype="multipart/form-data">
  @csrf
  {{-- Hari --}}
  <label for="hari">Choose Day:</label>
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
</select>  <br>
  {{-- jam --}}<br>
  <div class="form-group">
   <label>Jam mulai</label>
   <input type="time" class="form-control" name="jam" id="jam" placeholder="Jam Mulai" required autofocus>
  </div>
  <br>
  {{-- jam2 --}}
  <div class="form-group">
   <label>Jam Istirahat</label>
   <input type="time" class="form-control" name="jam2" id="jam2" placeholder="Jam Istirahat" required autofocus>
   <label>Jam selesai Istirahat</label>
   <input type="time" class="form-control" name="jam4" id="jam4" placeholder="Jam selesai" required autofocus>
  </div>
  <br>
  {{-- jam3 --}}
  <div class="form-group">
   <label>Jam selesai</label>
   <input type="time" class="form-control" name="jam3" id="jam3" placeholder="Jam Selesai" required autofocus>
  </div> <br>
  <div class="form-group">

   <input type="submit" class="form-control btn btn-primary" style="background-color:MediumSeaGreen;" value="Tambah">

  </div>
 </form>
</div>



@endsection