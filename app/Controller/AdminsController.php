<?php

App::uses('AppController', 'Controller');

class AdminsController extends AppController
{
    public $uses = array('Admin','Event');
    public $components = array('Paginator');


    public function beforeFilter()
    {
      AppController::beforeFilter();
      //Basic Setup
      $this->Auth->authenticate = array('Form');
      $this->Auth->authenticate = array(
          'Form' => array('userModel' => 'Admin')
      );
      $this->Auth->allow('login'); //Without Logged IN which page can be access.. assign here
    }

    public function index()
    {
      $this->layout = 'base_layout';

      $this -> set('page_title', 'Dashboard');

      //Admins Count
      $admins_count = $this->Admin->find('count');
      $this->set('admins_count' , $admins_count);

      //Events Count
      $events_count = $this->Event->find('count');
      $this->set('events_count' , $events_count);
    }

    public function login()
    {
      $this->layout = 'login_layout';
      if($this->request->is('post'))
      {
        if($this->Auth->login())
        {
          $user_access_detail = $this->Session->read('Auth');
          return $this->redirect($this->Auth->redirectUrl(array('controller'=>'admins','action'=>'index')));
          // return $this->redirect(array('action' => 'index'));
        }
        else
        {
          # code...
          $this->Session->setFlash('<div class="alert alert-danger alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      Invalid credentials.
                                    </div>');
        }
      }
    }




    //Add Admin
    public function add()
    {
      // if($this->Session->read('Auth.User.access') != 1)
      // {
      //   return $this -> redirect(array('controller' => 'users', 'action' => 'index'));
      // }
      $this->layout = 'base_layout';
      $this -> set('page_title', 'Add Admin');

      if($this->request->is('post'))
      {
        $temp = $this->request->data;
        $check = $this->Admin->find('all',array('conditions'=>array('Admin.username'=>$temp['Admin']['username'])));

        if(sizeof($check) > 0)
        {
          # code...
          $this->Session->setFlash('<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      Oops! Username is already exists.
                                    </div>');
           $this -> redirect(array('controller' => 'admins', 'action' => 'add'));
        }
        else {
          # code...
          if($this->Admin->save($temp))
          {
            $tempMsg = "<div class=\"alert alert-success alert-dismissable\">
                          <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                          Admin <b>`".$temp['Admin']['username']."`</b> has been added.</div>";

              $this->Session->setFlash($tempMsg);
              $this -> redirect(array('controller' => 'admins', 'action' => 'view'));
          }
          else {
            # code...
            $this->Session->setFlash('<div class="alert alert-danger alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Oops! Something went wrong. Please try again later.
                                      </div>');
             $this -> redirect(array('controller' => 'admins', 'action' => 'view'));
          }
        }
      }
    }


    //view

  public function view()
  {
      // if($this->Session->read('Auth.User.access') != 1)
      // {
      //   return $this -> redirect(array('controller' => 'users', 'action' => 'index'));
      // }
      $this->layout = 'base_layout';
      $this -> set('page_title', 'View Admins');

      $this->Paginator->settings = array(
          'limit' => 10,
          'order' => 'Admin.created DESC'
      );
      $data = $this->Paginator->paginate('Admin');
      $this->set('admins', $data);
  }

  public function logout()
  {
    $this->Auth->logout();
    return $this->redirect(array('action' => 'login'));
  }
}

?>
