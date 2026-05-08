<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\LogsActivity;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,  LogsActivity;
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
     protected $fillable = [
                'name',
                'email',
                'password',
                'avatar',
                'google_id',
                'role',
                'client_id'
    ];

    public function esAdmin()
    {
        return $this->role === 'admin';
    }

    public function iniciales()
    {
        return strtoupper(substr($this->name, 0, 2));
    }

    public function avatarUrl()
    {
        return $this->avatar
            ? $this->avatar
            : asset('/images/user/owner.png');
    }

    public function whatsappLink()
    {
        return wa_link($this->phone);
    }

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
}
