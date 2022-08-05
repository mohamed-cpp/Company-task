<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\UploadedFile;

class Employee extends Authenticatable
{
    use HasFactory;



    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'company_id',
    ];

    protected $hidden = ['password', 'remember_token'];



    public function company(){
        return $this->belongsTo(Company::class);
    }


    public function setProfileImageAttribute($file)
    {
        if ($file instanceof UploadedFile) {
            $file->move($this->photoPath(),$imageName = $file->hashName());
            (new Filesystem())->delete($this->photoPath($this->profile_image));
            $this->attributes['profile_image'] = $imageName;
        }
    }






    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationFor()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function photoPath( $name = null){
        return storage_path("app/public/employee/profile_image/$name");
    }

    /**
     * @return string
     */
    public function photoUrl(){
        return $this->profile_image ? asset("storage/employee/profile_image/{$this->profile_image}") :
            asset("/assets/images/users/company.png");
    }

    public function getPhotoUrlPath(){
        return asset("storage/employee/profile_image/");
    }

    /**
     * Get the guard to be used during password reset.
     * @param array $guarded
     * @return StatefulGuard|\Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard
     */
    public function guard(array $guarded)
    {
        return Auth::guard('employee');
    }
}
