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


                @if ($project->img)
                    <div>
                        <img src="{{ asset('storage/' . $project->img) }}" style="height: 400px;" alt="project">
                    </div>
                @endif

                <p>
                    {!! nl2br($project->description) !!}
                </p>
            </div>
        </div>
    </div>
@endsection
