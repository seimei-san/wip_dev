<div class="flex justify-between p-4 items-center bg-red-800 text-white rounded-lg border-2 border-white">
  <div>{{ $slot }}</div>
    <div>
        <form action="{{ url('show/'.$id) }}" method="POST">
            @csrf
            <button type="submit" class="btn bg-yellow-400 text-black rounded-lg">
                分析
            </button>
        </form>
    </div>

</div>