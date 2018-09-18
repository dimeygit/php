<?php

class AccountController
{
    public function indexAction()
    {
        include 'view/registerView.php';
    }

    public function registrationAction()
    {

        //include 'view/registerView.php';
        header ('Location: ' . BASE_URL );
    }
}

