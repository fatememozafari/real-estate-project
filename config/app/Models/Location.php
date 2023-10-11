<?php

namespace App\Models;

use App\Filters\Contracts\Filterable;
use App\Presenters\Contracts\Presentable;
use App\Presenters\Web\Administrator\AdministratorPresenter;
use App\Presenters\Web\Location\LocationPresenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory, Presentable,Filterable;
    public $webPresenter = LocationPresenter::class;

    protected $guarded = ['id'];

    public function avatars()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function realEstate()
    {
        return $this->belongsTo(RealEstate::class);
    }
}
