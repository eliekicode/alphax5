<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{

    protected $guarded = [];


    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Lead $model) {
            if ($model->series_id) {
                self::generateSerialNumber($model);
            }
        });

        static::saving(function (Lead $model) {
            if ($model->series_id && !$model->serial_number) {
                self::generateSerialNumber($model);
            }
        });
    }


    /**
     * @param $model
     * @return void
     */
    private static function generateSerialNumber($model): void
    {
        $model->serial_number = Lead::where('series_id', $model->series_id)->max('serial_number') + 1;
        $model->serial = $model->series->prefix . '-' . str_pad($model->serial_number, 5, '0', STR_PAD_LEFT);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }
}
