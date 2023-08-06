<x-app-layout>
    <x-slot name='header'>
    <x-wip-header-menu></x-wip-header-menu>
    </x-slot>
    <x-errors id="errors" class='bg-blue-500 roundted-lg'>{{ $errors }}</x-errors>

    <!-- ####### ALL_AREA::START ########-->
    <div class="flex bg-blue-100">
        <!-- ######## LEFT_AREA::START ########## -->
        <!-- ######## LEFT_AREA::END ########## -->
        <!-- ######## RIGHT_AREA::START ########## -->

        <div class="flex-1 text-gray-700 text-left bg-blue-100 px-1 py-1 m-1">
            <div class="flex flox-grow">
                <div class="w-auto flex">
                    <div class="w-56 underline font-bold text-blue-800">基本情報</div>
                    <div class="w-64"></div>
                    <div class="w-96 underline font-bold text-blue-800">メッセージと分析結果</div>
                    <div class="w-80"></div>
                    <div class="w-96 underline font-bold text-blue-800">カイゼンとアドバイス</div>
                </div>
                <div class=""></div>
            </div>
            @if (count($wip_msgs) > 0)
                @foreach ($wip_msgs as $wip_msg)
                    <x-wip-message-collection id="{{ $wip_msg['_id'] }}">
                        <div class="flex">
                            <div class="w-56">
                                <div>ID:</div>
                                <div>組織ID:</div>
                                <div>ユーザーID:</div>
                                <div>チャット:</div>
                                <div>氏名:</div>
                                <div>チャットUID:</div>
                                <div>会話ID:</div>
                                <div>メッセージID:</div>
                                <div>日付:</div>
                                <div>時間：</div>
                                <div>メンションUID：</div>
                                <div>タスク連携：</div>
                                <div>タスクID：</div>
                            </div>
                            <div class="w-96">
                                <div class="w-auto">{{ $wip_msg['_id'] }}</div>
                                <div class="w-auto">{{ $wip_msg['domain_id'] }}</div>
                                <div class="w-auto">{{ $wip_msg['user_id'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['chat_sys'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['display_name'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['chat_user_id'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['conversation_id'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['message_id'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['date'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['time'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['mentioned_user_id'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['task'] }}</div> 
                                <div class="w-auto">{{ $wip_msg['task_id'] }}</div> 
                            </div>
                            <div class="w-1/2">
                                <div class="w-auto"><span class="font-bold text-yellow-500">MSG: </span>{{ $wip_msg['message'] }}</div>
                                <div class="w-auto"><span class="font-bold text-yellow-500">WHO: </span>{{ $wip_msg['who_to_do'] }}</div> 
                                <div class="w-auto"><span class="font-bold text-yellow-500">WHAT: </span>{{ $wip_msg['what_to_do'] }}</div> 
                                <div class="w-auto"><span class="font-bold text-yellow-500">WHY: </span>{{ $wip_msg['why'] }}</div> 
                                <div class="w-auto"><span class="font-bold text-yellow-500">WHEN: </span>{{ $wip_msg['by_when'] }}</div> 
                                <div class="w-auto"><span class="text-yellow-500">- |---- : </span>{{ $wip_msg['from_when'] }}</div> 
                                <div class="w-auto"><span class="text-yellow-500">- |---- : </span>{{ $wip_msg['until_when'] }}</div> 
                                <div class="w-auto"><span class="font-bold text-yellow-500">WHERE: </span>{{ $wip_msg['at_where'] }}</div> 
                                <div class="w-auto"><span class="text-yellow-500">- |---- : </span>{{ $wip_msg['in_where'] }}</div> 
                                <div class="w-auto"><span class="text-yellow-500">- |---- : </span>{{ $wip_msg['from_where'] }}</div> 
                                <div class="w-auto"><span class="text-yellow-500">- |---- : </span>{{ $wip_msg['to_where'] }}</div> 
                                <div class="w-auto"><span class="font-bold text-yellow-500">HOW: </span>{{ $wip_msg['how_to_do'] }}</div> 
                                <div class="w-auto"><span class="font-bold text-yellow-500">HOW MUCH: </span>{{ $wip_msg['how_much'] }}</div> 
                                <div class="w-auto"><span class="text-yellow-500">- |----------- : </span>{{ $wip_msg['how_many'] }}</div> 
                            </div>
                            <div class="w-1/2">
                                <p class="font-bold">カイゼン</p>
                                <div class="rounded-lg border-2 border-white">
                                    <div class="w-auto h-48 overflow-y-scroll">{!! nl2br($wip_msg['kaizen']) !!}</div>
                                </div>
                                <p class="font-bold">アドバイス</p>
                                <div class="rounded-lg border-2 border-white">
                                    <div class="w-auto h-72 overflow-y-scroll">{!! nl2br($wip_msg['advice']) !!}</div>
                                </div>
                            </div>
                        </div>
                    </x-wip-message-collection>
                @endforeach
            @else
                <div>データがありません</div>
            @endif
        </div>
        <!-- ######## RIGHT_AREA::END ########## -->

    </div>
    <!-- ####### ALL_AREA::END ########-->







</x-app-layout>