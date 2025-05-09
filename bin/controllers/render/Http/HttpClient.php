<?php

namespace Epaphrodites\controllers\render\Http;

class HttpClient extends HttpRequest
{

    /**
     * @return mixed
     */
    public function HttpResponses():mixed
    {

        $getUrl = static::class('paths')->href_slug($this->ParseMethod());

        $cleanUrl = preg_replace('#/+#', '/', $getUrl);

        return rtrim($cleanUrl, '/') . '/';
    }

    /**
     * @return mixed
     */
    private function ParseMethod(): mixed
    {
        $httpRequest = $this->HttpRequest();
        
        return (!empty($httpRequest) && $httpRequest !== "/" && strlen($httpRequest) > 1 && $httpRequest[-1] === "/")
            ? substr($httpRequest, 1)
            : _DASHBOARD_;
    }
    

}