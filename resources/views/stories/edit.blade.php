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
                        <div class="form-group">
                            <label for="title">T&iacute;tulo</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $story->title)}}">
                            @error('title')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="body">Descripci&oacute;n</label>
                            <textarea name="body" id="body" class="form-control @error('body') is-invalid @enderror">{{ old('body', $story->body)}}</textarea>
                            @error('body')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Tipo</label>
                            <select name="type" id="type" class="form-control @error('type') is-invalid @enderror">
                                <option value="">Selecciona...</option>
                                <option value="short" {{'short' == old('type', $story->type) ? 'selected' : ''}}>Corta</option>
                                <option value="long" {{'long' == old('type', $story->type) ? 'selected' : ''}}>Larga</option>
                            </select>
                            @error('type')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <fieldset class="form-group">
                            <legend class="col-form-label">Estatus</legend>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="status" id="status1" value="1" {{'1' == old('status', $story->status) ? 'checked' : ''}}>
                                <label for="status1" class="form-check-label">S&iacute;</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="status" id="status2" value="0" {{'0' == old('status', $story->status) ? 'checked' : ''}}>
                                <label for="status2" class="form-check-label">No</label>
                                @error('status')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection