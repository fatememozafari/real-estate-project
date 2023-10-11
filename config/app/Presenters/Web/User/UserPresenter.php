<?php

namespace App\Presenters\Web\User;

use App\Contants\Constant;
use App\Presenters\Contracts\Presenter;

class UserPresenter extends Presenter
{
    public function avatar()
    {

        return (!is_null($this->entity->avatar) || !empty($this->entity->avatar))
            ? str_replace('\\', '/', asset(Constant::USER_AVATAR_PATH . $this->entity->avatar ))
            : asset('admin-assets/assets/media/svg/avatars/blank-dark.svg');
    }

    public function status()
    {
        if ($this->entity->status == Constant::ACTIVE) {
            return "<span class='badge badge-light-success p-3'>" . Constant::getActivityStatuses($this->entity->status) . "</span>";
        } elseif ($this->entity->status == Constant::IN_ACTIVE) {
            return "<span class='badge badge-light-danger p-3'>" . Constant::getActivityStatuses($this->entity->status) . "</span>";
        }
    }

}
