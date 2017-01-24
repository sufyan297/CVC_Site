<?php
App::uses('HttpSocket','Network/Http');

  class ApiController extends AppController
  {

    // $ACCES_TOKEN = "EAACBSsPOPNEBAFXHUd9C9vfeebm9nZBQhtvyfLNgMlpKhuxLIy1K3edNCco0WyLtetfBJ5bUQD3uhR3fZCfMMxTXevVbkmAxZB52U5Tr3Ppixqe8PkfX97A8Med4298FYJbJ7Y5OrOiI60JuieyAZCZAQ5uE8rpwZD";
    public $uses = array('Admin','Event','Appupdate');
    public function beforeFilter() {
      AppController::beforeFilter();
      $this->Auth->allow('getEvents','check_for_updates','getFacebookPageInfo','getFacebookFeed','getMoreFacebookFeed');
      date_default_timezone_set("Asia/Kolkata");
    }

    public function getEvents()
    {
        $data = $this->Event->find('all',array('order'=>'Event.created DESC','limit'=>10));
        if(sizeof($data) > 0)
        {
          $res = new ResponseObject();
          $res->status = 'success';
          $res->data = $data;
          $res->message = 'Events found.';
          $this->response->body(json_encode($res));
          return $this->response;
        }
        else {
          # code...
          $res = new ResponseObject();
          $res->status = 'error';
          $res->message = 'No events found.';
          $this->response->body(json_encode($res));
          return $this->response;
        }
    }
 
    function getToken()
    {
        // return "EAACBSsPOPNEBAFXHUd9C9vfeebm9nZBQhtvyfLNgMlpKhuxLIy1K3edNCco0WyLtetfBJ5bUQD3uhR3fZCfMMxTXevVbkmAxZB52U5Tr3Ppixqe8PkfX97A8Med4298FYJbJ7Y5OrOiI60JuieyAZCZAQ5uE8rpwZD";
        return "EAACBSsPOPNEBAPA3M2awPKtuBsycyvj6scSQNl6PFKsNJh53lNMdHdPII1XjFvO36MnALp77eztUjrjmv60BZCLQ84ZClaZBNQ6bVFdK928ZBwHnHpZBHF4VeBNpDZA3YWUz1vW8HYVhp7stYNW1LsyNmrRPqhXIQZD";
    }
    public function check_for_updates()
    {
          $data = $this->Appupdate->find('first',array('order'=>'Appupdate.created DESC'));
          if(sizeof($data) > 0)
          {
              $res = new ResponseObject();
              $res->status = 'success';
              $res->data = $data;
              $res->message = 'Update found.';
              $this->response->body(json_encode($res));
              return $this->response;
          }
          else {
              # code...
              $res = new ResponseObject();
              $res->status = 'error';
              $res->message = 'No updates found.';
              $this->response->body(json_encode($res));
              return $this->response;
          }
    }

    function getFacebookPageInfo()
    {
         $rest_url = "https://graph.facebook.com/v2.7/ChangeVadodara?fields=picture%7Burl%7D%2Cname&access_token=".$this->getToken();
         $HttpSocket = new HttpSocket();
         $resp = $HttpSocket->get($rest_url);

         $resp = json_decode($resp,true);

         $res = new ResponseObject();
         $res->status = 'success';
         $res->data = $resp;
         $res->message = 'PageInfo found.';
         $this->response->body(json_encode($res));
         return $this->response;
    }

    function getFacebookFeed()
    {
        if($this->request->is('post'))
        {
            // $data =  $this->request->input('json_decode',true);
            $rest_url = "https://graph.facebook.com/v2.7/ChangeVadodara/feed?fields=picture%2Cmessage%2Cfull_picture%2Clikes.limit(99)%2Ccreated_time&limit=10&access_token=".$this->getToken();
            $HttpSocket = new HttpSocket();
            $resp = $HttpSocket->get($rest_url);

            $resp = json_decode($resp,true);
            if(isset($resp['error']))
            {
                $res = new ResponseObject();
                $res->status = 'error';
                $res->message = 'Oops! Something went wrong.';
                $this->response->body(json_encode($res));
                return $this->response;
            }
            else {
                # code...
                $res = new ResponseObject();
                $res->status = 'success';
                $res->data = $resp;
                $res->message = 'Feed found.';
                $this->response->body(json_encode($res));
                return $this->response;
            }

        }
    }

    function getMoreFacebookFeed()
    {
        if($this->request->is('post'))
        {
            $data =  $this->request->input('json_decode',true);
            $HttpSocket = new HttpSocket();
            $resp = $HttpSocket->get($data['bookmark']);
            $resp = json_decode($resp,true);

            if(isset($resp['error']))
            {
                $res = new ResponseObject();
                $res->status = 'error';
                $res->message = 'Oops! Something went wrong.';
                $this->response->body(json_encode($res));
                return $this->response;
            }
            else {
                # code...
                $res = new ResponseObject();
                $res->status = 'success';
                $res->data = $resp;
                $res->message = 'Feed found.';
                $this->response->body(json_encode($res));
                return $this->response;
            }
        }
    }





  }

?>
