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

    protected $fillable = [
        'title',
        'salary_id',
        'schedule',
        'link',
        'location',
    ];

    public function tag(string $tag): void
    {
        $tag = Tag::firstOrCreate(['name' => $tag]);

        $this->tags()->attach($tag);
    }

    public function assignSalary(float $amount, string $currency): void
    {
        $salary = Salary::firstOrCreate([
                'value' => $amount,
                'currency' => $currency,
            ]
        );

        $this->salary()->associate($salary);
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
