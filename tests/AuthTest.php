<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthTest {
  function loading(&$ci) {
    $params = array(
      "auth" => array (
        "yellowFlash9" => '$2y$10$wuOKvWHNwI67zIutZJyuU..u1ZqVyI2zCr5cMJIOkvnFnsqTFfMTS'
      )
    );
    $ci->load->splint("francis94c/http-auth", "+HTTPAuth", $params, "auth");
    $ci->auth->authenticate();
  }
}
?>
