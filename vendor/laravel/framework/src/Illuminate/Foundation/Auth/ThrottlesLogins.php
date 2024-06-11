<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait ThrottlesLogins
{
    /**
     * Determine if the user has too many failed login attempts.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), $this->maxAttempts()
        );
    }

    /**
     * Increment the login attempts for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function incrementLoginAttempts(Request $request)
    {
        $this->limiter()->hit(
            $this->throttleKey($request), $this->decayMinutes()
        );
    }

    /**
     * Determine how many retries are left for the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    protected function retriesLeft(Request $request)
    {
        return $this->limiter()->retriesLeft(
            $this->throttleKey($request), $this->maxAttempts()
        );
    }

    /**
     * Determine the number of seconds until logging in is available again.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    protected function secondsRemainingOnLock(Request $request)
    {
        return $this->limiter()->availableIn(
            $this->throttleKey($request)
        );
    }

    /**
     * Get the throttle key for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function throttleKey(Request $request)
    {
        return Str::lower($request->input($this->username())).'|'.$request->ip();
    }

    /**
     * Get the rate limiter instance.
     *
     * @return \Illuminate\Cache\RateLimiter
     */
    protected function limiter()
    {
        return app(RateLimiter::class);
    }

    /**
     * Get the maximum number of attempts to allow.
     *
     * @return int
     */
    protected function maxAttempts()
    {
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : 5;
    }

    /**
     * Get the number of minutes to throttle for.
     *
     * @return int
     */
    protected function decayMinutes()
    {
        return property_exists($this, 'decayMinutes') ? $this->decayMinutes : 1;
    }

    /**
     * Determine the throttle lockout response for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function sendLockoutResponse(Request $request)
    {
        $seconds = $this->secondsRemainingOnLock($request);

        return response()->json([
            'message' => 'Too many login attempts. Please try again in '.$seconds.' seconds.',
        ], 429);
    }
}
