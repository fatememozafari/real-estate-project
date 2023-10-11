<?php

namespace App\Models;

use App\Filters\Contracts\Filterable;
use App\Presenters\Contracts\Presentable;
use App\Presenters\Web\Administrator\AdministratorPresenter;
use App\Presenters\Web\RealEstate\RealEstatePresenter;
use App\Support\Acl\HasPermissions;
use App\Support\Acl\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class RealEstate extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Presentable, Filterable;

    public $webPresenter = RealEstatePresenter::class;

    protected $guarded = ['id'];


    public function manager()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'staffs', 'real_estate_id', 'user_id');
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }

}
