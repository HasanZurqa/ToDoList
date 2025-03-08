@extends('Layout.app')

<link rel="stylesheet" href="{{ url('assets/css/create.css') }}">

@section('content')
<section id="create-task">
  <div class="container py-5">
    <h1 class="mb-5 text-center">Add New Task</h1>
    
    <form action="{{ route('pages/store') }}" method="post">
      @csrf  {{-- حماية ضد هجمات CSRF لمنع الطلبات غير الموثوقة --}}
      
      <div class="form-group">
        <label for="title">Task Title  
          <span class="text-danger">*
          @error('title')
            {{ e($message) }}  {{-- استخدام e() لحماية الرسائل من XSS --}}
          @enderror
        </span>
        </label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required> 
        {{-- استخدام old() للاحتفاظ بالقيمة المدخلة عند حدوث خطأ، لمنع فقدان البيانات --}}
      </div>
      
      <div class="form-group">
        <label for="description">Task Description 
          <span class="text-danger">*
          @error('description')
            {{  e($message) }}  {{-- استخدام e() لحماية الرسائل من XSS --}}
          @enderror
        </span>
        </label>
        <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea> 
        {{-- old() تضمن بقاء البيانات في الحقل بعد إعادة تحميل الصفحة --}}
      </div>

      <div class="form-group">
        <label for="due_date">Due Date  <span class="text-danger">*
          @error('due_date')
            {{ e($message) }}  {{-- استخدام e() لحماية الرسائل من XSS --}}
          @enderror
        </span>
        </label>
        <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date') }}" required> 
        {{-- old() تحفظ تاريخ الإدخال في حالة حدوث خطأ --}}
      </div>
      
      <br>
      <button type="submit" class="btn btn-success">Add Task</button>
    </form>
  </div>
</section>
@endsection
