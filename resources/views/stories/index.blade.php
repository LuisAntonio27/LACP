@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Stories') }}
                    @can('create', App\Story::class)
                        <a href="{{ route('stories.create') }}" class="float-right">Nuevo</a>
                    @endcan
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>T&iacute;tulo</th>
                                <th>Tipo</th>
                                <th>Estatus</th>
                                <th>Acci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stories as $story)
                                <tr>
                                    <td>{{ $story->title }}</td>
                                    <td>{{ $story->type }}</td>
                                    <td>{{ $story->status == 1 ? 'Yes' : 'No' }}</td>
                                    <td>
                                        @can('view', $story)
                                            <a href="{{ route('stories.show', [$story]) }}" class="btn btn-secondary">Ver</a>
                                        @endcan

                                        @can('update', $story)
                                            <a href="{{ route('stories.edit', [$story]) }}" class="btn btn-primary">Editar</a>
                                        @endcan

                                        @can('delete', $story)
                                            <form action="{{ route('stories.destroy', [$story]) }}" method="POST" class="d-inline-block">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$stories->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection