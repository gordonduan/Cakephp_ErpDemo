<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;
/**
 * Sales Controller
 *
 * @property \App\Model\Table\SalesTable $Sales
 *
 * @method \App\Model\Entity\Sale[] paginate($object = null, array $settings = [])
 */
class SalesController extends AppController
{
    public $paginate = [
      'contain' => ['Products', 'Categories'],
      'limit' => 8
    ];
      
    public function initialize()
    {
        // Always enable the CSRF component.
        $this->loadModel('Categories');
        $this->loadModel('Products');
 
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {       
        $sales = $this->paginate($this->Sales);
        $products = $this->Sales->Products->find('list', ['limit' => 200]);
        $categories = $this->Sales->Categories->find('treeList', ['limit' => 200]);
        $this->set(compact('sales', 'products', 'categories'));
        $this->set('_serialize', ['sale', 'prod']);
    }

    /**
     * View method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => ['Products', 'Categories']
        ]);

        $this->set('sale', $sale);
        $this->set('_serialize', ['sale']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $products = $this->Sales->Products->find('list', ['limit' => 200]);
        
        if ($this->request->is('post')) {
            
//            $id = $this->request->getData('id');
//            if (!$id) { $id = 0; }
//            $prod = $this->Sales->Products->findById($id)->toArray();
        
        
            $sale = $this->Sales->newEntity();
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
                $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $categories = $this->Sales->Categories->find('list', ['limit' => 200]);$this->log(444);
        $this->set(compact('sale', 'products', 'categories', 'prod'));
        $this->set('_serialize', ['sale', 'prod']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $sale = $this->Sales->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $sale = $this->Sales->patchEntity($sale, $this->request->getData());
            if ($this->Sales->save($sale)) {
                $this->Flash->success(__('The sale has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The sale could not be saved. Please, try again.'));
        }
        $products = $this->Sales->Products->find('list', ['limit' => 200]);
        $categories = $this->Sales->Categories->find('list', ['limit' => 200]);
        $this->set(compact('sale', 'products', 'categories'));
        $this->set('_serialize', ['sale']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Sale id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $sale = $this->Sales->get($id);
        if ($this->Sales->delete($sale)) {
            $this->Flash->success(__('The sale has been deleted.'));
        } else {
            $this->Flash->error(__('The sale could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function refresh()
    {

      return $this->redirect(['action' => 'index']);

    }    
    
    
    public function search()
    {
       if ($this->request->is('post'))
       {
          if(!empty($this->request->data) && isset($this->request->data) )
          {
               $parent_id = trim($this->request->data('category_id'));
                $conditions=array();
                if(!empty($this->request->data('category_id'))) {
                    $parent_id=$this->request->data('category_id');
                    $this->get_subs($parent_id, $categoryid);   //get all children categories
                    $categoryid[]=$parent_id;
                    $conditions['Sales.category_id in']=$categoryid;
                    $products = $this->Sales->Products->find('list', ['limit' => 200])
                            ->where(["Products.category_id in"  => $categoryid]);
                } else {
                    $products = $this->Sales->Products->find('list', ['limit' => 200]);
                }
                if(!empty($this->request->data('product_id'))) {
                    $conditions['Sales.product_id'] = $this->request->data('product_id');
                }
                if(!empty($this->request->data('keywords'))) {
                    $conditions['Sales.name like'] = "%".$this->request->data('keywords')."%";
                }
             $this->request->session()->write('searchCond', $conditions);
          }
       }
       //session set and read to make the pagination works for the search results.
       if ($this->request->session()->check('searchCond')) {
          $conditions = $this->request->session()->read('searchCond');
       } else {
          $conditions = null;
       }
      $sales = $this->Sales->find('all', [
                    'conditions' => $conditions
                ]);
      
       $categories = $this->Sales->Categories->find('treeList', ['limit' => 200]);
       $this->set('sales',  $this->paginate($sales));
       $this->set('products',$products);
       $this->set('categories', $categories);
       $this->render('index');
    }        
    
  
    /**
     * get_subs method
     * @purpose select category, return all children categories
     * @return $list
     */
    public function get_subs($category_id,&$list=array())
    { 
        $categories = $this->Sales->Categories->find('list', [
                            'keyField' => 'id',
                            'valueField' => ['id']
                            ])
                    ->where(["Categories.parent_id" => $category_id]);
           $categories = array_values($categories->toArray());
        foreach($categories as $val){ 
            $list[] = $val;
            $this->get_subs($val,$list); // recursive call own
        }
        return $list;
    }
    
    /**
     * get_parents method
     * @purpose select product, return its category and all parent categories
     * @return $list
     */
    public function get_parents($category_id,&$list=array())
    { 
        $categories = $this->Sales->Categories->find('list', [
                            'keyField' => 'parent_id',
                            'valueField' => ['parent_id']
                            ])
                    ->where(["Categories.id" => $category_id]);
           $categories = array_values($categories->toArray());
//           $this->log($categories);
//           $this->log(count($categories));
        if (!empty($categories[0])){   
            foreach($categories as $val){ 
                $list[] = $val;
//                $this->log($list);
                $this->get_parents($val,$list);
            }
        }
        return $list;
//        $this->log($list);
    }
    

    /**
     * product filter method
     * @purpose filter all products by categories, return to view
     * @return return Cake\Http\Response to index.ctp ajax request
     */
    public function productfilter() {
        if($this->request->is('ajax')) { //determine is it ajax request
            $categoryid = $this->request->getData('categoryid'); //get category id
            if (!empty($categoryid)) {
                $this->get_subs($categoryid, $productid); //get all children categories
                $productid[]=$categoryid;
                $products = $this->Sales->Products->find('list',[
                        'limit' =>200
                        ])
                    -> where(['Products.category_id in'=> $productid]);
            } else {
                $products = $this->Sales->Products->find('list', ['limit' => 200]);
            }
            $this->response = $this->response->withType('application/json') //set up response type
                    ->withStringBody(json_encode($products)); //set up response data
            return $this->response; //return Cake\Http\Response object
        }
    }
    
   /**
    * category filter method
    * @purpose filter all categories by product, return to view
    * @return return Cake\Http\Response to index.ctp ajax request
    */ 
   public function categoryfilter() {
        if($this->request->is('ajax')) { //determine is it ajax
            $productid = $this->request->getData('productid'); //get product id
            if (!empty($productid)) {
                $categoryid = $this->Sales->Products->get($productid)->category_id;
                $this->get_parents($categoryid, $categories); //get all parents categories
                $categories[]=$categoryid;
                $categoriesid = $this->Sales->Categories->find('list',[
                            'limit' =>200
                            ])
                        -> where(['Categories.id in'=> $categories]);
            } 
//            else {
//                $categoriesid = $this->Sales->Categories->find('treeList', ['limit' => 200]);
//            }
            $this->response = $this->response->withType('application/json') //configure response type
                ->withStringBody(json_encode($categoriesid)); //configure response data
            return $this->response; //return Cake\Http\Response
        }

    }
}   
//    public function search()
//      {
////        $sales = $this->paginate($this->Sales);
////
//////        $this->set(compact('sales'));
////        $this->set('_serialize', ['sales']);
////        $categories = $this->Sales->find('list', ['limit' => 200]);
////        $this->set(compact('sales', 'categories'));
////        //$this->set('_serialize', ['product']);
////        
////        $products = $this->Sales->Products->find('list', ['limit' => 200]);//$this->log(111);//$this->log($products);
////        $categories = $this->Sales->Categories->find('list', ['limit' => 200]);//$this->log(444);
////        $this->set(compact('sale', 'products', 'categories', 'prod'));
////        $this->set('_serialize', ['sale', 'prod']);
//        
//         if ($this->request->is('post'))
//         {
////            $this->log('111');
////            $this->log($this->request->data);
//            if(!empty($this->request->data) && isset($this->request->data) )
//            {
////               $parent_id = trim($this->request->data('category_id'));
//                $query=array();
//                if(!empty($this->request->data('category_id'))) {
//                    $parent_id=$this->request->data('category_id');
//                    $id = $this->Sales->Categories->find('list', [
//                        'limit' =>200,
//                        'keyField' => 'id',
//                        'valueField' => ['id']
//                      ])->where(['OR' => [["categories.parent_id" => $parent_id], ["categories.id" => "$parent_id"]]]);
//                    $id=array_values($id->toArray());
//                    $query['sales.category_id in']=$id;
//                }
//                if(!empty($this->request->data('product_id'))) {
//                    $query['sales.product_id']=$this->request->data('product_id');
//                }
//                if(!empty($this->request->data('keywords'))) {
//                    $query['sales.name like']="%".$this->request->data('keywords')."%";
//                }
////                debug($query);
//                $sales = $this->Sales->find('all', [
//                    'conditions' => $query
//                ]);
//               $sales = $this->paginate($sales);
//               $products = $this->Sales->Products->find('list', ['limit' => 200]);
//               $categories = $this->Sales->Categories->find('list', ['limit' => 200]);
//               $this->set(compact('sales','products','categories'));
//         }
//      } else {
//              $sales = $this->paginate($this->Sales);
//              $products = $this->Sales->Products->find('list', ['limit' => 200]);//$this->log(111);//$this->log($products);
//              $categories = $this->Sales->Categories->find('list', ['limit' => 200]);//$this->log(444);
//              $this->set(compact('sales', 'products', 'categories'));
//              $this->set('_serialize', ['sale', 'prod']);
//             }
//}


//               $parent_id = (empty($this->request->data('category_id')))? '1=1' : $this->request->data('category_id');
//               $product_id = (empty($this->request->data('product_id')))? '1=1' : $this->request->data('product_id');
//               $name = (empty($this->request->data('keywords')))? '1=1' : "%".$this->request->data('keywords')."%";
//               echo ($parent_id);
//               $this->log($product_id);
//               $this->log($name);
//               $resultsArray = $this->Sales
//              ->find()
//              ->where(["categories.name LIKE" => "%".$name."%"]);
               
//               $connection = ConnectionManager::get('default');
//               $id=$connection->execute('(select id from categories where parent_id = :id or id=:id)', ['id' =>$parent_id])->fetchAll('assoc');
//               $sales = $connection->execute('select * from sales where category_id in (select id from categories where parent_id = :id or id=:id) and product_id= :id1 and name like :id2', ['id' =>$parent_id,'id1'=>$product_id,'id2'=>$name])->fetchAll('assoc');
//               $sales = $connection->execute('select * from sales where category_id in (select id from categories where parent_id = :id or id=:id)', ['id' =>$parent_id])->fetchAll('assoc');
//              $id=array(13,20,21);
//               var_dump($id);
//               var_dump(array_values($id));
//              $id= $this->Sales->Categories->find('list', ['limit' => 200])
//                      ->where(['OR' => [["categories.parent_id" => $parent_id], ["categories.id" => "$parent_id"]]]);
//              debug($id->toArray());
//              print_r(array_values($id->toArray()));
//                $id = $this->Sales->Categories->find('list', [
//                        'limit' =>200,
//                        'keyField' => 'id',
//                        'valueField' => ['id']
//                      ])->where(['OR' => [["categories.parent_id" => $parent_id], ["categories.id" => "$parent_id"]]]);
//                $id=array_values($id->toArray());
//                debug($id);
//                debug($product_id);
//                debug($name);
//                debug($id->toArray());
//                debug(array_values($id->toArray()));
//                $id=array_values($id->toArray());
//                print_r($id);
                
//                $sales = $this->Sales
//                ->find()
//                ->where(["sales.category_id in" => $id]);
//                $sales = $this->Sales->find('all', [
//                    'conditions' => ["sales.category_id in" => $id]
//                ]);
              
                
                
//                $sales = $this->Sales
//                ->find()
//                ->where(["sales.category_id in" => $id,
//                        "sales.product_id" => $product_id,
//                        "sales.name LIKE" => $name]);
//              debug($sales->toArray());
//              $id = $this->Sales->Categories
//                ->find('list', [
//                                    'keyField' => 'categories.id',
//                                    'valueField' => 'categories.name'
//                                ])
//                ->where(['OR' => [["categories.parent_id" => $parent_id], ["categories.id" => "$parent_id"]]]);
  
//              debug($id->toArray());
//               $this->log($id);
//               debug($id);
//               print_r($id);
//               print_r(array_values($id));
//               $id=$id->toArray();
//               $this->log($id);
//               debug($id);
//               $sales = $this->Sales
//              ->find()
//              ->where(["sales.category_id in" => $id]);
//               $this->log($sales);
//               if (isset($parent_id)){
//                   $results = $connection->execute('select * from sales where category_id in (select id from categories where parent_id = :id or id=:id)', ['id' =>$parent_id])->fetchAll('assoc');
//                   return;
//                   if (isset($product_id)){
//                       $results = $connection->execute('select * from sales where category_id in (select id from categories where parent_id = :id or id=:id) and product_id= :id1', ['id' =>$parent_id,'id1'=>$product_id])->fetchAll('assoc');
//                       return;
//                       if (isset($name)){
//                           $results = $connection->execute('select * from sales where category_id in (select id from categories where parent_id = :id or id=:id) and product_id= :id1 and name like :id2', ['id' =>$parent_id,'id1'=>$product_id,'id2'=>$name])->fetchAll('assoc');
//                           reutrn;
//                       }
//                   }
//               }
               
//                $this->log($results);  
//                debug($results);
                
//               $this->log($name);
//               $this-log($product_id);
//               $categories_id = $this->Sales->Categories
//                ->find()
//                ->select('id')
//                ->where(['OR' => [["categories.parent_id" => $parent_id], ["categories.id" => "$parent_id"]]]);
               
//                $dsn = "mysql://root:''@localhost/cake_erp";
//                ConnectionManager::config('default', ['url' => $dsn]);
//                $connection = ConnectionManager::get('default');
//                $results = $connection->execute('select id from sales where category_id in (select id from categories where parent_id = :id or id=:id) and sales.product_id = :product_id and sales.name like :name', ['id' =>$parent_id],['product_id' =>$product_id],['name' =>$name])->fetchAll('assoc');
//                $results = $connection->execute('select * from sales where category_id in (select id from categories where parent_id = :id or id=:id)', ['id' =>$parent_id])->fetchAll('assoc');
//                $results = $connection->execute('select * from sales where category_id in (select id from categories where parent_id = :id or id=:id) and product_id= :id1', ['id' =>$parent_id,'id1'=>$product_id])->fetchAll('assoc');
                
//                $results = $connection->execute('select id from categories where parent_id = :id or id=:id', ['id' =>$parent_id])->fetchAll('assoc');
//                $data = $results->toArray();
                
//                $this->log($data);  
//                $this->log($results);  
//                debug($results);
//               $data = $query->toArray();
//               $categories_id = $this->Sales->Categories->query('select id from categories where parent_id =$parent_id or id=$parent_id');
//                    
//               $this->log($categories_id);  
//               debug($categories_id);
               
               
               
//               $this->log($parent_id);
               
//               $product_id = trim($this->request->data('product_id'));
//               $name=trim($this->request->data('keywords'));
//               $resultsArray = $results
//                ->find()
//                ->where(["sales.category_id in" => $data,
//                        "sales.product_id" => $product_id,
//                        "sales.name LIKE" => "%".$name."%"]);
//                debug($resultsArray);
//                 $this->log($resultsArray);
//                $sales = $this->paginate($results);
           
//                $products = $this->Sales->Products->find('list', ['limit' => 200]);//$this->log(111);//$this->log($products);
//                $categories = $this->Sales->Categories->find('list', ['limit' => 200]);//$this->log(444);
//                $this->set(compact('sales', 'products', 'categories', 'prod'));
//                $this->set('_serialize', ['sale', 'prod']);
      //          $this->render('index');
//                return $this->redirect($this->referer());
//            }
//          }