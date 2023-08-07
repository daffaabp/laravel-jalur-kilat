@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $judul }}</div>

                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama Lengkap</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($models as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nisn }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            {!! Form::open([
                                                'route' => ['siswa.destroy', $item->id],
                                                'method' => 'delete',
                                                'onsubmit' => 'return confirm("Apakah Anda Yakin?")',
                                            ]) !!}
                                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                            {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $models->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
