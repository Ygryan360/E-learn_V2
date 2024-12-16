@extends('layouts.dashboard')
@section('title', $category->name)
@section('content')
    <div class="album py-3">
        <div class="container">

            @if (Auth::user()->role === 'admin' || Auth::user()->id == $category->author()->id)
                <div class="mt-4">
                    <form class="d-flex justify-content-between" action="{{ route('category.delete', $category->id) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-outline-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil" viewBox="0 0 16 16">
                                <path
                                    d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                            </svg>
                            Modifier
                        </a>
                        <button class="btn btn-sm btn-outline-danger">
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
                </div>
            @endif
            <div class="my-3 course-header d-flex  flex-wrap justify-content-between course-shadow">
                <h1>{{ $category->name }}</h1>
                <p>
                    {{ $category->description }}
                </p>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @if ($courses->isEmpty())
                    <div class="text-secondary text-center w-100">Aucun cours disponible</div>
                @else
                    @foreach ($courses as $course)
                        <div class="col fade-in-up">
                            <div class="card course-shadow  h-100">
                                <img class="bd-placeholder-img card-img-top" width="100%" height="225"
                                    src="{{ asset('img/noimg.jpg') }}">
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <h5><a class="text-decoration-none"
                                            href="{{ route('course.show', $course->id) }}">{{ $course->name }}</a>
                                    </h5>
                                    <p class="card-text">
                                        {{ $course->description }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                                        <a href="{{ route('course.show', $course->id) }}"
                                            class="btn btn-sm btn-outline-primary">Lire</a>
                                        @if (Auth::user()->role === 'admin' || Auth::user()->id == $course->author()->id)
                                            <form class="btn-group" action="{{ route('course.delete', $course->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('course.edit', $course->id) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
                                                    </svg>
                                                </a>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z">
                                                        </path>
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif
                                        <small class="text-body-secondary">{{ $course->category()->name }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
