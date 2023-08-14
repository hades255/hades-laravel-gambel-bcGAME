@if(Auth::guest()) <script type="text/javascript">load('/');</script> @else
    <div class="game__wrapper tasks_page">
        <div class="bonus_header">
            <p>Tasks <i class="fas fa-info-circle fn_btn_info tooltip" title="Task information" onclick="info('tasks')"></i></p>
            <span>Take part in weekly challenges and win cash prizes!</span>
        </div>

        @php
        $tasks = \App\Task::where('start_time', '<=', time())->where('end_time', '>=', time())->get() 
		@endphp
        @foreach($tasks as $key => $task)
            @php
            $u = \App\User::whereRaw('JSON_CONTAINS(`tasks_completed`, \''.$task->id.'\', \'$\')')->where('id', Auth::user()->id)->count()
            @endphp
            @if($u != 0) @unset($tasks[$key]) @endif
        @endforeach
        @if(sizeof($tasks) == 0)
            <div class="tasks_empty_wrapper">
                <div class="tasks_empty-header">Currently there are no tasks</div>
                <div class="tasks_empty-text">Check here later - they will definitely appear!</div>
            </div>
        @else
            <div class="tasks_wrapper">
            @foreach($tasks as $key => $task)
                @php
						$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
    ); 
                $game = json_decode(file_get_contents(url('/').'/game_info/'.$task->game_id, false, stream_context_create($arrContextOptions)))
                @endphp
                <div class="task_content">
                    <div class="task">
                        <div class="task-header">
                            <i class="{{$game->icon}}"></i>
                            <div class="task-header-content">
                                <div class="task-header-title">
                                    <a href="/{{strtolower($game->name)}}" target="_blank">{{$game->name}}</a>
                                </div>
                                <div class="task-header-text">
                                    {{file_get_contents(url('/').'/task/description/'.$task->id, false, stream_context_create($arrContextOptions))}}
                                </div>
                            </div>
                        </div>
                        <div class="task-content hidden-xs">
                            <div class="task-footer-item task-progress-item">
                                <div>Start</div>
                                <div>{{date('d.m.Y', $task->start_time)}}
								</div>
                            </div>
                            <div class="task-footer-item task-progress-item">
                                <div>Finishing</div>
                                <div>{{date('d.m.Y', $task->end_time)}}</div>
                            </div>
                            <div class="task-progress-container">
                                <div class="task-progress">
                                    @php
                                        $begin = $task->start_time;
                                        $now = time();
                                        $end = $task->end_time;
                                        $percent = number_format((float) ($now-$begin) / ($end-$begin) * 100, 2, '.', '');
                                    @endphp
                                    <div style="width: {{$percent}}%"></div>
                                </div>
                            </div>
                        </div>
                        <div class="task-footer">
                            <div class="task-footer-item">
                                <div class="task-footer-item-header">Reward</div>
                                <div>{{$task->reward}} USD.</div>
                            </div>
                            <div class="task-footer-item hidden-xs">
                                <div class="task-footer-item-header">Price for 1 try</div>
								@if($task->price > 0)
                                <div>{{$task->price}} USD.</div>
								@else
								<div>Is free</div>
								@endif
                            </div>
                            @php($users = \App\User::whereRaw('JSON_CONTAINS(`tasks_completed`, \''.$task->id.'\', \'$\')')->get())
                            @if(sizeof($users) > 0)
                                <div class="task-footer-item hidden-xs">
                                    <div class="task-footer-item-header">Completed</div>
                                    <div>
                                        <div class="avatar-group">
                                            @php($i = 0)
                                            @foreach($users as $key => $value)
                                                <a href="javascript:void(0)" onclick="load('user?id={{$value->id}}')" class="avatar-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="" data-original-title="{{$value->username}}">
                                                    <img src="{{$value->avatar}}" alt="image">
                                                </a>
                                                @if($i > 5)
                                                    <a href="javascript:void(0)" class="avatar-media kt-media--sm kt-media--circle" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title=""
                                                       data-original-title="Runs: {{sizeof($users)}}">
                                                        <span>+{{sizeof($users) - 7}}</span>
                                                    </a>
                                                    @break
                                                @endif
                                                @php($i += 1)
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        @php($any_tries = file_get_contents(url('/').'/task/has/'.Auth::user()->id.'/'.$task->id, false, stream_context_create($arrContextOptions)) == '1')
                        <div class="task-purchase-btn"
                             onclick="@if($any_tries) load('{{strtolower($game->name)}}'); @else task({{$task->id}}) @endif">
                            @if($any_tries) Play @else Start quest @endif
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        @endif
    </div>
@endif