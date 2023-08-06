<?php

namespace App\Http\Controllers;

// require 'vendor/autoload.php';

use Jenssegers\Mongodb\Query\Builder;
use Jenssegers\Mongodb\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Libs\GetUserInfo;
use App\Models\WipUserProfile;
use App\Models\WipUser;
use App\Models\WipChatSystem;
use App\Models\WipMessage;
use GuzzleHttp\Client;
use Laravel\Ui\Presets\React;



class WipMessageController extends Controller
{
    private $user_user_id;
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
            $this->user_user_id = $src_user_id;
            $this->user_group_ids = GetUserInfo::getUserGroups($src_user_id);    // group_ids (collection)
            $this->user_supervisor_group_ids = GetUserInfo::getSupervisorGroups($src_user_id);    // supervisor_group_ids (collection)
            $this->user_domain_id = $base_user_info['domain_id'];
            $this->user_perm_group_id = $base_user_info['perm_group_id'];
            $this->user_user_active = $base_user_info['user_active'];
            $this->user_user_profile_active = $base_user_info['user_profile_active'];
            // if ($this->user_perm_group_id > 99 || $this->user_perm_group_id == null) { // if User is not more than Supervisor, not allowed to execute WipSupervisorGroupController
            //         return redirect('/dashboard_noperm');
            // }
            return $next($request);
        });
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ($this->user_perm_group_id >= 90){   // super admin
            $wip_msgs = WipMessage::all();
            // $wip_msgs = DB::connection('mongodb')->collection('wip_msgs')->get();
        } elseif ($this->user_perm_group_id >= 60 && $this->user_perm_group_id <= 69) { // domain admin
            $tmp_wip_users = DB::table('wip_users')
            ->select('user_id')
            ->where('wip_users.domain_id', $this->user_domain_id)
            ->get()->toArray();
            foreach ($tmp_wip_users as $tmp) {
                $uids[] = $tmp->user_id;
            }
            $wip_msgs = WipMessage::whereIn('user_id', $uids)->get();

        } elseif ($this->user_perm_group_id >= 40 && $this->user_perm_group_id <= 49) { // supervisor
            $tmp_wip_users = DB::table('wip_user_groups')
            ->select('user_id')
            ->join('wip_supervisor_groups', 'wip_supervisor_groups.group_id', '=', 'wip_user_groups.group_id')
            ->where('wip_supervisor_groups.supervisor_user_id', $this->user_user_id)
            ->get()->toArray();
            foreach ($tmp_wip_users as $tmp) {
                $uids[] = $tmp->user_id;
            }
            $wip_msgs = WipMessage::whereIn('user_id', $uids)->get();
        } elseif ($this->user_perm_group_id >= 0 && $this->user_perm_group_id <= 10) {   //regular user
            $wip_msgs = WipMessage::where('user_id', $this->user_user_id)->get();
        } else {        // others
            return redirect('/dashboard_noperm');
        }
        return view('wip_messages', compact('wip_msgs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($doc_id)
    {
        //
        $wip_msgs[] = WipMessage::find($doc_id);
        return view('wip_messages', compact('wip_msgs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WipMessage $wipMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WipMessage $wipMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WipMessage $wipMessages)
    {
        //
    }

    public function advice($doc_id)
    {
        $wip_app_client = new Client([
            'base_uri' => env('WIP_APP_BASE_URI')
        ]);
        $response = $wip_app_client->request('POST', env('WIP_SRV_API_ADV'), [
            'json' => ['doc_id' => $doc_id]
        ]);
        $body = $response->getBody();
        $body_content = $body->getContents();
        $content_json = json_decode($body_content, true);
        $doc_id_adviced = $content_json['doc_id'];
        if ($doc_id_adviced == $doc_id) {
            $wip_msgs[] = WipMessage::find($doc_id);
            return view('wip_messages', compact('wip_msgs'));
        } else {
            $wip_msgs[] = WipMessage::find($doc_id);
            return view('wip_messages', compact('wip_msgs'));
        }


    }
}
