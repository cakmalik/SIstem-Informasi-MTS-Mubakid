<div>
    <x-datatables />
    {{-- {{ $pesan }} --}}
    <select class="form-control" wire:model='selectedGrade'>
        <option value="">Pilih Kelas</option>
        @foreach ($grades as $grade)
            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
        @endforeach
    </select>
    <table id="datatable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Kota</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (!is_null($students))
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->nama_lengkap }}</td>
                        <td>{{ $student->kota }}</td>
                        <td>{{ $student->grade->name }}</td>
                        {{-- <td>{{ $student->}}</td> --}}
                        <td>
                            <a href="{{ route('students.show', $student->id) }}"
                                class="btn btn-info btn-sm btn-flat">Detail</a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
