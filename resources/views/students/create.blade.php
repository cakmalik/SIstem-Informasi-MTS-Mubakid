<form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <x-modal id="modal-default" :modalHeader="false">
        <x-slot name="body">
            <div class="separator my-3">Administrasi</div>

            <div class="row">
                <div class="col">
                    <select name="status_pembayaran" class="form-control">
                        <option value="paid">Lunas ({{ $nominal }})</option>
                        <option value="unpaid">Belum Lunas</option>
                    </select>
                </div>
            </div>
            <div class="separator my-3">Wajib Diisi</div>
            <div class="row">
                <div class="col">
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="nama_lengkap">
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="tempat_lahir">
                </div>
                <div class="col">
                    <input type="date" name="tanggal_lahir" class="form-control" placeholder="tanggal_lahir">
                    <select name="jenis_kelamin" class="form-control">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <input type="text" name="no_hp" class="form-control" placeholder="no_hp">
                </div>
            </div>
            <div class="separator my-3">Keluarga</div>
            <div class="row">
                <div class="col">
                    <select class="form-control" name="status_keluarga" id="status_keluarga">
                        <option value="" selected disabled>Pilih Status Keluarga</option>
                        <option>Anak Kandung</option>
                        <option>Anak Tiri</option>
                        <option>Anak Angkat</option>
                        <option>Anak Asuh</option>
                    </select>
                    <input type="text" name="anak_ke" class="form-control" placeholder="anak_ke ... dari ....">
                    <input type="text" name="nama_ayah" class="form-control" placeholder="nama_ayah">
                    <input type="text" name="tempatlahir_ayah" class="form-control" placeholder="tempat_lahir_ayah">
                    <input type="date" name="tanggallahir_ayah" class="form-control" placeholder="tanggal_lahir_ayah">
                    <select name="pendidikan_ayah" id="pendidikan_ayah" class="form-control">
                        <option value="" selected disabled>Pilih pendidikan ayah</option>
                        <option>Tidak Sekolah</option>
                        <option>Putus SD</option>
                        <option>SD Sederajat</option>
                        <option>SMP Sederajat</option>
                        <option>SMA Sederajat</option>
                        <option>D1</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4/S1</option>
                        <option>S2</option>
                        <option>S3</option>
                        <option>Lainnya</option>
                    </select>
                    <select name="pekerjaan_ayah" id="pekerjaan_ayah" class="form-control">
                        <option value="" selected disabled>Pekerjaan Ibu</option>
                        <option>Tidak Bekerja</option>
                        <option>Nelayan</option>
                        <option>Petani</option>
                        <option>Peternak</option>
                        <option>PNS/TNI/Polri</option>
                        <option>Karyawan Swasta</option>
                        <option>Pedagang Kecil</option>
                        <option>Pedagang Besar</option>
                        <option>Wiraswasta</option>
                        <option>Wirausaha</option>
                        <option>Buruh</option>
                        <option>Pensiunan</option>
                        <option>Tenaga Kerja Indonesia</option>
                        <option>Tidak dapat diterapkan</option>
                        <option>Sudah Meninggal</option>
                        <option>Lainnya</option>
                    </select>
                </div>
                <div class="col">
                    <input type="text" name="penghasilan" class="form-control" placeholder="penghasilan">
                    <input type="text" name="nama_ibu" class="form-control" placeholder="nama_ibu">
                    <input type="text" name="tempatlahir_ibu" class="form-control" placeholder="tanggal_lahir_ibu">
                    <input type="date" name="tanggallahir_ibu" class="form-control" placeholder="tanggal_lahir_ibu">
                    <select name="pendidikan_ibu" id="pendidikan_ibu" class="form-control">
                        <option value="" selected disabled>Pilih pendidikan Ibu</option>
                        <option>Tidak Sekolah</option>
                        <option>Putus SD</option>
                        <option>SD Sederajat</option>
                        <option>SMP Sederajat</option>
                        <option>SMA Sederajat</option>
                        <option>D1</option>
                        <option>D2</option>
                        <option>D3</option>
                        <option>D4/S1</option>
                        <option>S2</option>
                        <option>S3</option>
                        <option>Lainnya</option>
                    </select>
                    <select name="pekerjaan_ibu" id="pekerjaan_ibu" class="form-control">
                        <option value="" selected disabled>Pekerjaan Ibu</option>
                        <option>Tidak Bekerja</option>
                        <option>Nelayan</option>
                        <option>Petani</option>
                        <option>Peternak</option>
                        <option>PNS/TNI/Polri</option>
                        <option>Karyawan Swasta</option>
                        <option>Pedagang Kecil</option>
                        <option>Pedagang Besar</option>
                        <option>Wiraswasta</option>
                        <option>Wirausaha</option>
                        <option>Buruh</option>
                        <option>Pensiunan</option>
                        <option>Tenaga Kerja Indonesia</option>
                        <option>Tidak dapat diterapkan</option>
                        <option>Sudah Meninggal</option>
                        <option>Lainnya</option>
                    </select>
                </div>
            </div>
            <div class="separator my-3">Alamat</div>
            <div class="row">
                <input type="text" name="alamat" class="form-control" placeholder="alamat" required>
                <input type="text" name="desa" class="form-control" placeholder="desa" required>
                <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" required>

                <div class="form-group">
                    <label for="kota">Kota</label>
                    <select class="selectpicker form-control" data-live-search="true" name="kota" id="kota"
                        value="{{ old('kota') }}">
                        @foreach ($kota as $kota)
                            <option>{{ $kota->nama }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <select class="selectpicker form-control" data-live-search="true" name="provinsi" id="provinsi"
                        value="{{ old('provinsi') }}">
                        @foreach ($prov as $prov)
                            <option>{{ $prov->nama }} </option>
                        @endforeach
                    </select>
                </div>

                <input type="text" name="kode_pos" class="form-control" placeholder="kode_pos">
            </div>
            <div class="separator my-3">Nomor-nomor</div>
            <div class="row">
                <div class="col">
                    <input type="text" name="nik" class="form-control" placeholder="nik ananda">
                    <input type="text" name="kk" class="form-control" placeholder="kk">
                    <input type="text" name="nik_ayah" class="form-control" placeholder="nik_ayah">
                    <input type="text" name="nik_ibu" class="form-control" placeholder="nik_ibu">
                    <input type="text" name="no_pkh" placeholder="no_pkh" class="form-control">
                    <input type="text" name="nisn" placeholder="nisn" class="form-control">
                </div>
                <div class="col">
                    <input type="text" name="no_kks_kps" placeholder="no_kks_kps" class="form-control">
                    <input type="text" name="no_kip" placeholder="no_kip" class="form-control">
                    <input type="text" name="no_un" placeholder="no_un" class="form-control">
                    <input type="text" name="no_seri_ijazah" placeholder="no_seri_ijazah" class="form-control">
                    <input type="text" name="no_skhun" placeholder="no_skhun" class="form-control">
                </div>
            </div>
            <div class="separator my-3">Tambahan</div>
            <div class="row">
                <div class="col">
                    <input type="text" name="asal_sekolah" placeholder="asal_sekolah" class="form-control">
                    <input type="text" name="npsn_sekolah" placeholder="npsn_sekolah" class="form-control">
                    <input type="text" name="alamat_sekolah_asal" placeholder="alamat_sekolah_asal"
                        class="form-control">
                    <input type="text" name="prestasi" placeholder="prestasi" class="form-control">
                    <input type="text" name="tingkat_prestasi" placeholder="tingkat_prestasi" class="form-control">
                </div>
                <div class="col">
                    <input type="text" name="hobi" class="form-control" placeholder="hobi">
                    <input type="text" name="cita_cita" class="form-control" placeholder="cita_cita">
                    <label for="foto">foto siswa</label>
                    <input type="file" id="foto" name="foto_siswa" class="form-control" placeholder="foto_siswa">
                    <label for="foto_ortu">foto orang tua</label>
                    <input type="file" id="foto_ortu" name="foto_ortu" class="form-control" placeholder="foto_ortu">
                </div>
            </div>


        </x-slot>
        <x-slot name="footer">
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-info btn-sm">Tambah</button>
        </x-slot>
    </x-modal>
</form>
