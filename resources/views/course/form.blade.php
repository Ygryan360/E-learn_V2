@php
    $categories = App\Models\Category::all();
@endphp
@extends('layouts.dashboard')
@section('content')
    <div class="container my-3 card p-3 course-shadow">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            @method($course->id ? 'PUT' : 'POST')
            <label for="name" class="form-label">Titre :</label>
            <input type="text" id="name" name="name" required class="form-control"
                value="{{ old('name', $course->name) }}">
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <label for="description" class="form-label">Description :</label>
            <textarea type="text" id="description" name="description" required class="form-control">{{ old('description', $course->description) }}</textarea>
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <label for="category" class="form-label">Catégorie :</label>
            <select id="category" name="category" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $course->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            <label for="content" class="form-label">Contenu :</label>
            <textarea id="content" name="content" class="form-control">{{ old('content', $course->content) }}</textarea>
            @error('content')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
            <button type="submit" class="btn btn-primary mt-4">{{ $course->id ? 'Modifier' : 'Ajouter' }}</button>
        </form>
    </div>
@endsection
