<?php

namespace App\Http\Controllers;

use App\Models\Riddle;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RiddleController extends Controller
{
    public const RIDDLES_PER_PAGE = 5;
    public function index(): RedirectResponse
    {
        return redirect('/riddles/page/' . 1);
    }

    public function filter(Request $request): RedirectResponse
    {
        Session::put('category', $request->category);
        return redirect()->route('riddles.index');
    }

    public function random(): RedirectResponse
    {
        $riddle = $this->getRiddles()->random();
        return redirect()->route('riddles.show', ['riddle' => $riddle]);
    }

    public function page(int $noPage): RedirectResponse|View
    {
        $riddlesCount = $this->getRiddles()->count();
        if ($noPage < 1) {
            $noPage = 1;
            return redirect()->route('riddles.page', ['noPage' => $noPage]);
        } elseif ($riddlesCount < ($noPage-1) * self::RIDDLES_PER_PAGE) {
            $noPage = ceil($riddlesCount / self::RIDDLES_PER_PAGE);
            return redirect()->route('riddles.page', ['noPage' => $noPage]);
        }

        $riddles = $this->getRiddles()->slice(($noPage-1)* self::RIDDLES_PER_PAGE, self::RIDDLES_PER_PAGE);
        $selected = Session::get('category') ?? 'all';
        $categories = Riddle::select('category')->distinct()->pluck('category');

        return view('riddles.index', ['riddles'=> $riddles, 'categories' => $categories, 'selected' => $selected]);
    }

    public function show(Riddle $riddle): View
    {
        return view('riddles.show')->with('riddle', $riddle);
    }

    /**
     * @return Collection<int, Riddle>
     */
    private function getRiddles(): Collection
    {
        $selected = Session::get('category') ?? 'all';
        if ($selected == "all") {
            return Riddle::all();
        } else {
            return Riddle::where('category', Session::get('category'))->get();
        }
    }
}
