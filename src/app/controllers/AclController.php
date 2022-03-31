<?php

use Phalcon\Mvc\Controller;
use Phalcon\Acl\Adapter\Memory;
use Phalcon\Acl\Role;
use Phalcon\Acl\Component;

class AclController extends Controller
{
    public function indexAction()
    {
        // $this->view->acl=Permissions::find();
    }
    public function aclAction()
    {   $drop=$this->request->getPost('dropdown');
        $comp=$this->request->getPost('components');
        $act=$this->request->getPost('action');  
       
        $aclfile = APP_PATH . '/security/acl.cache';
        if (true !== is_file($aclfile)) {
            $acl = new Memory();
            $acl->addRole("$drop");
            for($i=0;$i<count($comp);$i++)
            {
          
            $acl->addComponent(
                "$comp[$i]",
                [
                    "$act[$i]",
                ]
            );
          
            $acl->allow("$drop", "*","*");
            // $acl->allow("$drop", "$comp[$i]", "$act[$i]");
            file_put_contents(
                $aclfile,
                serialize($acl)
            );
        } 
        $acl = unserialize(
            file_get_contents($aclfile)
        );
    }
        else {
            $acl = new Memory();
            $acl->addRole("$drop");
            for($i=0;$i<count($comp);$i++)
            {
          
            $acl->addComponent(
                "$comp[$i]",
                [
                    "$act[$i]",
                ]
            );
          
            $acl->allow("$drop", "*","*");
            // $acl->allow("$drop", "$comp[$i]", "$act[$i]");
            file_put_contents(
                $aclfile,
                serialize($acl)
            );
        } 
            $acl = unserialize(
                file_get_contents($aclfile)
            );
        }
       /*  $controller=$this->router->getControllerName();
        $action=$this->router->getActionName();

        if (true === $acl->isAllowed("$drop", $controller,$action)) {
            echo "Access granted";
        } else {
            echo "Access denied!!";
        } */
}
}
