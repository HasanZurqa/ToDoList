@extends('Layout.app')

<link rel="stylesheet" href="{{ url('assets/css/home.css') }}">

@section('content')
<section id="tasks">
  <div class="container py-5">
    <h1 class="mb-5 text-center">Task List</h1>
    
    <!-- Add New Task Button -->
    <a href="{{ route('pages/create') }}" class="btn btn-success mb-4">Add New Task</a>
    
    <!-- Task List -->
    <ul class="list-group">
      @foreach ($tasks as $task)
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <div>
            <h5>{{ e($task['title']) }}</h5> 
            {{-- e() لحماية النص من أي إدخال ضار ومنع XSS --}}
            <p class="mb-1 text-muted">{{ e($task['description']) }}</p>
            <small>Created: {{ e($task->created_at) }}</small>
            <br>
            <small>Due: {{ e($task->duo) }}</small>
          </div>
          <div>
            <a href="{{ route('pages/show', $task['id']) }}" class="btn btn-success btn-sm">Show</a>
            <a href="{{ route('pages/edit', $task['id']) }}" class="btn btn-primary btn-sm">Edit</a>
            
            <form action="{{ route('pages/destroy', $task['id']) }}" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this task?');">
              @csrf  {{-- حماية ضد هجمات CSRF --}}
              @method('DELETE')  {{-- تحديد أن الطلب هو حذف --}}
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </div>
        </li>
        <br>
      @endforeach
    </ul>
  </div>
</section>
@endsection
