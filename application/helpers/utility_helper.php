<?php
function post_curl($_url, $_param){
  $CI =& get_instance();
  $session = $CI->session->userdata('key');

  // $session = $CI->session->userdata('key');
  $postData = '';

  if($_param!=null){
    $postData = http_build_query($_param);
  }

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL,$CI->config->item('api_url').'/'.$_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'x-api-key:00woowscocc84gsg40ko440gs0c40og44c0kkcow' //.$session['key']
  ));
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_POST, $postData);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

  $output=curl_exec($ch);
  curl_close($ch);
  return json_decode($output, true);
}
?>