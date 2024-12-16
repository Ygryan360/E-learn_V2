@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h1 class="my-3 fw-semibold">
            {{ $category->id ? 'Ajouter une nouvelle catégorie' : 'Modifier' . $category->name }}
        </h1>
    </div>

    <div class="container my-3 card p-3 course-shadow">
        <form action="" method="post">
            @csrf
            @method($category->id ? 'PUT' : 'POST')
            <label for="name" class="form-label">Nom: </label>
            <input type="text" id="name" name="name" required class="form-control"
                value="{{ old('name', $category->name) }}">
            @error('name')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror

            <label for="description" class="form-label mt-2">Description :</label>
            <textarea type="text" id="description" name="description" required class="form-control">{{ old('description', $category->description) }}</textarea> <br>
            @error('description')
                <div class="text-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn btn-primary">{{ $category->id ? 'Modifier' : 'Ajouter' }}</button>
        </form>
    </div>
@endsection
