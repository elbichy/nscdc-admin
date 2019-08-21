<?php

namespace App\Http\Controllers;

use App\Redeployment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function today()
    {
        $redeployments = Redeployment::whereDate('created_at', Carbon::today())->get();
        return DataTables::of($redeployments)
                ->editColumn('created_at', function ($redeployment) {
                    return $redeployment->created_at->toFormattedDateString();
                })
                ->addColumn('view', function($redeployment) {
                    return '
                        <a href="/redeployment/'.$redeployment->id.'/edit" style="margin-right:10px;" class="blue-text"><i class="small material-icons">edit</i></a>
                        <a href="/redeployment/'.$redeployment->id.'/download" class="green-text"><i class="small material-icons">cloud_download</i></a>
                    ';
                })
                ->rawColumns(['view'])
                ->make();
    }
}
