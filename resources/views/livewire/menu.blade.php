<div class=" flex flex-row ">
    <div class="sidebar w-[400px] h-screen flex flex-row p-4">
        <div class="h-full flex-1 flex flex-col gap-2 rounded-md shadow">
            <div class="company flex flex-row gap-2 bg-gray-300 py-3 px-2 rounded-t-md">
                <img class="rounded-full w-[40px] h-[40px]" src={{url("/icon.png")}}  alt="company-logo"/>
                <h2 class="font-semibold text-2xl">Global shipping system (vagrant)</h2>
            </div>
            <div class="nav flex flex-col gap-8">
                <div class="flex flex-col gap-2">
                    <h5 class="section-title">Ship management</h5>
                    @foreach($shipMenuItems as $item)
                        <button wire:click="setActive('{{$item['action']}}')" class="px-3 {{ $active === $item['action'] ? 'border-gray-600 text-gray-600' :'border-transparent text-gray-400'}}">{{$item['label']}}</button>
                    @endforeach
                </div>
                <div class="flex flex-col gap-2">
                    <h5 class="section-title">Crew management</h5>
                    @foreach($crewMenuItems as $item)
                        <button wire:click="setActive('{{$item['action']}}')" class="px-3 {{ $active === $item['action'] ? 'border-gray-600 text-gray-600' :'border-transparent text-gray-400'}}">{{$item['label']}}</button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="content p-4">
        @if($active === "view-ships")
            @include('ships.view')

        @elseif($active == "add-new-ship")
            @include('ships.create')
        @endif
    </div>
</div>
