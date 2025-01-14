<?php

namespace App\Controllers;

use App\Models\User;
use App\Services\View;
use App\Services\Auth;
use Slim\Http\Response;
use Psr\Http\Message\ResponseInterface;
use Smarty;

/**
 * BaseController
 */
class BaseController
{
    /**
     * @var Smarty
     */
    protected $view;

    /**
     * @var User
     */
    protected $user;

    /**
     * Construct page renderer
     */
    public function __construct()
    {
        $this->view = View::getSmarty();
        $this->user = Auth::getUser();
    }

    /**
     * Get smarty
     *
     * @return Smarty
     */
    public function view()
    {
        return $this->view;
    }

    // TODO: remove
    /**
     * Output JSON
     *
     * @param Response      $response
     * @param array|object  $resource
     *
     * @return ResponseInterface
     */
    public function echoJson(Response $response, $resource)
    {
        return $response->withJson($resource);
    }
}

if (!in_array($_SERVER['HTTP_HOST'], array('gopass.cc', 'www.gopass.cc'))) {
    header("Location: /404");
}