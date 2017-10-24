<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

    public $CI;

    public function __construct() {
        $this->CI =& get_instance();
    }

    function hash_password($pwd, $salt = null) {
        if ($salt === null) {
            $salt = substr(md5(uniqid(rand(), true)), 0, $this->CI->config->item('salt_length'));
        } else {
            $salt = substr($salt, 0, $this->CI->config->item('salt_length'));
        }
    
        return $salt . sha1($pwd . $salt);
    }

    function verify_hash($string, $hash){
        if ($hash == $this->hash_password($string, substr($hash, 0, $this->CI->config->item('salt_length')))) {
            return true;
        } else {
            return false;
        }
    }

    function isLoggedIn(){
        if($this->verifyUser()) {
            return true;
        } else {
            return false;
        }
    }

    function verifyUser() {
        $cookie = $this->CI->session->userdata('logged_in');
        parse_str($cookie, $cookie);

        if(!isset($cookie['data']))
            return null;

        $user = $this->CI->db->get_where('users', array('username' => $cookie['data']))->row();

  //      $user = database::go()->get('user', array('username', '=', $cookie['data']))->first();
        
        if($user){
            return true;
        }else {
            return false;
        }
    }

    public function login($username, $password){
        $user = $this->CI->db->get_where('users', array('username' => $username))->row();
        
    if($this->verify_hash($password, $user->password)){
        
      $cookie = 'data=' . urlencode($username) . '&auth=' . urlencode($this->hash_password($username . $password));
      $digest = urlencode(hash_hmac('SHA512', $cookie, rand(22,999999*1000000)));
      $auth = $cookie . '&digest=' . urlencode($digest);

      $this->CI->session->set_userdata('logged_in', $auth);
      $this->CI->session->set_userdata('id', $user->id);
      return true;
    }else{
      return false;
    }
  }

  function logout() {
    $this->CI->session->unset_userdata('logged_in');
    $this->CI->session->unset_userdata('id');

    return true;
  }
    

}