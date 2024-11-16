<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class Resident extends AuthenticatableUser implements Authenticatable 
{
    use HasFactory, Notifiable;
    protected $table = 'residents';
    protected $primaryKey = 'reg_number'; // Define the custom primary key

    public $incrementing = false; // Disable auto-incrementing

    protected $fillable = [
        'id',
        'reg_number',
        'lname',
        'fname',
        'mname',
        'ext',
        'address',
        'household',
        'Birth',
        'birthday',
        'age',
        'cnum',
        'gender',
        'civil',
        'citizenship',
        'occupation',
        'indicate_if',
        'owner_type',
        'owner_name',
        'number_of_family',
        'proof_of_owner',
        'voters_filename',
        'valid_id_filename',
        'image_filename',
        'email',
        'password',
        'status' => 'pending',
        // Add other fillable fields here as needed
    ];
    protected $hidden = [
        'password',
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }
    // Other model code...
    public function isResident()
{
    // Implement your logic to check if the user is a resident
    // For example, if residents have a specific role in your system
    return $this->role === 'resident';
}

public function getAuthIdentifierName()
{
    return 'email';
}

public function getAuthIdentifier()
{
    return $this->getKey();
}


public function getRememberToken()
{
    return null; // not needed for your case
}

public function setRememberToken($value)
{
    // not needed for your case
}

public function getRememberTokenName()
{
    return null; // not needed for your case
}
public function declinedNotifications()
    {
        return $this->hasMany(DeclinedNotification::class);
    }
}
