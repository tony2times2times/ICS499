<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class UserFeedback extends Model
{
    /**
     * Table Name
     * @var string $table
     */
    protected $table = "user_feedback";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}