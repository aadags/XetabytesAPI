<?php
/*  file upload script for xetabytes cloud storage
 *  This code is free for use as long as its under the terms of use on xetabytes.com/terms.html
 *
 *   Note the parameters
 *
 *   - key => private key
 *   - dir => any desired sub directory in your default root folder [MyFiles]    
 *
 *   by Adagunodo Ayoola A.   aadags@yahoo.com   @dr_adags
*/
 $key = 'private_key';
 $folder = 'foldername';  //optional

 $post_data = array(
   'key' => $key,
   'dir' => $folder  //optional
 );

 $curl = curl_init();
 curl_setopt($curl, CURLOPT_URL, 'https://www.xetabytes.com/api/v1/list');
 curl_setopt($curl, CURLOPT_POST, 1);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
 curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
 $response = curl_exec($curl);
 curl_close ($curl);
 print_r($response);

?>