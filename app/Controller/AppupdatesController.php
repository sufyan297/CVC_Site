<?php

App::uses('AppController', 'Controller');

class AppupdatesController extends AppController
{
    public $uses = array('Appupdate');
    public $components = array('Paginator');

    public function add()
    {
        $this->layout ='base_layout';
        $this -> set('page_title', 'Add Update');
        if ($this->request->is('post'))
        {
            $pTitle = $this->request->data['Appupdate']['version'];
            $this->Appupdate->create('Appupdate');
            if($this->Appupdate->save($this->request->data))
            {
                $recent_file = $this->Appupdate->find('first',array('order'=>'Appupdate.created DESC'));
                $fpath = "../../app/webroot/files/appupdate/file_url/".$recent_file['Appupdate']['file_dir']."/".$recent_file['Appupdate']['file_url'];
                $fBytes = filesize($fpath);

                $fKbs = ($fBytes / 1024);
                $fMbs = ($fKbs / 1024);
                $fMbs = round($fMbs, 2);
                // pr($fMbs);


                $this->Appupdate->id = $recent_file['Appupdate']['id'];
                $this->Appupdate->saveField('file_size',$fMbs);
                $tempMsg = "<div class=\"alert alert-success alert-dismissable\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                            New App Update <b>`$pTitle`</b> has been added.</div>";

                            $this->Session->setFlash($tempMsg);
                            $this -> redirect(array('controller' => 'appupdates', 'action' => 'view'));

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


    public function view()
    {
        $this->layout ='base_layout';
        $this -> set('page_title', 'View Updates');

        $this->Paginator->settings = array(
            'limit' => 20,
            'order' => 'Appupdate.created DESC'
        );
        $data = $this->Paginator->paginate('Appupdate');
        $this->set('appupdates', $data);
    }

    public function delete($id = null)
    {
        if ($this->Appupdate->delete($id)) {

          $this->Session->setFlash('<div class="alert alert-success alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                      The App Update has been deleted.
                                    </div>');
        }
        else {
            $this->Session->setFlash('<div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        Oops! Something went wrong! Please try again later.
                                      </div>');
        }
        return $this->redirect(array('controller'=>'appupdates','action' => 'view'));
    }
}
