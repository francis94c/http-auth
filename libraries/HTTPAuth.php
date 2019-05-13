<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HTTPAuth {

  private $auth           = array();
  private $realm          = "CI HTTP AUTH";
  private $denied_message = "Access Denied!" ;

  function __construct($params=null) {
    if ($params != null) {
      if (isset($params["auth"]) && $this->is_assoc($params["auth"])) $this->auth = $params["auth"];
      if (isset($params["realm"])) $this->realm = $params["realm"];
      if (isset($params["denied_message"])) $this->denied_message = $params["denied_message"];
    }
  }
  /**
   * [authenticate description]
   * @param  [type] $username [description]
   * @param  [type] $password [description]
   * @return [type]           [description]
   */
  function authenticate() {
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
      header("WWW-Authenticate: Basic realm=\"$this->realm\"");
      header('HTTP/1.0 401 Unauthorized');
      die($this->denied_message);
    } else {
      if (isset($this->auth[$_SERVER['PHP_AUTH_USER']])) {
        if (!password_verify($_SERVER['PHP_AUTH_PW'], $this->auth[$_SERVER['PHP_AUTH_USER']])) {
          header('HTTP/1.0 401 Unauthorized');
          die($this->denied_message);
        }
      } else {
        die($this->denied_message);
      }
    }
  }
  /**
   * [is_assoc description]
   * @param  [type]  $arr [description]
   * @return boolean      [description]
   */
  private function is_assoc($arr) {
    return array_keys($arr) !== range(0, count($arr) - 1);
  }
}
?>
