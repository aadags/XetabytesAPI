<?php
/*  file upload script for xetabytes cloud storage
 *  This code is free for use as long as its under the terms of use on xetabytes.com/terms.html
 *
 *   Note the parameters
 *
 *   - file => file data
 *   - file_name => base name of file
 *   - key => private key
 *   - dir => any desired sub directory in your default root folder [MyFiles]   
 *
 *   by Adagunodo Ayoola A.   aadags@yahoo.com   @dr_adags
*/

if ( isset($_FILES['uploadedfile']) and !empty($_FILES['uploadedfile']['tmp_name']) ) {

 $file  = $_FILES['uploadedfile']['tmp_name'];
 $handle    = fopen($file, "r");
 $data      = fread($handle, filesize($file));

 $key = 'private_key';   //your private key here
 $dir = 'sub_directory';   //optional - sub folder in your cloud.

 $file_name = pathinfo($_FILES['uploadedfile']['name'],PATHINFO_BASENAME);

 $post_data = array(
   'file' => $data,
   'file_name' => $file_name,
   'dir' => $dir, //optional
   'key' => $key
 );

 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, 'https://www.xetabytes.com/api/v1/upload');
 curl_setopt($curl, CURLOPT_POST, 1);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
 $response = curl_exec($curl);
 curl_close ($curl);
 print_r($response);

}
?>

<form enctype="multipart/form-data" encoding='multipart/form-data' method='post' action="">
  <input name="uploadedfile" type="file" value="choose">
  <input type="submit" value="Upload">
</form>