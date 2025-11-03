<?php

namespace App\Http\Middleware;

use App\Services\Temporary\Signature\Contract\SignatureService;
use App\Services\Temporary\Signature\Entities\Signature;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

readonly class EnsureUserSignatureIsValid
{
    public function __construct(private SignatureService $signatureService)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $signature = new Signature($request->route('user'), $request->route('hash'));

        if ($this->signatureService->isValid($signature) === false) {
            abort(401);
        }

        return $next($request);
    }
}
