<?php


namespace App;


trait RecordActivity
{
    protected static function bootRecordActivity()
    {
        if (auth()->guest()) return;
        foreach (static::getActivitiesToRecord() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($event);
            });
        }
        static::deleting(function($model){
            $model->activity()->delete();
        });
    }

    protected function recordActivity($event)
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event),

        ]);
    }


    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }

    /**
     * @param $event
     * @return string
     */
    protected function getActivityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());
        return "{$event}_{$type}";
    }

    protected static function getActivitiesToRecord()
    {

        return ['created'];
    }

    protected static function getRecordEvents()
    {
        return ['created'];
    }
}