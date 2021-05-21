<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Hospital extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $casts = ['social' => 'json'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->slug = $user->uniqueSlug();

        });
    }

    public function getLogoAttribute($data)
    {
        return $data ? \Illuminate\Support\Facades\Storage::url($data) : null;
    }

    /**
     * @param $name
     * @return string
     */
    public function uniqueSlug()
    {
        $username = Str::slug($this->name, '-');

        if(Hospital::where('slug',$username)->exists()) {
            $username = $username . '-' . rand(11111, 99999);
        }

        return $username;
    }
}
