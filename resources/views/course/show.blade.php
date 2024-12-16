@extends('layouts.dashboard')
@section('title', $course->name)
@section('content')
    <div class="d-flex-space-betwean">
        <div class="my-3 course-header rounded-0 d-flex  flex-wrap justify-content-between course-shadow">
            <h1>{{ $course->name }}</h1>
            <p>
                Créé par : <strong>{{ $course->author()->name }}</strong> <br>
                Dernière mise à jour : <strong>{{ $course->last_edit }}</strong>
            </p>
        </div>
    </div>
    <div class="my-3 p-4 card rounded-0 fade-in-up overflow-scroll course-shadow">
        <div class="container">
            {{ $course->content }}
        </div>
    </div>
    <div class="my-3 p-4 d-flex flex-wrap bg-blanc rounded-0 justify-content-between fade-in-up course-shadow">
        <p class="m-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                <path
                    d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2" />
            </svg>
            <strong>Catégorie :</strong> {{ $course->category()->name }}
        </p>
        <p class="m-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill"
                viewBox="0 0 16 16">
                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
            </svg>
            <strong>{{ $course->views }}</strong> vues
        </p>
        @if ($course->author()->id == Auth::user()->id || Auth::user()->role === 'admin')
            <form class="btn-group" action="{{ route('course.delete', $course->id) }}" method="post">
                <a href="{{ route('course.edit', $course->id) }}" class="btn btn-sm btn-outline-primary" id="lectureBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-pencil" viewBox="0 0 16 16">
                        <path
                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                    </svg>
                    Editer
                </a>
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" id="lectureBtn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-trash" viewBox="0 0 16 16">
                        <path
                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z">
                        </path>
                        <path
                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z">
                        </path>
                    </svg>
                    Supprimer
                </button>
            </form>
        @endif
    </div>
    </main>
    </div>
    </div>
@endsection
