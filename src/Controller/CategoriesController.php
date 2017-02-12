<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/*
* Created by Lucas Ansalone
* MailChimp API Connect With CakePHP 3 
*/ 
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
class CategoriesController extends AppController
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
            'News.name' => 'asc'
        ]
    ];

    public function index()
    {
        $categories = $this->Categories->find('threaded')
            ->order(['lft' => 'ASC']);
        $this->set('categories', $this->paginate($categories));
    }

    public function moveUp($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $category = $this->Categories->get($id);
        if ($this->Categories->moveUp($category)) {
            $this->Flash->success('The category has been moved Up.');
        } else {
            $this->Flash->error('The category could not be moved up. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }

    public function moveDown($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $category = $this->Categories->get($id);
        if ($this->Categories->moveDown($category)) {
            $this->Flash->success('The category has been moved down.');
        } else {
            $this->Flash->error('The category could not be moved down. Please, try again.');
        }
        return $this->redirect($this->referer(['action' => 'index']));
    }

    /* Edit Categories
     * We get the id of the news from the url
     */
    public function edit($id = null)
    {
        $categories = $this->Categories->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Categories->patchEntity($categories, $this->request->data);
            if ($this->Categories->save($categories)) {
                $this->Flash->success(__('Your Category has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your category.'));
        }
    
        $this->set('categories', $categories);
    }
    
    /* Delete Categories */
    public function delete($id)
    {
        $this->request->allowMethod(['post', 'delete']);
    
        $categories = $this->Categories->get($id);
        if ($this->Categories->delete($categories)) {
            $this->Flash->success(__('The Category with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'categories']);
        }
    }
    
    public function add()
    {
        //Add Category and asign to user id.
        $categories = $this->Categories->newEntity();
        $this->set('categories', $categories);

         if ($this->request->is('post'))
         {
             $categories = $this->Categories->patchEntity($categories, $this->request->data);
             $categories->user_id = $this->Auth->user('id');

             if ($result = $this->Categories->save($categories))
             {
                 $this->Flash->success(__('Your Category has been saved.'));
                 return $this->redirect(['action' => 'index']);
             }
             $this->Flash->error(__('Unable to add your article.'));
         }
    }
}