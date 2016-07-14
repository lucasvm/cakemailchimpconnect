<?php
namespace App\Controller;
class NewsController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		//Load paginator component
        $this->loadComponent('Paginator');
		
		// We set to our custom layout with Boostrap
		//$this->layout = 'default';
	}
	
	//pagination limit to 25 order by title asc
	public $paginate = [
        'limit' => 2,
        'order' => [
            'News.title' => 'asc'
        ]
    ];
	
	public function isAuthorized($user)
	{
		// All registered users can add articles
		if ($this->request->action === 'add') {
			return true;
		}
	
		// The owner of an article can edit and delete it
		if (in_array($this->request->action, ['edit', 'delete'])) {
			$newsId = (int)$this->request->params['pass'][0];
			if ($this->News->isOwnedBy($newsId, $user['id'])) {
				return true;
			}
		}
	
		return parent::isAuthorized($user);
	}
	
	public function index()
	{
		//Main page, list all news
		
		$this->set('title', 'Test-title');
		
		//We retrieve only news with status published
		$news = $this->News->find('all')
    				 ->where(['News.status =' => '1']);
					 
		$this->set(compact('news'));
	}
	
	public function view($id = null)
	{
		//Single news page
		$news = $this->News->get($id);
		$this->set(compact('news'));
	}
	
	/* Edit News
	 * We get the id of the news from the url
 	 */
	public function edit($id = null)
	{
		$news = $this->News->get($id);
		if ($this->request->is(['post', 'put'])) {
			$this->News->patchEntity($news, $this->request->data);
			if ($this->News->save($news)) {
				$this->Flash->success(__('Your news has been updated.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to update your news.'));
		}
	
		$this->set('news', $news);
	}
	
	/* Delete News */
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$news = $this->News->get($id);
		if ($this->News->delete($news)) {
			$this->Flash->success(__('The News with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'news']);
		}
	}
	
	public function add()
	{
		//Add news and asign to user id.
		$news = $this->News->newEntity();
		
		
		$this->loadModel('Categories');
		
		$this->set('categories', $this->Categories->find('all'));
		
		
		if ($this->request->is('post')) {
			$newsN = $this->News->patchEntity($news, $this->request->data);
			$photos = $this->request->data['ad_photos'];
			foreach ($photos as $photo ) {
                $photo = [
                    'name' => $this->request->data['ad_photos']['name'],
                    'type' => $this->request->data['ad_photos']['type'],
                    'tmp_name' => $this->request->data['ad_photos']['tmp_name'],
                    'error' => $this->request->data['ad_photos']['error'],
                    'size' => $this->request->data['ad_photos']['size']
                ];
                //echo "<pre>"; print_r($photo); echo "</pre>";
            }
			$news->user_id = $this->Auth->user('id');

			$newData = ['user_id' => $this->Auth->user('id')];
			$newsN = $this->News->patchEntity($newsN, $newData);
			if ($this->News->save($news)) {
				$this->Flash->success(__('Your news has been saved.'));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__('Unable to add your article.'));
		}
		$this->set('news', $news);
	}
	
	public function tags()
	{
		// The 'pass' key is provided by CakePHP and contains all
		// the passed URL path segments in the request.
		$tags = $this->request->params['pass'];
	
		// Use the BookmarksTable to find tagged bookmarks.
		$bookmarks = $this->Bookmarks->find('tagged', [
			'tags' => $tags
		]);
	
		// Pass variables into the view template context.
		$this->set([
			'bookmarks' => $bookmarks,
			'tags' => $tags
		]);
	}


}
