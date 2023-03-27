@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Create a new Project
                </h1>
            </div>
        </div>

        @include('partials.errors')

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">
                            Title<span class="text-danger"> *</span>
                        </label>
                        <input type="text" class="form-control" id="title" name="title" required maxlength="128"
                            value="{{ old('title') }}" placeholder="Insert title...">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Description<span class="text-danger"> *</span>
                        </label>
                        <textarea class="form-control" rows="10" id="description" name="description" required maxlength="4096"
                            placeholder="Insert description...">{{ old('description') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="type_id" class="form-label">
                            Type
                        </label>
                        <select name="type_id" id="type_id" class="form-select">
                            <option value="">No Type</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}" {{ old('type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">
                            Project Preview Image
                        </label>
                        <input type="file" class="form-control" id="img" name="img" accept="image/*">
                    </div>

                    <div>
                        <p>
                            <strong class="text-danger">*</strong> camps are required!
                        </p>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">
                            Create
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
