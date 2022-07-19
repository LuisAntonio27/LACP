@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar historia
                    <a href="{{ route('stories.index') }}" class="btn btn-primary btn-sm float-right" role="button">Regresar</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('stories.update', [$story]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        @include('stories.form')
                        
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection