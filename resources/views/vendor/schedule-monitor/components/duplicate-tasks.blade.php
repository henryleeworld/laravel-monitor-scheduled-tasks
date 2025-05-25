@props(['tasks'])
<div class="space-y-1">
    <x-schedule-monitor::title>{{ __('Duplicate Tasks') }}</x-schedule-monitor::title>

    <div>{{ __('These tasks could not be monitored because they have a duplicate name.') }}</div>

    <div>
        @foreach ($tasks as $task)
            <x-schedule-monitor::task :task="$task" />
        @endforeach
    </div>

    <div>
        {{ __('To monitor these tasks you should add') }} <span class="text-yellow font-bold">->monitorName()</span> {{ __('in the schedule to manually specify a unique name.') }}
    </div>
</div>
