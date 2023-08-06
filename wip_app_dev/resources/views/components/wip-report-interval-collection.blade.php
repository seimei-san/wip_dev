<div class="flex justify-between p-4 items-center bg-gray-700 text-white rounded-lg border-2 border-white">
  <div>{{ $slot }}</div>
    <div>
        <form action="{{ url('report_intervaledit/'.$id) }}" method="POST">
            @csrf
            <button type="submit" class="btn bg-yellow-600 rounded-lg">
                更新
            </button>
        </form>
    </div>
    <div>
        <form action="{{ url('report_interval/'.$id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn bg-red-700 rounded-lg">
            削除
        </button>
        </form>
    </div>
</div>