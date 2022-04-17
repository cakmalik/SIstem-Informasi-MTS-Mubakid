@extends('layouts.app')
@section('content')
    <div class="alert alert-info alet-dismissable" id="alertuser">
        Menghapus akun beresiko Siswa tidak dapat login ke akunnya.
        <a href="#" onclick="sayaMemahami()" type="button" data-dismiss="alert">Saya Memahaminya</a>
    </div>
    <div class="card p-3">
        <x-datatables />
        <table id="datatable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th>Diperbarui</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>

                        <td>{{ $user->email }}</td>
                        <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                        <td>{{ Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="confirm('Yakin mau di hapus? Resiko tinggi. pikir lagi')" type="submit"
                                    class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        if (window.localStorage.getItem('pahamUserDelete') == 'true') {
            const alertuser = document.getElementById('alertuser');
            alertuser.style.display = 'none';
        }

        function sayaMemahami() {
            window.localStorage.setItem('pahamUserDelete', 'true');
            alert(
                'Di Ingat ya kang, saya tidak akan mengingatkannya lagi. jadi kalau ada user tidak bisa login, maka cek dulu disini'
            );
        }
    </script>
@endsection
