<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $inactiveChallenges = Challenge::with('author')->doesntHave('users')->get();
        $activeChallenges = $user->acceptedChallenges()->wherePivot('completed', '=', 0)->get();
        $completedChallenges = $user->acceptedChallenges()->wherePivot('completed', '=', 1)->get();

        return view('pages.dashboard', compact('inactiveChallenges', 'activeChallenges', 'completedChallenges'));
    }
}
