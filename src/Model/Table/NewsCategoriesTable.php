<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
class NewsCategoriesTable extends Table
{

    public function initialize(array $config)
    {
         $this->table('categories');
	     $this->displayField('name');
	     $this->primaryKey('id');
	     $this->addBehavior('Timestamp');

	     $this->belongsToMany('News', [
	         'alias' => 'News',
	         'foreignKey' => 'category_id',
	         'targetForeignKey' => 'news_id',
	         'joinTable' => 'news_categories'
	     ]);
	     $this->addBehavior('Tree');
    }
}