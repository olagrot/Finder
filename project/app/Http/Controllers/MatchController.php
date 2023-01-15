<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MatchController
{
    public function find_match(): View
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        /**
         * @var array<User> $users
         */
        $users = User::all();

        $alreadyMatched = $user->matches()->get()->all();

        array_walk($alreadyMatched, function (&$item, $key) {
            $item = $item->match_id;
        });
        $match = null;
        $score = INF;

        foreach ($users as $matchCandidate) {
            $candidateProfile = $matchCandidate->profile;
            $userProfile = $user->profile;
            if (!($candidateProfile instanceof UserProfile) || !($userProfile instanceof UserProfile)) {
                continue;
            }
            if ($matchCandidate->id != $user->id && !in_array($matchCandidate->id, $alreadyMatched)) {
                $match_score = abs($userProfile->favourite_number - $candidateProfile->favourite_number);
                if ($match_score < $score) {
                    $score = $match_score;
                    $match = $matchCandidate;
                }
            }
        }
        return view('match.find', ['match' => $match]);
    }
    public function show_matches(): View
    {
        /**
         * @var User $user
         */
        $user = Auth::user();

        $userMatches = $user->matches()->where('accepted', true)->get()->all();

        array_walk($userMatches, function (&$item, $key) {
            $item = $item->match_id;
        });

        $userMatched = $user->matchedBy()->where('accepted', true)->get()->all();

        array_walk($userMatched, function (&$item, $key) {
            $item = $item->user_id;
        });

        $matches = array();
        foreach ($userMatches as $match) {
            if (in_array($match, $userMatched)) {
                $matched = User::find($match);
                $matches[] = $matched;
            }
        }

        return view('match.show', ['users' => $matches]);
    }

    public function accept_match(Request $request): RedirectResponse
    {
        $request->validate([
            'matchId' => 'required|int',
            'accept' => 'required'
        ]);
        $matchId = intval($request->input('matchId'));
        $id = (int) Auth::id();
        $this->add_match_to_db($id, $matchId, true);
        return redirect('match/find');
    }
    public function deny_match(Request $request): RedirectResponse
    {
        $request->validate([
            'matchId' => 'required|int',
            'deny' => 'required'
        ]);

        $id = (int) Auth::id();
        $matchId = intval($request->input('matchId'));
        $this->add_match_to_db($id, $matchId, false);
        return redirect('match/find');
    }

    private function add_match_to_db(int $userId, int $matchedId, bool $accepted): void
    {
        DB::table('match_history')->insert([
            'user_id' => $userId,
            'match_id' => $matchedId,
            'accepted' => $accepted
        ]);
        DB::flushQueryLog();
    }
}
