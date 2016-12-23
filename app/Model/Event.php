<?php
App::uses('AppModel', 'Model');

  class Event extends Model
  {
      public function afterSave($created, $options = array())
      {
        if($created)
        {
            $content = array(
              "en" => $this->data['Event']['description']
            );
            $title = array(
              "en" => $this->data['Event']['title']
            );
            // $big_pic = "";
            if(isset($this->data['Event']['image_file']))
            {

//              $big_pic = $this->webroot."/files/event/image_file/".$this->data['Event']['image_dir']."/api_".$this->data['Event']['image_file'];
              $img_icon = "http://sufyan.co.in/cvc/app/webroot/files/event/image_file/".$this->data['Event']['image_dir']."/api_".$this->data['Event']['image_file'];

              // $big_pic = "http://www.sufyan.co.in/cvc/app/webroot/files/event/image_file/".$this->data['Event']['image_dir']."/".$this->data['Event']['image_file'];
              // $big_pic = "http://sufyan.co.in/cvc/app/webroot/files/event/image_file/57b85230-ad68-42f8-aa93-48580a0283cf/api_intel-building_678x452.jpg";
            }
            $logo = "http://sufyan.co.in/cvc/app/webroot/img/cvc.jpg";
            $fields = array(
              'app_id' => "c9334183-ce9d-4e60-8bb4-ac59427c403c",
              'included_segments' => ['All'],
              'contents' => $content,
              'headings' => $title,
              'big_picture' => $img_icon,
              'large_icon' => $logo,

            );

            $fields = json_encode($fields);

            $ch = curl_init();
             curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
             curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                                    'Authorization: Basic NmNhOTAyZDctMzhhMC00Mzc4LWI3NTAtZjllN2UxYWMyYTFm'));
             curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
             curl_setopt($ch, CURLOPT_HEADER, FALSE);
             curl_setopt($ch, CURLOPT_POST, TRUE);
             curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
             curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

             $response = curl_exec($ch);
             curl_close($ch);
        }

        return true;
      }
    public $actsAs = array(
          'Upload.Upload' => array(

              // Field in the table which will store the path of the image
              'image_file' => array(

                  // Allowed mime types
                  'mimetypes'=> array('image/jpg','image/jpeg', 'image/png'),

                  // Use php for localhost or where imagick is not installed
                  'thumbnailMethod'=>"php",

                  // Allowed set of extensions
                  'extensions'=> array('jpg','png','JPG','PNG','jpeg','JPEG'),

                  'thumbnailSizes' => array(


                      // 'sm' => '[200x200]',
                      'tm' => '[100x100]',
                      'api' => '[300x240]',
                      // 'md' => '[500x400]',
                      // 'big' => '[800x640]',
                      // 'hd' => '[1000x800]'
                   ),

                  // Map the directory path to specified field in the table
                  'fields' => array(
                      'dir' => 'image_dir'
                  )
              )
          )
      );
  }



?>
