@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Project Technologies
                </h1>

                <a href="{{ route('admin.technologies.create') }}" class="btn btn-success my-2">
                    Add a Technology
                </a>
            </div>
        </div>

        @include('partials.success')

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col"># on Projects</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                <th scope="row">{{ $technology->id }}</th>
                                <td>
                                    <a style="color: darkblue" href="{{ route('admin.technologies.show', $technology->id) }}">
                                        {{ $technology->name }}
                                    </a>
                                </td>
                                <td>{{ $technology->slug }}</td>
                                <td>{{ $technology->projects()->count() }}</td>
                                <td style="width:20%">
                                    <a href="{{ route('admin.technologies.show', $technology->id) }}"
                                        class="btn btn-primary">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <a href="{{ route('admin.technologies.edit', $technology->id) }}"
                                        class="btn btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form class="d-inline-block"
                                        action="{{ route('admin.technologies.destroy', $technology->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this technology');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- PAGINATION (FIX STYLE) --}}
                {{-- <div class="pagination-container my-3">
                    {{ $technologies->links() }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
