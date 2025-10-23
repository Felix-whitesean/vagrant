<div class="">
    <a href="{{route('ports.create')}}">Add new port</a>
    <div class="flex flex-row flex-wrap gap-4 h-auto ">
        @foreach($ports as $port)
{{--            <button wire:click="setView(port({{$port['id']}}))" >--}}
                <a href="{{ route('ports.edit', $port) }}" class="">
                    <div class="flex flex-col shadow gap-2 rounded-md w-[350px] h-[280px] p-2 relative">
                        <div class="flex flex-row gap-2 text-gray-500 absolute right-2 top-2 items-center">
                            <div class="rounded-full w-3 h-3 bg-gray-500"></div>
                            <div class="self-center">active</div>
                        </div>
                        <img src="{{url('/ship-images/msc.jpg')}}" class="self-center w-auto max-w-[100%] max-h-[50%]" alt=""/>
                        <div class="flex flex-column leading-2">
                            <p class="self-end text-gray-300">{{$port['country']}}</p>
                            <p class="font-semibold">{{$port['name']}}</p>
                            <p class="flex flex-row gap-2">
                                <span class="text-gray-800 font-medium">Total docking capacity: </span>
                                <span>{{$port['docking_capacity']}}</span>
                            </p>

                            <p class="flex flex-row gap-2">
                                <span class="text-gray-800 font-medium">Current ships in port: </span>
                                <span>30</span>
                            </p>
                        </div>
                    </div>
                </a>
{{--            </button>--}}
        @endforeach
    </div>
</div>
