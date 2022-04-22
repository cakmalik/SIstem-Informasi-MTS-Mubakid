<div>
    @push('head')
        <style>
            .lds-heart {
                display: inline-block;
                position: relative;
                width: 80px;
                height: 80px;
                transform: rotate(45deg);
                transform-origin: 40px 40px;
            }

            .lds-heart div {
                top: 32px;
                left: 32px;
                position: absolute;
                width: 32px;
                height: 32px;
                background: #fff;
                animation: lds-heart 1.2s infinite cubic-bezier(0.215, 0.61, 0.355, 1);
            }

            .lds-heart div:after,
            .lds-heart div:before {
                content: " ";
                position: absolute;
                display: block;
                width: 32px;
                height: 32px;
                background: #fff;
            }

            .lds-heart div:before {
                left: -24px;
                border-radius: 50% 0 0 50%;
            }

            .lds-heart div:after {
                top: -24px;
                border-radius: 50% 50% 0 0;
            }

            @keyframes lds-heart {
                0% {
                    transform: scale(0.95);
                }

                5% {
                    transform: scale(1.1);
                }

                39% {
                    transform: scale(0.85);
                }

                45% {
                    transform: scale(1);
                }

                60% {
                    transform: scale(0.95);
                }

                100% {
                    transform: scale(0.9);
                }
            }

            .full_layar {
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: black;
                position: fixed;
                top: 0px;
                left: 0px;
                z-index: 9999;
                width: 100%;
                height: 100%;
                opacity: 0.75;
            }

        </style>
    @endpush
    <div wire:loading>
        <div class="full_layar">
            <div class="lds-heart">
                <div></div>
            </div>
        </div>
    </div>

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
                @forelse ($students as $student)
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
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            @endif
        </tbody>
    </table>
</div>
