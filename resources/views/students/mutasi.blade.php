<div>
    <div class="mb-5">
        <a href="{{ route('students.luluskan', $student) }}" class="btn btn-sm btn-flat btn-info">LULUS</a>
        <div class="btn btn-sm btn-flat btn-info" data-toggle="modal" data-target="#modal-mutasi">MUTASI</d>
        </div>
        <x-modal id="modal-mutasi" modalHeader='false'>
            <form action="{{ route('students.mutasikan') }}">
                <x-slot name="body">
                    <x-form.input name='tanggal_mutasi' type='date' />
                    <x-form.input name='tujuan' type='name' />
                    <x-form.input name='alamat_tujuan' type='name' />
                    <x-form.input name='keterangan' type='name' />
                </x-slot>
                <x-slot name="footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Mutasikan</button>
                </x-slot>
            </form>
        </x-modal>
    </div>
