<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasUuids, LogsActivity;

    protected $keyType = 'string';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'supertokens_id',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->id = (string) Str::uuid();
        });
    }

    // User belongs to many cohorts
    public function cohorts(): BelongsToMany
    {
        return $this->belongsToMany(Cohort::class, 'cohort_users')
            ->withPivot('enrolled_at', 'status')
            ->withTimestamps();
    }

    // Get all courses user has access to through cohorts
    public function courses(): BelongsToMany
    {
        return $this->belongsToManyThrough(
            Course::class,
            Cohort::class,
            'cohort_users',
            'cohort_courses',
            'user_id',
            'cohort_id',
            'id',
            'id'
        );
    }

    // Check if user can access a specific course
    public function canAccessCourse(Course $course): bool
    {
        return $this->cohorts()
            ->whereHas('courses', function ($query) use ($course) {
                $query->where('courses.id', $course->id);
            })
            ->exists();
    }

    // Get the user's SuperTokens ID
    public function getSupertokensId(): ?string
    {
        return $this->supertokens_id;
    }

    // Set the user's SuperTokens ID    
    public function setSupertokensId(string $supertokensId): void
    {
        $this->supertokens_id = $supertokensId;
        $this->save();
    }
    // Define the relationship with UsersTracking
    public function trackings()
    {
        return $this->hasMany(UsersTracking::class, 'user_id');
    }
    // Get the latest tracking record for the user
    public function latestTracking()
    {
        return $this->trackings()->latest()->first();
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()  // log all fillable / dirty attributes
            ->useLogName('user_activity') // specify a custom log name
            ->setDescriptionForEvent(fn(string $eventName) => "User has been {$eventName}");
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'author', 'id');
    }
}
