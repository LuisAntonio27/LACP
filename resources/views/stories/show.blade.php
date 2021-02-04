@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $story->title }}
                    <a href="{{ route('stories.index') }}" class="btn btn-primary float-right">Regresar</a>
                </div>

                <div class="card-body">
                    {{ $story->body }}
                    
                    <p class="font-weight-bold">
                        Type: {{ $story->type }}</br>
                        Status: {{ $story->status == 1 ? 'Yes' : 'No' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection