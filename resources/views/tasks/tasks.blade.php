@if (count($tasks) > 0)
    <ul class="list-unstyled">
        @foreach ($tasks as $task)
            <li class="media mb-3">
                <div class="media-body">
                     <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $task->user->name, ['user' => $task->user->id]) !!}
                        <span class="text-muted">posted at {{ $task->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        {!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}
                        <p>{!! nl2br(e($task->status)) !!}</p>
                        <p>{!! nl2br(e($task->content)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $task->user_id)
                            <div class="btn-toolbar">
                                {{-- 投稿削除ボタンのフォーム --}}
                                <div class="btn-group">
                                    {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                    {!! Form::close() !!}
                                </div>
                                {{-- 投稿編集ボタン--}}
                                <div class="btn-group">
                                    {!! Form::open(['route' => ['tasks.edit', $task->id], 'method' => 'get']) !!}
                                        {!! Form::submit('Edit', ['class' => 'btn btn-secondary btn-sm']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $tasks->links() }}
@endif