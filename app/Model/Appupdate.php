<?php
App::uses('AppModel', 'Model');

  class Appupdate extends Model
  {
    public function afterSave($created, $options = array())
    {
        if($created)
        {
            $content = array(
              "en" => "Version: ".$this->data['Appupdate']['version']." App size: ".$this->data['Appupdate']['file_size']." MB"." Changelog: ".$this->data['Appupdate']['description']
            );
            $title = array(
              "en" => "New update is available! (v".$this->data['Appupdate']['version'].")"
            );

            $logo = "http://sufyan.co.in/cvc/app/webroot/img/cvc.jpg";
            $fields = array(
              'app_id' => "c9334183-ce9d-4e60-8bb4-ac59427c403c",
              'included_segments' => ['All'],
              'contents' => $content,
              'headings' => $title,
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
              'file_url' => array(

                  // Allowed mime types
                  'mimetypes'=> array('image/jpg','image/jpeg', 'image/png','application/vnd.android.package-archive','application/msword','text/plain','application/pdf','application/vnd.ms-powerpoint'),

                  // Use php for localhost or where imagick is not installed
                  // 'thumbnailMethod'=>"php",

                  // Allowed set of extensions
                  // 'extensions'=> array('jpg','png','JPG','PNG','jpeg','JPEG'),
                  'extensions'=> array('jpg','png','JPG','PNG','jpeg','JPEG','apk','doc','docx','txt','pdf','ppt'),

                  // 'thumbnailSizes' => array(
                  //
                  //
                  //     // 'sm' => '[200x200]',
                  //     // 'tm' => '[100x100]',
                  //     // 'api' => '[300x240]',
                  //     // 'md' => '[500x400]',
                  //     // 'big' => '[800x640]',
                  //     // 'hd' => '[1000x800]'
                  //  ),

                  // Map the directory path to specified field in the table
                  'fields' => array(
                      'dir' => 'file_dir'
                  )
              )
          )
      );
  }



?>
