<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class Manage extends AbstractAction
{
    public function getTitle()
    {
        return 'Manage';
    }

    public function getIcon()
    {
        return 'voyager-params';
    }

    public function getPolicy()
    {
        return 'add';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-warning pull-right',
        ];
    }

    public function getDefaultRoute()
    {
        return url(route('voyager.peserta.index').'?id='.$this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'pelatihan';
    }
}
