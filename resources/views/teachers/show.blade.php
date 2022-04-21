@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Data Pribadi') }}</div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $teacher->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">{{ __('Data Pribadi') }}</div>
                    <div class="card-body">
                        <table>
                            <tr>
                                <th>Nama</th>
                                <td>:</td>
                                <td>{{ $teacher->name }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
