<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'patientName',
        'patientBloodGroup',
        'address',
        'patientMobileNumber',
        'patientDateOfBirth'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
     protected $primaryKey = 'patientId';
    protected $hidden = [
      'patientName',
      'patientBloodGroup',
      'address',
      'patientMobileNumber',
      'patientDateOfBirth'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

}
