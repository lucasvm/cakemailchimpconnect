<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class CategoriesTable extends Table
{

    public function initialize(array $config)
    {
        $this->hasMany('SubCategories', [
            'className' => 'Categories',
        ]);

        $this->belongsTo('ParentCategories', [
            'className' => 'Categories',
        ]);
    }
}