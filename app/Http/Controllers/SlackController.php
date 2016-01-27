<?php namespace App\Http\Controllers;

use App\Slack\Slack;
use Illuminate\Http\Request;

class SlackController extends Controller
{
    /**
     * Handle the Command
     *
     * @param string $command
     * @param Request $request
     * @return JsonResponse
     */
    public function commands($command, Request $request)
    {
        $response = Slack::handle($command, $request->all());

        return response()->json($response);
    }
}
