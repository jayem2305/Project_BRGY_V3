<?php

namespace Illuminate\Session\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Str;

class StartSession
{
    /**
     * The session manager instance.
     *
     * @var \Illuminate\Contracts\Session\Session
     */
    protected $session;

    /**
     * Create a new session middleware.
     *
     * @param  \Illuminate\Contracts\Session\Session  $session
     * @return void
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Start the session for the incoming request
        $this->startSession();

        // Continue processing the request
        $response = $next($request);

        // Save the session data back to the storage
        $this->session->save();

        // Add the session ID to the response cookie
        $response->headers->setCookie($this->session->getName(), $this->session->getId());

        return $response;
    }

    /**
     * Start the session.
     *
     * @return void
     */
    protected function startSession()
    {
        // Start the session if it hasn't been started already
        if (! $this->session->isStarted()) {
            $this->session->start();
        }

        // Generate session ID if not already set
        if (! $this->session->getId()) {
            $this->session->setId($this->generateSessionId());
        }
    }

    /**
     * Generate a new session ID.
     *
     * @return string
     */
    protected function generateSessionId()
    {
        // Generate a unique session ID using Laravel's Str helper
        return Str::random(40);
    }
}
