<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class LogCsrfVerification extends BaseVerifier
{
    public function handle($request, Closure $next)
    {
        \Log::debug('CSRF Debug', [
            'token_from_request' => $request->input('_token') ?? $request->header('X-CSRF-TOKEN'),
            'token_from_session' => $request->session()->token(),
            'url' => $request->url(),
            'headers' => $request->headers->all()
        ]);

        return parent::handle($request, $next);
    }
}
