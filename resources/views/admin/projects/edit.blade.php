@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Edit project
                </h1>
            </div>
        </div>

        @include('partials.success')

        @include('partials.errors')

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label">
                            Title<span class="text-danger"> *</span>
                        </label>
                        <input type="text" class="form-control" id="title" name="title" required maxlength="128"
                            value="{{ old('title', $project->title) }}" placeholder="Insert title...">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Description<span class="text-danger"> *</span>
                        </label>
                        <textarea class="form-control" rows="10" id="description" name="description" required maxlength="4096"
                            placeholder="Insert description...">{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="type_id" class="form-label">
                            Type
                        </label>
                        <select name="type_id" id="type_id" class="form-select">
                            <option value="">No Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id', $project->type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">
                            Old image preview
                        </label>

                        @if ($project->img)
                            <div class="my-2">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" name="delete_img" id="delete_img">
                                    <label class="form-check-label" for="delete_img">
                                        Remove image
                                    </label>
                                </div>

                                <img src="{{ asset('storage/' . $project->img) }}" style="height: 400px;" alt="project">
                            </div>
                        @endif

                        <input type="file" class="form-control" id="img" name="img" accept="image/*">
                    </div>

                    <div>
                        <p>
                            <strong class="text-danger">*</strong> camps are required!
                        </p>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-warning">
                            Update
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
