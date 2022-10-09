<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Recaller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RememberSet
{
    /**
     * Get name of remember cookies.
     *
     * @return string
     */
    public function getRememberName()
    {
        return Auth::getRecallerName();
    }

    /**
     * Get data from remember cookies.
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @return string
     */
    public function getRememberCookies(Request $request)
    {
        return $request->cookies->get($this->getRememberName());
    }

    /**
     * Get recaller data from remember cookies.
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @return \Illuminate\Auth\Recaller $recaller
     */
    public function getRecaller(Request $request) // explode remember cookies via recaller
    {
        $recaller = new Recaller($this->getRememberCookies($request));
        return $recaller;
    }

    /**
     * Get ID user from remember cookies.
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @return string
     */
    public function getRememberId(Request $request)
    {
        return $this->getRecaller($request)->id();
    }

    /**
     * Get TOKEN remember from remember cookies.
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @return string
     */
    public function getRememberToken(Request $request)
    {
        return $this->getRecaller($request)->token();
    }

    /**
     * Get Password user from remember cookies.
     *
     * @param  \Symfony\Component\HttpFoundation\Request  $request
     * @return string
     */
    public function getRememberPassword(Request $request)
    {
        return $this->getRecaller($request)->hash();
    }

    /**
     * Get token from column remember_token in table user.
     *
     * @return string
     */
    public function getRememberTokenUser()
    {
        return Auth::user()->getRememberToken();
    }

    /**
     * Set time duration remember cookies.
     *
     * @param integer $minutes
     */
    public function setTimeDuration($minutes)
    {
        Auth::setRememberDuration($minutes);
    }
}
