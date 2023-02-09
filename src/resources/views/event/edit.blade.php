@extends('layouts.common')

@section('content')
<div class="container">
  <form action="{{ route('event.update') }}" method="POST">
  @csrf
  <input type="hidden" name="event_id" value="{{ $event->event_id }}">
    <div class="form-group">
      <label for="title">{{ 'タイトル' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
      <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" value="{{ old('title'), $event->title }}">
      @if ($errors->has('title'))
        <span class="invalid-feedback" role="alert">
          {{ $errors->first('title') }}
        </span>
      @endif
    </div>

    <div class="form-group w-50">
      <label for="category-id">{{ 'カテゴリー' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
      <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category-id" name="category_id">
        @foreach ($categories as $category)
          <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
        @endforeach
      </select>
      @if ($errors->has('category_id'))
        <span class="invalid-feedback" role="alert">
          {{ $errors->first('category_id') }}
        </span>
      @endif
    </div>

    <div class="form-group w-25">
      <label for="date">{{ '開催日' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
      <input type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" id="date" value="{{ old('date'), $event->date }}">
      @if ($errors->has('date'))
        <span class="invalid-feedback" role="alert">
          {{ $errors->first('date') }}
        </span>
      @endif
    </div>

    <div class="form-group w-50">
      <div class="row">

        <div class="col">
          <label for="start_time">{{ '開始時間' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
          <input type="time" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" id="start_time" value="{{ old('start_time'), $event->start_time}}">
          @if ($errors->has('start_time'))
            <span class="invalid-feedback" role="alert">
              {{ $errors->first('start_time') }}
            </span>
          @endif
        </div>

        <div class="col">
          <label for="end_time">{{ '終了時間' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
          <input type="time" class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}" name="end_time" id="end_time" value="{{ old('end_time'), $event->end_time }}">
          @if ($errors->has('end_time'))
            <span class="invalid-feedback" role="alert">
              {{ $errors->first('end_time') }}
            </span>
          @endif
        </div>
      </div>
    </div>

    <div class="form-group w-25">
      <label for="entry-fee">{{ '参加費' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
      <input type="text" class="form-control{{ $errors->has('entry_fee') ? ' is-invalid' : '' }}" name="entry_fee" id="entry-fee" value="{{ old('entry_fee', $event->entry_fee) }}">
      @if ($errors->has('entry_fee'))
        <span class="invalid-feedback" role="alert">
          {{ $errors->first('entry_fee') }}
        </span>
      @endif
    </div>

    <div class="form-group">
      <label for="content">{{ '詳細' }}<span class="badge badge-danger ml-2">{{ '必須' }}</span></label>
      <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="content" rows="10" placeholder="もくもく会の詳細を記載してください。">{{ old('content'), $event->content }}</textarea>
      @if ($errors->has('content'))
        <span class="invalid-feedback" role="alert">
          {{ $errors->first('content') }}
        </span>
      @endif
    </div>
    <button type="submit" class="btn btn-success w-100">
      {{ 'もくもく会を更新する' }}
    </button>
  </form>
</div>
@endsection