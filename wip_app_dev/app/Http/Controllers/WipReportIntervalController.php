<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Libs\GetUserInfo;
use App\Models\WipReportInterval;

class WipReportIntervalController extends Controller
{
    private $user_domain_id;
    private $user_perm_group_id;
    private $user_user_active;
    private $user_user_profile_active;
    private $user_group_ids;
    private $user_supervisor_group_ids;


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next){
            $src_user_id = Auth::user()->user_id;
            $base_user_info = GetUserInfo::getBaseUserInfo($src_user_id);   // domain_id, user_active, perm_grouop_id, user_profile_active
            $this->user_group_ids = GetUserInfo::getUserGroups($src_user_id);    // group_ids (collection)
            $this->user_supervisor_group_ids = GetUserInfo::getSupervisorGroups($src_user_id);    // supervisor_group_ids (collection)
            $this->user_domain_id = $base_user_info['domain_id'];
            $this->user_perm_group_id = $base_user_info['perm_group_id'];
            $this->user_user_active = $base_user_info['user_active'];
            $this->user_user_profile_active = $base_user_info['user_profile_active'];
            if ($this->user_perm_group_id <= 89 || $this->user_perm_group_id == null) { // if User is not more than Super Admin, not allowed to execute WipReportIntervalController
                    return redirect('/dashboard_noperm');
            }
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wip_report_intervals = WipReportInterval::orderBy('report_interval', 'asc')->get();
        return view('wip_report_intervals', ['wip_report_intervals' => $wip_report_intervals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**orderBy
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
           'report_interval' => 'required|min:3|max:3',
           'report_interval_name'  => 'required|min:3|max:30'
        ]);
        if ($validator->fails()) {
            return redirect('/report_intervals')->withInput()->withErrors($validator);
        }
        $wip_report_interval = new WipReportInterval();
        $wip_report_interval->report_interval = $request->report_interval;
        $wip_report_interval->report_interval_name = $request->report_interval_name;
        $wip_report_interval->save();
        return redirect('/report_intervals');

    }

    /**
     * Display the specified resource.
     */
    public function show(WipReportInterval $wipTaskSystem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($report_interval)
    {
        //
        $wip_report_intervals = WipReportInterval::find($report_interval);
        return view('wip_report_intervaledit', ['wip_report_intervals' => $wip_report_intervals]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipReportInterval $wipReportInterval)
    {
        //
        $validator = Validator::make($request->all(), [
            // 'report_interval' => 'required|min:3|max:3',
            'report_interval_name' => 'required|min:3|max:30'
        ]);
        if ($validator->fails()) {
            return redirect('/report_intervaledit/'.$request->report_interval)
            ->withInput()->withErrors($validator);
        }
        $wip_report_interval = WipReportInterval::find($request->report_interval);
        $wip_report_interval->report_interval = $request->report_interval;
        $wip_report_interval->report_interval_name = $request->report_interval_name;
        $wip_report_interval->save();
        return redirect(('/report_intervals'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($report_interval)
    {
        //
        $wip_report_interval = WipReportInterval::find($report_interval);
        $wip_report_interval->delete();
        return redirect('/report_intervals');
    }
}
