<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    public const SCHEDULE_PART_TIME = 'Part Time';
    public const SCHEDULE_FULL_TIME = 'Full Time';
    public const SCHEDULE_FREELANCE = 'Freelance';

    protected $fillable = [
        'title',
        'salary_id',
        'schedule',
        'description',
        'link',
        'location',
    ];

    public static function schedules(): array
    {
        return [
            self::SCHEDULE_PART_TIME,
            self::SCHEDULE_FULL_TIME,
            self::SCHEDULE_FREELANCE,
        ];
    }

    public function tag(string $tag): void
    {
        $tag = Tag::firstOrCreate(['name' => $tag]);

        $this->tags()->attach($tag);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function salary(): BelongsTo
    {
        return $this->belongsTo(Salary::class);
    }
}
