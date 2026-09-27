<?php

namespace Webkul\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecureHeaders
{
    /**
     * Unwanted header list to strip.
     *
     * @var array
     */
    private $unwantedHeaderList = [
        'X-Powered-By',
        'Server',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->removeUnwantedHeaders();

        $response = $next($request);

        $this->setHeaders($response, $request);

        return $response;
    }

    /**
     * Set production security headers.
     *
     * @param  Response  $response
     * @param  Request  $request
     * @return void
     */
    private function setHeaders($response, $request)
    {
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

        if ($request->isSecure() || app()->environment('production')) {
            $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        }

        if (env('CSP_ENABLED', false)) {
            $csp = env('CSP_POLICY', "default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://fonts.googleapis.com https://checkout.razorpay.com https://js.stripe.com https://www.paypal.com; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com data:; img-src 'self' data: blob: https:; frame-src 'self' https://api.razorpay.com https://js.stripe.com https://www.paypal.com; connect-src 'self' https:;");
            $response->headers->set('Content-Security-Policy', $csp);
        }
    }

    /**
     * Remove unwanted headers.
     *
     * @return void
     */
    private function removeUnwantedHeaders()
    {
        if (headers_sent()) {
            return;
        }

        foreach ($this->unwantedHeaderList as $header) {
            header_remove($header);
        }
    }
}
