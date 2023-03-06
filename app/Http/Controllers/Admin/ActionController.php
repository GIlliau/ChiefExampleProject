<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserAction;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function getOrderActions(Request $request)
    {
        $orderCreation = UserAction::where('action', UserAction::ACTION_MAKE_ORDER)->search($request->all())->get();

        return view('admin.orders', ['orderActions' => $orderCreation]);
    }

    public function getFileActions(Request $request)
    {

        $orderCreation = UserAction::where('action', UserAction::ACTION_DOWNLOAD_FILE)->search($request->all())->get();

        return view('admin.files', ['filesActions' => $orderCreation]);
    }

}
