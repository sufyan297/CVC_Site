<?php

App::uses('AppController', 'Controller');

class EventsController extends AppController
{
    public $uses = array('Event');
    public $components = array('Paginator');

    public function beforeFilter()
    {
      date_default_timezone_set("Asia/Kolkata");
    }


    public function add()
    {
        $this->layout = 'base_layout';
        $this -> set('page_title', 'Add Event');
        if ($this->request->is('post'))
        {
          $pTitle = $this->request->data['Event']['title'];

            $this->Event->create('Event');
            if($this->Event->save($this->request->data))
            {
                $tempMsg = "<div class=\"alert alert-success alert-dismissable\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                            New Event <b>`$pTitle`</b> has been added.</div>";

                            $this->Session->setFlash($tempMsg);
                            $this -> redirect(array('controller' => 'events', 'action' => 'view'));

            }
            else
            {
                $this->Session->setFlash('<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                          Oops! Something went wrong! Please try again later.
                                        </div>');
            }
        }
    }



    //View events
    public function view()
    {
      $this->layout = 'base_layout';
      $this -> set('page_title', 'View Events');

      $this->Paginator->settings = array(
          'limit' => 20,
          'order' => 'Event.created DESC'
      );
      $data = $this->Paginator->paginate('Event');
      $this->set('events', $data);

    }
    //edit Event
    public function edit($id = null)
    {
        $this->layout = 'base_layout';
        $this -> set('page_title', 'Edit Event');

        if (!$id) {
          throw new NotFoundException(__('Invalid post'));
        }
        $temp = $this->Event->findById($id);

        if (!$temp) {
            throw new NotFoundException(__('Invalid post'));
        }

        $this->set('event', $temp);

        if ($this->request->is('post'))
        {

            $temp2 = $this->request->data;
          // pr($temp2); die('Under POST');
            $this->Event->id = $id;
            if ($this->Event->save($temp2))
            {
                $tempMsg = "<div class=\"alert alert-success alert-dismissable\">
                              <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                              Event <b>`".$temp2['Event']['title']."`</b> has been edited.</div>";

                $this->Session->setFlash($tempMsg);
                $this -> redirect(array('controller' => 'events', 'action' => 'view'));
            }
            else
            {
                $this->Session->setFlash('<div class="alert alert-danger alert-dismissable">
                                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            Oops! Something went wrong! Please try again later.
                                          </div>');
            }
        }
    }
    //delete events
    public function delete($id = null)
    {
        $this->layout = 'base_layout';
        if ($this->Event->delete($id)) {

          $this->Session->setFlash('<div class="alert alert-success alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      The Event has been deleted.
                                    </div>');
        }
        else {
            $this->Session->setFlash('<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Oops! Something went wrong! Please try again later.
                                      </div>');
        }
        return $this->redirect(array('controller'=>'events','action' => 'view'));
    }
}
?>
