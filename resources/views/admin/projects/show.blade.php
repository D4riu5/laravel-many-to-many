@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                @include('partials.success')

                <h1>
                    {{ $project->title }}
                </h1>
                <h6>
                    Slug: {{ $project->slug }}
                </h6>

                <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning">
                    Edit Project
                </a>

                @if ($project->type)
                    <h3 class="my-3">
                        Type:
                        <a href="{{ route('admin.types.show', $project->type->id) }}">
                            {{ $project->type->name }}
                        </a>
                    </h3>
                @else
                    <h3 class="my-3">
                        No type
                    </h3>
                @endif

                @if ($project->technologies->count())
                    <h3 class="my-3">
                        Technology used:
                        @foreach ($project->technologies as $technology)
                            <a class="m-2 d-inline-block" href="{{ route('admin.technologies.show', $technology->id) }}">
                                {{ $technology->name }}
                            </a>
                        @endforeach
                    </h3>
                @else
                    <h3 class="my-3">
                        No technology
                    </h3>
                @endif


                @if ($project->img)
                    <div>
                        <img src="{{ asset('storage/' . $project->img) }}" style="height: 400px;" alt="project">
                    </div>
                @endif

                <h3 class="my-2">
                    Description:
                </h3>
                <p>
                    {!! nl2br($project->description) !!}
                </p>
            </div>
        </div>
    </div>
@endsection
