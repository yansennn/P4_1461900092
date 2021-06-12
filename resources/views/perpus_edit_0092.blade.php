<form action="{{ url('perpus_0092/' . $perpus_0092->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="patch">
    Id: <input type="text" name="id" value="{{ $perpus_0092->id }}"><br>
    Nama Pasien: <input type="text" name="judul" value="{{ $perpus_0092->judul }}"><br>
    Alamat: <input type="text" name="tahun_terbit" value="{{ $perpus_0092->tahun_terbit }}"><br>
    <button type="submit">Simpan</button>
</form>