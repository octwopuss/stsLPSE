@extends('guest.base')

@section('title', 'Buat Tiket Baru')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-block">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h1>Buat Tiket Baru</h1>
                <p>Tolong isi form berikut untuk membuat tiket baru.</p>
                <br>
                <form action="{{route('guestCreateTicket')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                  <label for="nama">Nama</label>
                  <input id="nama" name="nama" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="alamat">Alamat</label>
                  <input id="alamat" name="alamat" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="perusahaan">Nama Instansi/Perusahaan</label>
                  <input id="perusahaan" name="perusahaan" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="npwp">NPWP</label>
                  <input id="npwp" name="npwp" type="text" class="form-control" placeholder="Contoh: 99.999.999.9-999.999">
                </div>
                <div class="form-group col-md-4">
                  <label for="no_telp">No. Telpon</label>
                  <input id="no_telp" name="no_telp" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label for="hp">No. HP</label>
                  <input id="hp" name="hp" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label for="fax">No. Fax</label>
                  <input id="fax" name="fax" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label for="email">Email</label>
                  <input id="email" name="email" type="email" class="form-control" placeholder="Contoh: nama@contoh.com">
                </div>
                <div class="form-group col-md-4">
                  <label for="username_spse">Username SPSE</label>
                  <input id="username_spse" name="username_spse" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                  <label for="password_spse">Password SPSE</label>
                  <input id="password_spse" name="password_spse" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="nama_lelang">Nama Lelang</label>
                  <input id="nama_lelang" name="nama_lelang" type="text" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label for="kode_lelang">Kode Lelang</label>
                  <input id="kode_lelang" name="kode_lelang" type="text" class="form-control">
                </div>
                <div class="form-group col-md-12">
                  <label for="nama_satuan_kerja">Nama Satuan Kerja</label>
                  <input id="nama_satuan_kerja" name="nama_satuan_kerja" type="text" class="form-control">
                </div>
                <div class="form-group col-md-12">
                  <label for="subjek">Subjek</label>
                  <input id="subjek" name="subjek" type="text" class="form-control">
                </div>
                <div class="form-group col-md-12">
                  <label for="pesan">Pesan</label>
                  <textarea id="pesan" class="form-control" rows="5" name="pesan"> </textarea>
                </div>
                <div class="form-group col-md-4">
                  <label for="gambar">Lampiran Gambar atau Screenshot</label>
                  <input type="file" id="gambar" name="gambar[]" multiple class="form-control" accept="image/*">
                </div>
                <div class="form-group col-md-4">
                  <label>Kategori Masalah</label>
                  <select name="kategori_id" class="form-control">
                    @foreach($kategori as $kategori)
                      <option value="{{$kategori->id}}">{{$kategori->kategori}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="urgensi">Urgensi</label>
                  <select id="urgensi" name="urgensi" class="form-control">
                    <option value="Normal">Normal</option>
                    <option value="Penting">Penting</option>
                    <option value="Darurat">Darurat</option>
                  </select>
                </div>
                <br>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-primary col-md-3">Submit</button>
                </div>
              </form>

            </div>

        </div>
    </div>
@endsection
