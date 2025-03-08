@extends('layout.App')

<link rel="stylesheet" href="{{ url('assets/css/edit.css') }}">

@section('content')
<section id="edit-task">
  <div class="container py-5">
    <h1 class="mb-5 text-center">Edit Task</h1>

    <form method="POST" action="{{ route('pages/update', $task['id']) }}">
      @csrf  {{-- حماية ضد هجمات CSRF لمنع إرسال طلبات غير موثوقة --}}
      @method('PUT')  {{-- استخدام PUT لتحديث البيانات وفقاً لممارسات RESTful --}}
      
      <div class="form-group">
        <label for="title">Task Title</label>
        <input type="text" class="form-control" id="title" name="title" 
               value="{{ old('title', e($task['title'])) }}" required> 
        {{-- استخدام old() لحفظ المدخلات السابقة عند حدوث خطأ، وe() لمنع XSS --}}
      </div>
      
      <div class="form-group">
        <label for="description">Task Description</label>
        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', e($task['description'])) }}</textarea>
        {{-- حماية البيانات من XSS مع ضمان بقاء المحتوى بعد إعادة تحميل الصفحة --}}
      </div>

      <div class="form-group">
        <label for="due_date">Due Date</label>
        <input type="date" class="form-control" id="due_date" name="due_date" 
               value="{{ old('due_date', e($task['duo'])) }}" required>
        {{-- old() يحافظ على البيانات المدخلة عند حدوث خطأ --}}
      </div>
      
      <br>
      <button type="submit" class="btn btn-primary">Update Task</button>
    </form>
  </div>
</section>
@endsection
