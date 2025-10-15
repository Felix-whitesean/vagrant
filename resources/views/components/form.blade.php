@php
    $ship_types = ['cargo ship', 'passenger ship', 'military ship', 'icebreaker', 'fishing vessel', 'barge ship'];
    $status = [ 'active', 'under maintenance', 'decommissioned'];
@endphp


<form class="form" method="POST" action= "{{route('ships.store') }}">
    @csrf

    @method('post')
   <h3>Add new ship</h3>
    <div class="form-container">
        <div class="form-group-text">
            <label for="ship_name">Ship name:</label>
            <input id="ship_name" class="form-control" type="text" name="name" value="{{old('name')}}" >
            @error('name')
                <div class="text-red-500">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group-text">
            <label for="registration_number">Registration number:</label>
            <input id="registration_number" class="form-control" type="text" name="registration_number" value="{{old('registration_number')}}" >
            @error('registration_number')
                <div class="text-red-500">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group-text">
            <label for="capacity">Capacity:</label>
            <input id="capacity" class="form-control" type="number" name="capacity_in_tonnes" step="0.01" value="{{old('capacity_in_tonnes')}}" >
            @error('capacity_in_tonnes')
                <div class="text-red-500">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group-text">
            <label for="type">Type:</label>
            <select class="form-select" type="text"  name="type" id="type" >
                <option value="">--select--</option>
                @foreach($ship_types as $type)
                    <option value="{{$type}}">{{$type}}</option>
                @endforeach
            </select>
            @error('type')
                <div class="text-red-500">{{$message}}</div>
            @enderror
        </div>

        <div class="form-group-text">
            <label for="status">Status:</label>
            <select class="form-select" type="text" name="status" id="status">
                <option value="">--select--</option>
                @foreach($status as $value)
                    <option value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
            @error('status')
                <div class="text-red-500">{{$message}}</div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>
