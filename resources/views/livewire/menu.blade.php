<div class=" flex flex-row h-screen overflow-y-hidden">
    <div class="sidebar w-[400px] h-full flex flex-row p-2">
        <div class="h-full flex-1 flex flex-col gap-2 rounded-md shadow">
            <div class="company flex flex-row gap-2 bg-gray-300 py-3 px-2 rounded-t-md">
                <img class="rounded-full w-[40px] h-[40px]" src="{{url('/icon.png')}}"  alt="company-logo">
                <span class="self-center font-semibold text-[1.1rem] font-marmelad">Global shipping system (vagrant)</span>
            </div>
            <div class="nav flex flex-col gap-8">
                <div class="flex flex-col gap-2">
                    <button wire:click="setActive('')" class="px-3 {{ $active === '' ? 'border-gray-600 text-gray-600' :'border-transparent text-gray-400'}}">Dashboard</button>

                    <div class="section-title">Ship management</div>
                    @foreach($shipMenuItems as $item)
                        <button wire:click="setActive('{{$item['action']}}')" class="px-3 {{ $active === $item['action'] ? 'border-gray-600 text-gray-600' :'border-transparent text-gray-400'}}">{{$item['label']}}</button>
                    @endforeach

                    @foreach($ports as $item)
                        <button wire:click="setActive('{{$item['action']}}')" class="px-3 {{ $active === $item['action'] ? 'border-gray-600 text-gray-600' :'border-transparent text-gray-400'}}">{{$item['label']}}</button>
                    @endforeach
                </div>
                <div class="flex flex-col gap-2">
                    <div class="section-title">Crew management</div>
                    @foreach($crewMenuItems as $item)
                        <button wire:click="setActive('{{$item['action']}}')" class="px-3 {{ $active === $item['action'] ? 'border-gray-600 text-gray-600' :'border-transparent text-gray-400'}}">{{$item['label']}}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="content p-8 flex-1 gap-2 h-full flex flex-col bg-gray-100">
        <div class="status self-end flex flex-row gap-2 border border-gray-200 rounded-r-full rounded-l-full py-1 px-3">
            <span class="self-center text-gray-300">Welcome, {{ auth()->user()->name }}</span>
            <span class="self-center rounded-full w-[10px] h-[10px] bg-green-600"></span>
        </div>
        <div class="p-4 h-full overflow-auto">
            @if($active === '')
                @include('ships.index')

            @elseif($active === "view-ships")
                @include('ships.view')

            @elseif($active == "add-new-ship")
                @include('ships.create')

            @elseif($active == "view-ports")
                @include('ports.index')

            @endif
        </div>

    </div>
</div>
