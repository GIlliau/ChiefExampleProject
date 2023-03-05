<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\UserAction;
use App\Traits\ActionTracker;
use Illuminate\Support\Facades\Auth;

class CowController extends Controller
{
    use ActionTracker;

    public function index()
    {
        return view('pages.cow');
    }

    public function thanksIndex()
    {
        return view('pages.cow_thanks');
    }

    public function buyCow()
    {
        $user = Auth::user();
        $order = $user->order()->create();
        $this->recordAction($user->id, UserAction::ACTION_MAKE_ORDER, "order_id: $order->id");

        return redirect('buy-cow-thanks');
    }
}
