<form method="POST" action="{{route($actionRoute)}}">
    @csrf
    @method('post')
    <div class="form">
        <h3>{{$title}}</h3>
        <div class="form-container">
            @foreach($formFields as $field)
                @if($field['type'] == "select")
                    @php
                        $optionsArrayName = $field['optionsArray'];
                        $options = $$optionsArrayName ?? [];
                    @endphp
                    <div class="form-group-text">
                        <label for="status">{{$field['label']}}</label>
                        <select class="form-select" type="text" name="{{$field['name']}}" id="{{$field['name']}}">
                            <option value="">--select--</option>
                            @if(is_array($options) && count($options) > 0 && is_string(array_key_first($options)))
                                @foreach($options as $value)
                                    <option value="{{ $value }}">{{ ucfirst($value) }}</option>
                                @endforeach

                                {{-- For id => name pairs --}}
                            @elseif(is_array($options))
                                @foreach($options as $id => $label)
                                    <option value="{{ $id }}">{{ ucfirst($label) }}</option>
                                @endforeach
                            @endif
                        </select>
                           @error($field['name'])
                                <div class="text-red-500">{{$message}}</div>
                           @enderror
                    </div>

                @elseif($field['type'] == "number")
                    <div class="form-group-text">
                        <label for="ship_name">{{$field['label']}}</label>
                        <input id="{{$field['name']}}" class="form-control" type="{{$field['type']}}" name="{{$field['name']}}" step="{{$field['step']}}" value="{{old($field['name'])}}" >
                        @error($field['name'])
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                    </div>

                @else
                    <div class="form-group-text">
                        <label for="ship_name">{{$field['label']}}</label>
                        <input id="{{$field['name']}}" class="form-control" type="{{$field['type']}}" name="{{$field['name']}}" value="{{old($field['name'])}}" >
                        @error($field['name'])
                        <div class="text-red-500">{{$message}}</div>
                        @enderror
                    </div>
                @endif
            @endforeach
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>

</form>
