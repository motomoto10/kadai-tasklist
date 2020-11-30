@extends('layouts.app')

@section('content')

<h1>id = {{ $task->id }}　のタスク詳細ページ</h1>

<table class="table table-bordered">
    <tr>
        <th>id</th>
        <td>{{ $task->id}}</td>
    </tr>
    <tr>
        <th>状態</th>
        <td>{{ $task->status }}</td>
    </tr>
    <tr>
        <th>タスク</th>
        <td>{{ $task->content }}</td>
    </tr>
</table>

<div>
    @if (Auth::id() == $task->user_id)
        {{-- 投稿削除ボタンのフォーム --}}
        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
        {!! Form::close() !!}
    @endif
    {{-- 投稿一覧 --}}
    @include('tasks.tasks')
</div>

@endsection