@if (count($tasks) > 0)
    <ul class="list-unstyled">
        @foreach ($tasks as $task)
            <li class="media mb-3">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        <span>{{ $task->user->name }}</span>
                        <span class="text-muted">posted at {{ $task->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <span class="text-body">id:{{ $task->id }}のタスク</span>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>status</th>
                                    <th>task</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! nl2br(e($task->status)) !!}</td>
                                    <td>{!! nl2br(e($task->content)) !!}</td>
                                </tr>
                            </tbody>
                        </table>
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
                                    {!! link_to_route('tasks.edit', 'edit', ['task' => $task->id], ['class' => 'btn btn-sm btn-secondary']) !!}
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