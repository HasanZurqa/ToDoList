@extends('Layout.app')

<link rel="stylesheet" href="{{ url('assets/css/show.css') }}">

@section('content')
<section id="post" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="card-title text-center mb-3">{{ e($task['title']) }}</h1>
                {{-- استخدم e() لمنع هجمات XSS عند الامان عرض البيانات --}}
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-8 offset-md-2">
                <p class="card-text description text-muted">{{ e($task['description']) }}</p>
                {{-- حماية ضد XSS عبر تأمين عرض النصوص --}}
                
                <p class="card-text posted-by text-center text-secondary mb-4">{{ e($task['created_at']) }}</p>
                <p class="card-text posted-by text-center text-secondary mb-4">{{ e($task['duo']) }}</p>

                <div class="d-flex justify-content-end"> 
                    <a href="{{ route('pages/edit', $task['id']) }}" class="btn btn-success">Edit</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
