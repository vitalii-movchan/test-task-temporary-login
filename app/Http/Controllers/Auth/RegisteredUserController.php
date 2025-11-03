<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredUserRequest;
use App\Models\User;
use App\Services\Temporary\Signature\Contract\SignatureService;
use App\Services\Temporary\Signature\Entities\Signature;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Random\RandomException;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws RandomException
     */
    public function store(RegisteredUserRequest $request, SignatureService $signatureService): RedirectResponse
    {
        $user = User::query()
            ->firstOrCreate(
                ['name' => $request->input('name')],
                ['phone' => $request->input('phone')],
        );

        $signature = new Signature($user->id, bin2hex(random_bytes(20)));

        $signatureService->save($signature);

        return redirect(route(
            name: 'game.index',
            parameters: [
                'user' => $signature->getUserId(),
                'hash' => $signature->getHash(),
            ],
            absolute: false
        ));
    }
}
