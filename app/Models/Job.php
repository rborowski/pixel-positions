<?php

namespace App\Models;

use App\Enums\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'salary_id',
        'schedule',
        'description',
        'link',
        'location',
    ];

    protected function casts(): array
    {
        return [
            'schedule' => Schedule::class,
        ];
    }

    public static function schedules(): array
    {
        return Schedule::values();
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
