<?php

use Illuminate\Support\Facades\Schedule;
use Spatie\ScheduleMonitor\Models\MonitoredScheduledTaskLogItem;

Schedule::command('schedule-monitor:sync')->dailyAt('00:00');
Schedule::command('model:prune', ['--model' => MonitoredScheduledTaskLogItem::class])->daily();
Schedule::command('demo:cro')->everyMinute();
