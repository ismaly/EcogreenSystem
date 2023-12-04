<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable implements MustVerifyEmail
{
    protected $guarded =['id'];

    use Notifiable;

    public function routeNotificationForMail()
    {
        return $this->email;
    }
    
    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string|null  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function hasVerifiedEmail()
    {
        return !is_null($this->email_verified_at);
    }

    public function markEmailAsVerified()
    {
        $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    // Add the getEmailForVerification method
    public function getEmailForVerification()
    {
        return $this->email;
    }
    public function hasRole($roles)
    {
        return $this->role === $roles || (is_array($roles) && in_array($this->role, $roles));
    }

    public function getFakultasLabelAttribute()
    {
        $fakultasOptions = [
            'Ilkom' => 'Ilmu Komunikasi',
            'Tarbiyah' => 'Ilmu Tarbiyah dan Keguruan',
            'Ushuluddin' => 'Ushuluddin dan Pemikiran Islam',
            'Saintek' => 'Sains dan Teknologi',
            'Febi' => 'Ekonomi dan Bisnis Islam',
            'Syariah' => 'Syariah dan Hukum',
            'Dakwah' => 'Dakwah dan Komunikasi',
            'Adab' => 'Adab dan Humaniora',
            'Psikologi' => 'Psikologi',
            'PascaSarjana' => 'Pasca Sarjana',
            'Lainnya' => 'Lainnya',
        ];

        return $fakultasOptions[$this->attributes['fakultas']];
    }
}
