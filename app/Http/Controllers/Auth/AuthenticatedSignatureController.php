<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredUserRequest;
use App\Models\User;
use App\Services\Temporary\Signature\Contract\SignatureService;
use App\Services\Temporary\Signature\Entities\Signature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Random\RandomException;


class AuthenticatedSignatureController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws RandomException
     */
    public function refresh(SignatureService $signatureService): RedirectResponse
    {
        $signature = Auth::signature();

        $signature->setHash(bin2hex(random_bytes(20)));

        $signatureService->refresh($signature);

        return redirect(route(
            name: 'game.index',
            parameters: [
                'user' => $signature->getUserId(),
                'hash' => $signature->getHash(),
            ],
            absolute: false
        ));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws RandomException
     */
    public function destroy(SignatureService $signatureService): RedirectResponse
    {
        $signatureService->delete(Auth::signature());

        return redirect(route('register.create'));
    }
}
