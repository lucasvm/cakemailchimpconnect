<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class NewsTable extends Table
{
		public function initialize(array $config)
		{
			$this->addBehavior('Timestamp');
		}
		
		public function isOwnedBy($newsId, $userId)
		{
			return $this->exists(['id' => $newsId, 'user_id' => $userId]);
		}
}