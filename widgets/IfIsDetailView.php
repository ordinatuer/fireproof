<?php
namespace app\widgets;

use yii\widgets\DetailView;

class IfIsDetailView extends DetailView
{
    protected function normalizeAttributes()
    {
        parent::normalizeAttributes();

        foreach($this->attributes as $i => $attribute) {
            if (!$this->model->{$attribute['attribute']}) {
                unset($this->attributes[$i]);
            }
        }
    }
}