<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\UploadedFile;



class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'logo',

    ];

    public function posts(){
        return $this->hasMany(Employee::class);
    }

    public function setLogoAttribute($file)
    {
        if ($file instanceof UploadedFile) {
            $file->move($this->photoPath(),$imageName = $file->hashName());
            (new Filesystem())->delete($this->photoPath($this->logo));
            $this->attributes['logo'] = $imageName;
        }
    }
    /**
     * @return string
     */
    public function photoPath( $name = null){
        return storage_path("app/public/company/logo/$name");
    }

    /**
     * @return string
     */
    public function photoUrl(){
        return $this->logo ? asset("storage/company/logo/{$this->logo}") :
            asset("/assets/images/users/company.png");
    }
    public function getPhotoUrlPath(){
        return asset("storage/company/logo/");
    }
}
