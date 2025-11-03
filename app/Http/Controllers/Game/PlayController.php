<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Services\Game\Contract\GameService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Random\RandomException;


class PlayController extends Controller
{
    /**
     * Display the registration view.
     */
    public function show(): View
    {
      //  $files1 = scandir('/opt/vertica/lib64/');
       // var_dump($files1);
      //  die;
        try {

            $books = DB::connection('vertica');
        } catch (\Throwable $e) {
            dd($e);
        }
        die();
    //    $books = DB::connection('vertica');
     //   $connection = odbc_connect("Driver={Vertica};Server=1;Database=1;", 1, 1);

        return view('game.index');
    }

    /**
     * Display the registration view.
     * @throws RandomException
     */
    public function play(GameService $gameService): RedirectResponse
    {
        $result = $gameService->play();

        session()->put('status', $result->getStatus());

        return redirect(route(
            name: 'game.index',
            parameters: [
                'user' => Auth::signature()->getUserId(),
                'hash' => Auth::signature()->getHash(),
            ],
            absolute: false
        ));
    }
}
