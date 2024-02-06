<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\DeletedModels\Models\Concerns\KeepsDeletedModels;
use Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, KeepsDeletedModels;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        dump(123);
        static::creating(function ($model) {
            $model->name = strtoupper($model->name);
        });
    }

        public static function booted()
    {
        parent::booted();
        dump(1234);
        static::creating(function ($model) {
            $model->name = strtoupper($model->name);
        });
    }

    public function getMailProvider()
    {
        return array_merge($this->attributes,['mail_provider'=>Str::afterLast($this->email, '@')]);
    }
}
