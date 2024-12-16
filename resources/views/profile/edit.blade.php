@extends('layouts.dashboard')
@section('title', 'Profil')
@section('content')
    <div class="album py-3">
        <div class="bg-blanc p-3 course-shadow">
            <h1 class="fw-semibold fs-1">Profil</h1>
            <form action="{{ route('profile.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="my-2">
                    <label for="name" class="form-label">Nom :</label>
                    <input type="text" name="name" id="name" value="{{ old('name', Auth::user()->name) }}"
                        class="form-control">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="username" class="form-label">Nom d'utilisateur :</label>
                    <input type="text" name="username" id="username"
                        value="{{ old('username', Auth::user()->username) }}" class="form-control">
                    @error('username')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="email" class="form-label">E-Mail :</label>
                    <input type="email" name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                        class="form-control">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="role" class="form-label">Type de compte :</label>
                    <input type="text" name="role" id="role" disabled
                        value="{{ Str::upper(Auth::user()->role) }}" class="form-control">
                </div>
                <button type="submit" class="btn mt-2 btn-primary">Modifier</button>
            </form>
        </div>
    </div>
    </div>
@endsection
