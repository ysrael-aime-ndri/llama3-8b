<?php

namespace Epaphrodites\controllers\controllers;

use Epaphrodites\controllers\switchers\MainSwitchers;

final class main extends MainSwitchers
{
    private object $visit;
    private object $session;
    private string $ans = '';
    private string $alert = '';

    public function __construct()
    {
        $this->initializeObjects();
    }

        /**
     * @return void
     */
    private function initializeObjects(): void
    {
        $this->visit = $this->getObject(static::$initNamespace, 'visit');
        $this->session = $this->getFunctionObject(static::initNamespace(), 'session');
    }

    /**
     * Index page
     * 
     * @param string $html
     * @return void
     */
    public final function index(
        string $html
    ):void
    {

        $json = new \Epaphrodites\epaphrodites\env\json\Json();
        
        if (static::isValidMethod()) {
            
            $prompts = static::isAjax('__prompt__') ? static::isAjax('__prompt__') : '';
            $responses = static::isAjax('__response__') ? static::isAjax('__response__') : '';

            $json->path( _DIR_JSON_DATAS_. '/ollama/archive.json')
                    ->add(
                        [
                            'prompt' => $prompts, 
                            'reponses' => $responses
                        ]);

            return;
        }

        $this->views($html, []);
    }
    
    /**
     * Authentification page ( login )
     * 
     * @param string $html
     * @return void
     */
    public final function login(
        string $html
    ): void
    {

        if (static::isValidMethod()) {

            $result = static::initConfig()['auth']->usersAuthManagers(
               static::getPost('__login__'),
               static::getPost('__password__')
            );

            [$this->ans, $this->alert] = static::Responses($result, [ false => ['login-wrong', 'error'] ]);
        }

        $this->views( $html,
            [
                'class' => $this->alert,
                'reponse' => $this->ans
            ]
        );
    }

    /**
     * OTP verification page (OTP)
     * 
     * @param string $html
     * @return void
     */
    public final function confirmOtpCodeSendByEmail(
        string $html
    ):void
    {

        if (static::isValidMethod(true)) {

            static::initConfig()['otp']->verificateOTP(
                static::getPost('__otp__')
            );
        }

        $this->views($html, 
        [
            'email' => $this->session->email()
        ]
    );
    }
}