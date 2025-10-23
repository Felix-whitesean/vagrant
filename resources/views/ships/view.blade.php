<div class="flex flex-col gap-2">
    <a class="self-end btn btn-primary" href="{{route('ships.create')}}">Add new ship</a>
    <div class="header flex flex-col justify-between">
        <form action="" class="self-center">
            <input type="text" placeholder="search my ships..." name="search"
                   class="px-2 py-1 border-1 border-gray-400 rounded-md w-[300px]" />
        </form>
        <div class="self-end">
            <div class="flex flex-row gap-1">
                <span class="font-semibold">sort by:</span>
                <span class="text-gray-400 underline">first name</span>
            </div>
        </div>
    </div>

    <div class="content flex flex-col gap-4">
        <div class="flex flex-row gap-2">
            <p class="py-2 px-4 bg-gray-800 rounded-sm text-white">Recently added</p>
            <p class="py-2 px-4 text-gray-800 rounded-sm bg-gray-200">In voyage</p>
        </div>
        @foreach($ships as $ship)
            <div class="container flex flex-row gap-3">
                <div class="relative">
                    <img src="{{url('/ship-images/cargoship.webp')}}" alt="Cargo ship" class="w-[350px] h-[180px] rounded-sm">
                    <span class="absolute left-2 top-2 px-4 py-2 rounded-sm bg-[#1447e6BB] text-white">{{$ship['type']}}</span>
                </div>

                    <div class="details flex flex-col gap-0 leading-3.5 items-start self-center">
                        <p class="font-semibold">{{$ship['name']}}</p>
                        <p class="text-gray-500">{{$ship['registration_number']}}</p>
                        <p class="flex flex-row gap-2">
                            <span>Captain:</span>
                            <a href="crew/Faraday">Faraday</a>
                        </p>
                        <p class="{{$ship['status'] == 'active' ? 'bg-green-200' : ($ship['status'] == 'under maintenance'? 'bg-amber-200' : 'bg-red-100')}} px-3 py-2 text-gray-500 rounded-md text-center">{{$ship['status']}} </p>
                    </div>
            </div>
        @endforeach
        <hr/>
    </div>
</div>
