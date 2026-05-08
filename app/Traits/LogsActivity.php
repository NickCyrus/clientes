<?php

namespace App\Traits;

use App\Models\ActivityLog;

trait LogsActivity
{
    public static function bootLogsActivity()
    {

       
        static::created(function ($model) {

            ActivityLog::create([
                'user_id' => auth()->id(),
                'model' => get_class($model),
                'model_id' => $model->id,
                'action' => 'created',
                'new_values' => $model->toArray(),
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        });

        static::updated(function ($model) {

            ActivityLog::create([
                'user_id' => auth()->id(),
                'model' => get_class($model),
                'model_id' => $model->id,
                'action' => 'updated',
                'old_values' => $model->getOriginal(),
                'new_values' => $model->getChanges(),
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        });

        static::deleted(function ($model) {

            ActivityLog::create([
                'user_id' => auth()->id(),
                'model' => get_class($model),
                'model_id' => $model->id,
                'action' => 'deleted',
                'old_values' => $model->toArray(),
                'ip' => request()->ip(),
                'user_agent' => request()->userAgent(),
            ]);
        });
    }
}