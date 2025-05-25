<div class="mx-2 my-1 space-y-1">
    <div>{{ __('All done! Now monitoring') . ' ' . $monitoredScheduledTasksCount . ' ' . __(str()->plural('scheduled task', $monitoredScheduledTasksCount)) }}.</div>
    <div>{{ __('Run') }} <span class="text-yellow font-bold">php artisan schedule-monitor:list</span> {{ __('to see which jobs are now monitored.') }}</div>
</div>
