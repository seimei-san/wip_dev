<x-app-layout>
    <x-slot name='header'>
    <x-wip-header-menu></x-wip-header-menu>
    </x-slot>
    <x-errors id="errors" class='bg-blue-500 roundted-lg'>{{ $errors }}</x-errors>

    <!-- ####### ALL_AREA::START ########-->
    <div class="flex bg-purple-100">
        <!-- ######## LEFT_AREA::START ########## -->
        <div class="text-indigo-800 text-left px-4 py-4 mg-2">
            <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-indigo-50 border-b border-lime-800 font-bold">
                    ユーザー属性管理 (追加)
                </div>
            </div>
            <!-- ++++ GROUP_FORM::START -->
            <form action="{{ url('user_profile') }}" method="POST" class="w-full max-w-lg">
                @csrf
                <div class="flex flex-col px-2 py-2">
                    <!-- +++ COL::user_id +++ -->
                    <div class="w-full md:w-1/1 px-3 py2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            ユーザーID
                        </label>
                        <div class="form-group">
                            <select name="user_id" id="user-id" class="form-control">
                                <option value=""></option>
                                @foreach($wip_users as $wip_user)
                                    <option value="{{$wip_user->user_id}}">{{ $wip_user->name . "(" . $wip_user->user_id . ")" }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <!-- <input name="user_id" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder=""> -->
                    </div>
                    <!-- +++ COL::employee_id +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            社員ID
                        </label>
                        <input name="employee_id" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="">
                    </div>                    
                    <!-- +++ COL::chat_sys +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            チャットシステム
                        </label>
                        <div class="form-group">
                            <select name="chat_sys" id="chat-sys" class="form-control">
                                <option value=""></option>
                                @foreach($wip_chat_systems as $wip_chat_system)
                                    <option value="{{$wip_chat_system->chat_sys}}">{{ $wip_chat_system->chat_sys_name . "(" . $wip_chat_system->chat_sys . ")" }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <!-- <input name="chat_sys" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder=""> -->
                    </div>                    
                    <!-- +++ COL::chat_user_id +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            チャットユーザーID
                        </label>
                        <input name="chat_user_id" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="">
                    </div>
                    <!-- +++ COL::chat_interval +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            チャット間隔(秒)
                        </label>
                        <input name="chat_interval" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="">
                    </div>
                    <!-- +++ COL::chat_limit +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            チャット数
                        </label>
                        <input name="chat_limit" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="">
                    </div>


                    <!-- +++ COL::report_interval +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            レポートタイミング
                        </label>
                        <div class="form-group">
                            <select name="report_interval" id="report-interval" class="form-control">
                                <option value=""></option>
                                @foreach($wip_report_intervals as $wip_report_interval)
                                    <option value="{{$wip_report_interval->report_interval}}">{{ $wip_report_interval->report_interval_name . "(" . $wip_report_interval->report_interval . ")" }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <!-- <input name="chat_sys" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder=""> -->
                    </div> 

                    <!-- +++ COL::task_sys +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            タスクシステム
                        </label>
                        <div class="form-group">
                            <select name="task_sys" id="task-sys" class="form-control">
                                <option value=""></option>
                                @foreach($wip_task_systems as $wip_task_system)
                                    <option value="{{$wip_task_system->task_sys}}">{{ $wip_task_system->task_sys_name . "(" . $wip_task_system->task_sys . ")" }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <!-- <input name="chat_sys" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder=""> -->
                    </div> 

                    <!-- +++ COL::_task_sys_user_id +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            タスクシステムユーザーID
                        </label>
                        <input name="task_sys_user_id" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="">
                    </div>

                    <!-- +++ COL::_task_sys_project +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            タスクシステムプロジェクト
                        </label>
                        <input name="task_sys_project" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="">
                    </div>    
                    
                    
                    <!-- +++ COL::task_sys_integ +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            タスクシステム連動
                        </label>
                        <div class="form-group">
                            <select name="task_sys_integ" id="task-sys-integ" class="form-control">
                                <option value=""></option>
                                @foreach($wip_task_system_integrations as $wip_task_system_integration)
                                    <option value="{{$wip_task_system_integration->task_sys_integ}}">{{ $wip_task_system_integration->task_sys_integ_name . "(" . $wip_task_system_integration->task_sys_integ . ")" }}</option>
                                @endforeach
                            </select>
                        </div>                        
                        <!-- <input name="chat_sys" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder=""> -->
                    </div> 
                    


                    <!-- +++ COL::user_profile_active +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            有効
                        </label>
                        <input type="hidden" name="user_profile_active" value=0>
                        <input name="user_profile_active" type="checkbox" value=1 class="appearance-none block text-blue-900 border border-yellow-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-yellow-500">
                    </div>
                    <!-- +++ COL::user_note +++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            備考
                        </label>
                        <input name="user_note" class="appearance-none block w-full text-blue-900 border border-purple-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" type="text" placeholder="">
                    </div>
                </div> 
                <!-- +++ COL::BUTTON +++ -->
                <div class="flex flex-col">
                    <div class="text-purple-900 text-center px-4 py-2 m-2">
                        <x-button class="bg-purple-900 rounded-lg">追加</x-button>
                    </div>
                </div>
            </form>
            <!-- ++++ GROUP_FORM::EMD -->
        </div>
        <!-- ######## LEFT_AREA::END ########## -->
        <!-- ######## RIGHT_AREA::START ########## -->

        <div class="flex-1 text-gray-700 text-left bg-blue-100 px-1 py-1 m-1">
            <div class="flex flox-grow">
                <div class="w-auto flex">
                    <div class="w-64 underline font-bold text-blue-800 align-text-bottom">ユーザーID</div>
                    <div class="w-72 underline font-bold text-blue-800">チャットシステム関連</div>
                    <div class="w-36 underline font-bold text-blue-800">レポート<br>タイミング</div>
                    <div class="w-72 underline font-bold text-blue-800">タスクシステム関連</div>
                    <div class="w-28 underline font-bold text-blue-800">有効/備考</div>
                </div>
                <div class=""></div>
            </div>
            @if (count($wip_user_profiles) > 0)
                @foreach ($wip_user_profiles as $wip_user_profile)
                    <x-wip-user-profile-collection id="{{ $wip_user_profile->user_profile_id }}">
                        <div class="flex">
                            <div class="w-64">
                                <div class="w-max">{{ $wip_user_profile->user_id }}</div>
                                <div class="w-max"><span class="font-bold text-black">社員ID: </span>{{ $wip_user_profile->employee_id }}</div>
                            </div>
                            <div class="w-72">
                                <div class="w-max"><span class="font-bold text-black">USER ID: </span>{{ $wip_user_profile->chat_user_id }}</div> 
                                <div class="w-max"><span class="font-bold text-black">SYSTEM: </span>{{ $wip_user_profile->chat_sys }}</div> 
                                <div class="w-max"><span class="font-bold text-black">CHAT INTERVAL: </span>{{ $wip_user_profile->chat_interval }}</div> 
                                <div class="w-max"><span class="font-bold text-black">CHAT LIMIT: </span>{{ $wip_user_profile->chat_limit }}</div> 
                            </div>
                            <div class="w-36">{{ $wip_user_profile->report_interval }}</div> 
                            <div class="w-72">
                                <div class="w-max"><span class="font-bold text-black">SYSTEM: </span>{{ $wip_user_profile->task_sys }}</div> 
                                <div class="w-max"><span class="font-bold text-black">USER ID: </span>{{ $wip_user_profile->task_sys_user_id }}</div> 
                                <div class="w-max"><span class="font-bold text-black">PROJECT: </span>{{ $wip_user_profile->task_sys_project }}</div> 
                                <div class="w-max"><span class="font-bold text-black">INTEGRATION: </span>{{ $wip_user_profile->task_sys_integ }}</div> 
                            </div>
                            <div>
                                <div class="w-28"><span class="font-bold text-black">有効: </span>{{ $wip_user_profile->user_profile_active }}</div> 
                                <div class="w-64"><span class="font-bold text-black">備考: </span>{{ $wip_user_profile->user_note }}</div> 
                            </div>
                        </div>
                    </x-wip-user-profile-collection>
                @endforeach
            @else
                <div>データがありません</div>
            @endif
        </div>
        <!-- ######## RIGHT_AREA::END ########## -->

    </div>
    <!-- ####### ALL_AREA::END ########-->







</x-app-layout>