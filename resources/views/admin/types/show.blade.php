@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                @include('partials.success')

                <h1>
                    {{ $type->name }}
                </h1>
                <h6>
                    Slug: {{ $type->slug }}
                </h6>


                @if ($type->projects()->count() > 0)
                    <h4 class="my-3">
                        Projects ({{ $type->projects()->count() }})
                    </h4>
                    <ul>
                        @foreach ($type->projects as $project)
                            <li>
                                <a href="{{ route('admin.projects.show', $project->id) }}">
                                    {{ $project->title }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <h4 class="my-3">
                        No Projects of this type yet!
                    </h4>
                @endif

            </div>
        </div>
    </div>
@endsection
