<div class="flex justify-between p-4 items-center bg-amber-100 text-black rounded-lg border-2 border-black">
    <div>{{ $slot }}</div>

      <div class="w-36">
        <form action="{{ url('advice/'.$id) }}" method="POST">
            @csrf
            <button type="submit" class="btn bg-lime-900 text-white rounded-lg">
                アドバイス
            </button>
        </form>
    </div>
  </div>