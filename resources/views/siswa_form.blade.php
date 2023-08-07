@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        {{-- {!! Form::open([
                            'route' => $route,
                            'method' => $method,
                        ]) !!} --}}

                        {!! Form::model($siswa, [
                            'route' => $route,
                            'method' => $method,
                        ]) !!}

                        <div class="form-group">
                            <label for="nama" class="form-label">Nama</label>
                            {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('nama') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="nisn" class="form-label">NISN</label>
                            {!! Form::text('nisn', null, ['class' => 'form-control'] + $disable) !!}
                            <span class="text-danger">{{ $errors->first('nisn') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat</label>
                            {!! Form::text('alamat', null, ['class' => 'form-control']) !!}
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        </div>

                        {!! Form::submit('SIMPAN', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
