<?php

namespace App\Presenters\Web\Location;

use App\Contants\Constant;
use App\Presenters\Contracts\Presenter;

class LocationPresenter extends Presenter
{

    public function avatar()
    {

        return (!is_null($this->entity->avatar))
            ? str_replace('\\', '/', asset(Constant::LOCATION_AVATAR_PATH . $this->entity->avatar ))
            : asset('admin-assets/assets/media/svg/files/blank-image.svg');
    }



    public function status()
    {
        if ($this->entity->status == Constant::ACTIVE) {
            return "<span class='badge badge-light-success p-3'>" . Constant::getActivityStatuses($this->entity->status) . "</span>";
        } elseif ($this->entity->status == Constant::IN_ACTIVE) {
            return "<span class='badge badge-light-danger p-3'>" . Constant::getActivityStatuses($this->entity->status) . "</span>";
        }
    }

    public function contract()
    {
        if($this->entity->contract == 'for_sale'){
            return " فروش";
        }elseif($this->entity->contract == 'for_rent'){
            return " اجاره";
        }
    }

    public function type()
    {
        if($this->entity->type == 'shop'){
            return "مغازه";
        }elseif($this->entity->type == 'land'){
            return "زمین";
        }elseif($this->entity->type == 'house'){
            return "منزل شخصی";
        }elseif($this->entity->type == 'garden'){
            return "باغ";
        }elseif($this->entity->type == 'villa'){
            return "ویلا";
        }
    }


    public function parking()
    {
        if($this->entity->has_parking == 'yes'){
            return "دارد";
        }elseif($this->entity->has_parking == 'no'){
            return "ندارد";
        }
    }

    public function elevator()
    {
        if($this->entity->has_elevator == 'yes'){
            return "دارد";
        }elseif($this->entity->has_elevator == 'no'){
            return "ندارد";
        }
    }

    public function floorMaterial()
    {
        if($this->entity->floor_material == 'rock'){
            return "سنگ";
        }elseif($this->entity->floor_material == 'parquet'){
            return "پارکت";
        }elseif($this->entity->floor_material == 'cement'){
            return "سیمانی";
        }elseif($this->entity->floor_material == 'carpet'){
            return "موکت";
        }elseif($this->entity->floor_material == 'ceramic'){
            return "سرامیک";
        }
    }

    public function cabinetMaterial()
    {
        if($this->entity->cabinet_material == 'metal'){
            return "فلزی";
        }elseif($this->entity->cabinet_material == 'mdf'){
            return "ام دی اف";
        }elseif($this->entity->cabinet_material == 'memberan'){
            return "ممبران";
        }elseif($this->entity->cabinet_material == 'highglass'){
            return "های گلس";
        }
    }

    public function direction()
    {
        if($this->entity->direction_type == 'north'){
            return "شمالی";
        }elseif($this->entity->direction_type == 'south'){
            return "جنوبی";
        }
    }
}
