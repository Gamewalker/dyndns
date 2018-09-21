<?php
/**
 * @author Nick Jansen <https://sitepilot.io>
 * @copyright 2018 - Nick Jansen
 * @license https://opensource.org/licenses/MIT MIT License
 * @version 1.0
 */
namespace website\weyand\dyndns\authentication;
use website\weyand\dyndns;

/**
 * Key authentication class.
 *
 * @author Nick
 */
class key {

    public static function authenticate() {

        if(empty($_GET['ip'])) {
            $_GET['ip'] = $_SERVER['REMOTE_ADDR'];
        }

        if (isset($_GET['key']) && isset(dyndns\config::key_auth_config[$_GET['hostname']]) && $_GET['key'] == dyndns\config::key_auth_config[$_GET['hostname']]) {
            return true;
        }

        header('HTTP/1.0 401 Unauthorized');
        exit;
    }
}
