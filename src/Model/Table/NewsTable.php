<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class NewsTable extends Table
{
    public function initialize(array $config)
    {
         $this->addBehavior('Timestamp');

         $this->belongsToMany('Categories', [
         'alias' => 'Categories',
         'foreignKey' => 'category_id',
         'targetForeignKey' => 'id',
         'joinTable' => 'news_categories'
     ]);
    }

}