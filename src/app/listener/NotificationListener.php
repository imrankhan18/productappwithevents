<?php
namespace App\Listener;

use Phalcon\Di\Injectable;
use Phalcon\Events\Events;
use Phalcon\Events as EventsManager;

 class NotificationListener extends Injectable
 {
    public function beforeHandleRequest(\Phalcon\Events\Event $event, \Phalcon\Mvc\Application $application) {
        $aclfile = APP_PATH . '/security/acl.cache';
        if(true === is_file($aclfile)) {
            $acl = unserialize(file_get_contents($aclfile));
        }
        $role = $application->request->get("role");
        $controller=$this->router->getControllerName();
        $action=$this->router->getActionName();
        // if (empty($action)) {
        //     $action='index';
        // }
        if (!$role || true !== $acl->isAllowed($role, "$controller", "$action")) {
            echo "Access Denied:("; 
            die;
        } else {
        //     echo "we don't find any acl list.";
        //     die;
        }

    }
 }

