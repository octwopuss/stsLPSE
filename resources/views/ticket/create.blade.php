@extends('layout.base')
@section('content')
<div class="row">
    <div class="main-header">
        <h4>Buat Tiket Laporan</h4>
    </div>
</div>
<div class="card">
  <div class="card-block">
    <div class="row">
      <form action="{{route('storeTicket')}}" method="POST">
      {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama</label>
          <input name="nama" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Alamat</label>
          <input name="alamat" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Perusahaan</label>
          <input name="perusahaan" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">NPWP</label>
          <input name="npwp" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">no_telp</label>
          <input name="no_telp" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">HP</label>
          <input name="hp" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Fax</label>
          <input name="fax" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Email</label>
          <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Username SPSE</label>
          <input name="username_spse" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Password SPSE</label>
          <input name="password_spse" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama Lelang</label>
          <input name="nama_lelang" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Kode Lelang</label>
          <input name="kode_lelang" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Nama Satuan Kerja</label>
          <input name="nama_satuan_kerja" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Subjek</label>
          <input name="subjek" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Pesan</label>
          <textarea class="form-control" rows="5" name="pesan"> </textarea>
        </div>
        <div class="form-group">
          <label>Kategori Masalah</label>
          <select name="kategori_id" class="form-control">
            @foreach($kategori as $kategori)
              <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
@stop
@section('AddScript')
<script type="text/javascript">
    function actnav() {
      var element = document.getElementById("create");
      element.classList.add("active");
    }
</script>
@stop