<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = ['professional_status','company','location','skills','website','short_bio'];

    public $professionalStatuses =['Developer','Junior Developer','Senior Developer','Manager','Student','Instructor','Intern','Other'];

    /**
     * The attributes that should be appends.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'user_skills',
        'professional_title',
        'user_name'
    ];

    /**
     * 
     * Accessors related to User model
     * 
     */

    public function getUserSkillsAttribute()
    {
        return explode(',', $this->attributes['skills']);
    }

    public function getProfessionalTitleAttribute()
    {
        return $this->professionalStatuses[$this->attributes['professional_status']];
    }

    public function getUserNameAttribute()
    {
        return $this->user->name;
    }


    /**
     * 
     * Relations related to User model
     * 
     */

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
