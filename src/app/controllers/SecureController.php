<?php

use Phalcon\Mvc\Controller;
use Phalcon\Acl\Adapter\Memory;
use Phalcon\Acl\Role;
use Phalcon\Acl\Component;

class SecureController extends Controller
{
    public function BuildAclAction()
    {
    //     $aclfile = APP_PATH . '/security/acl.cache';
    //     if (true !== is_file($aclfile)) {
    //         $acl = new Memory();
    //         $acl->addRole('manager');
    //         $acl->addRole('accounting');
    //         $acl->addRole('guest');
    //         $acl->addComponent(
    //             'test',
    //             [
    //                 'eventtest'
    //             ]
    //         );
    //         $acl->allow('accounting', 'test', 'eventtest');

    //         $acl->deny('guest', '*', '*');
    //         file_put_contents(
    //             $aclfile,
    //             serialize($acl)
    //         );
    //     }
    //     else {
    //         $acl = unserialize(
    //             file_get_contents($aclfile)
    //         );
    //     }
    //     if (true === $acl->isAllowed('accounting', 'test', 'eventtest')) {
    //         echo "Access granted";
    //     } else {
    //         echo "Access denied!!";
    //     }
    // }
}