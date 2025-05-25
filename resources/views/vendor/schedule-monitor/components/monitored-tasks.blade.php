@props(['tasks', 'dateFormat', 'usingOhDear'])
<div class="space-y-1">
    <x-schedule-monitor::title>{{ __('Monitored Tasks') }}</x-schedule-monitor::title>

    <div class="space-y-1">
        @forelse ($tasks as $task)
            <div>
                <x-schedule-monitor::task :task="$task" />
                <div class="ml-2">
                    <div>
                        <span>
                            <span class="w-14 text-gray-500">⇁ {{ __('Started at:') }}</span>
                            <span class="date-width">
                                {{ optional($task->lastRunStartedAt())->format($dateFormat) ?? '--' }}
                            </span>
                        </span>
                        <span class="ml-3">
                            <span class="w-15 text-gray-500">⇁ {{ __('Finished at:') }}</span>
                            <span class="date-width {{ $task->lastRunFinishedTooLate() && $task->lastRunFinishedAt() ? 'text-red' : '' }}">
                                {{ optional($task->lastRunFinishedAt())->format($dateFormat) ?? '--' }}
                            </span>
                        </span>
                        <br class="xl:hidden">
                        <span class="xl:ml-3">
                            <span class="w-14 text-gray-500">⇁ {{ __('Failed at:') }}</span>
                            <span class="date-width {{ $task->lastRunFailed() ? 'text-red' : '' }}">
                                {{ optional($task->lastRunFailedAt())->format($dateFormat) ?? '--' }}
                            </span>
                        </span>
                        <br class="hidden xl:block">
                        <span class="ml-3 xl:ml-0">
                            <span class="w-15 xl:w-14 text-gray-500">⇁ {{ __('Next run:') }}</span>
                            <span class="date-width">{{ $task->nextRunAt()->format($dateFormat) }}</span>
                        </span>
                        <br class="xl:hidden">
                        <span class="xl:ml-3">
                            <span class="w-14 xl:w-15 text-gray-500">⇁ {{ __('Grace time:') }}</span>
                            <span class="date-width">{{ $task->graceTimeInMinutes() . ' ' . __('minutes') }}</span>
                        </span>
                        @if ($usingOhDear)
                            <span class="ml-3">
                                <span class="text-gray-500">⇁ {{ __('Registered at Oh Dear:') }}</span>
                                @if ($task->isBeingMonitoredAtOhDear())
                                    <span class="ml-1 px-1 bg-green-700 text-white font-bold">{{ __('Yes') }}</span>
                                @else
                                    <span class="ml-1 px-1 bg-red-700 text-white font-bold">{{ __('No') }}</span>
                                @endif
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-gray-500 italic">{{ __('There currently are no tasks being monitored!') }}</div>
        @endforelse
    </div>
    @if ($usingOhDear)
        <div>
            {{ __('Some tasks are not registered on') }} <b class="text-white bg-red-700 px-1">{{ __('oh dear') }}</b>{{ __('. You will not be notified when they do not run on time.') }}<br>
            {{ __('Run') }} <span class="text-yellow font-bold">php artisan schedule-monitor:sync</span> {{ __('to register them and receive notifications.') }}
        </div>
    @endif
</div>
