@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center mb-4">
            <div class="col">
                <h1>
                    Create a new Type
                </h1>
            </div>
        </div>

        @include('partials.errors')

        <div class="row mb-4">
            <div class="col">
                <form action="{{ route('admin.types.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Name<span class="text-danger"> *</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" required maxlength="128"
                            value="{{ old('name') }}" placeholder="Insert name...">
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
