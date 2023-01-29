<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Http\Requests\StoreChallengeRequest;
use App\Http\Requests\UpdateChallengeRequest;
use Exception;

class ChallengeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $challenges = $user->challenges()->get();

        return view('challenges.index', compact('challenges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('challenges.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChallengeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChallengeRequest $request)
    {
        $challenge = Challenge::create([
            'title' => $request->title,
            'description' => $request->description,
            'point' => $request->point,
            'author_id' => auth()->user()->id
        ]);

        return redirect()->route('challenge.index')->with('success', 'Challenge saved !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function show(Challenge $challenge)
    {
        $challenge = $challenge->load('author');

        return view('challenges.show', compact('challenge'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function edit(Challenge $challenge)
    {
        return view('challenges.edit', compact('challenge'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChallengeRequest  $request
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChallengeRequest $request, Challenge $challenge)
    {
        $challenge->update($request->validated());

        return redirect()->route('challenge.index')->with('success', 'Challenge saved !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Challenge  $challenge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Challenge $challenge)
    {
        try {
            $challenge->deleteOrFail();
            return redirect()->route('challenge.index')->with('success', 'Item deleted !');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Action failed try again');
        }
    }

    public function accept(Challenge $challenge)
    {
        $challenge->users()->attach(auth()->user()->id, [
            'completed' => false
        ]);

        return redirect()->route('dashboard')->with('success', "Challenge {$challenge->title} accepted !");
    }

    public function giveUp(Challenge $challenge)
    {
        $challenge->users()->detach(auth()->user()->id);

        return redirect()->route('dashboard')->with('success', "Challenge {$challenge->title} gived up !");
    }

    public function complete(Challenge $challenge)
    {
        $challenge->users()->syncWithoutDetaching([
            auth()->user()->id => ['completed' => true]
        ]);

        return redirect()->route('dashboard')->with('success', "Challenge {$challenge->title} completed !");
    }
}
