<x-app-layout>
    <x-slot name='header'>
    <x-wip-header-menu></x-wip-header-menu>
    </x-slot>
    <x-errors id="errors" class='bg-blue-500 roundted-lg'>{{ $errors }}</x-errors>

    <!-- ####### ALL_AREA::START ########-->
    <div class="flex bg-gray-100">
        <!-- ######## LEFT_AREA::START ########## -->
        <div class="text-indigo-800 text-left px-4 py-4 mg-2">
            <div class="bg-indigo-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-indigo-50 border-b border-lime-800 font-bold">
                    レポートタイミング (追加)
                </div>
            </div>
            <!-- ++++ GROUP_FORM::START -->
            <form action="{{ url('report_interval') }}" method="POST" class="w-full max-w-lg">
                @csrf
                <div class="flex flex-col px-2 py-2">
                    <!-- +++ COL::task_sys +++ -->
                    <div class="w-full md:w-1/1 px-3 py2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            タイミングCODE
                        </label>
                        <input name="report_interval" class="appearance-none block w-full text-blue-900 border border-gray-600 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
                    <!-- +++ COL::task_sys_name+++ -->
                    <div class="w-full md:w-1/1 px-3 py-2">
                        <label class="block uppercase tracking-wide text-blue-900 text-xs font-bold mb-2">
                            レポートタイミング名称
                        </label>
                        <input name="report_interval_name" class="appearance-none block w-full text-blue-900 border border-gray-600 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                </div> 
                <!-- +++ COL::BUTTON +++ -->
                <div class="flex flex-col">
                    <div class="text-gray-900 text-center px-4 py-2 m-2">
                        <x-button class="bg-gray-900 rounded-lg">追加</x-button>
                    </div>
                </div>
            </form>
            <!-- ++++ GROUP_FORM::EMD -->
        </div>
        <!-- ######## LEFT_AREA::END ########## -->
        <!-- ######## RIGHT_AREA::START ########## -->

        <div class="flex-1 text-gray-700 text-left bg-gray-100 px-1 py-1 m-1">
            <div class="flex flox-grow">
                <div class="w-auto flex">
                    <div class="w-32 underline font-bold text-blue-800 align-text-bottom">レポート<br>タイミングID</div>
                    <div class="w-40 underline font-bold text-blue-800">レポートタイミング名称</div>
                </div>
                <div class=""></div>
            </div>
            @if (count($wip_report_intervals) > 0)
                @foreach ($wip_report_intervals as $wip_report_interval)
                    <x-wip-report-interval-collection id="{{ $wip_report_interval->report_interval }}">
                        <div class="flex">
                            <div class="w-32">{{ $wip_report_interval->report_interval }}</div>
                            <div class="w-40">{{ $wip_report_interval->report_interval_name }}</div> 
                        </div>
                    </x-wip-report-interval-collection>
                @endforeach
            @else
                <div>データがありません</div>
            @endif
        </div>
        <!-- ######## RIGHT_AREA::END ########## -->

    </div>
    <!-- ####### ALL_AREA::END ########-->







</x-app-layout>