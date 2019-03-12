{{-- 呼び出し時にstartValueを設定すること！ --}}
@for ($i = $startValue; $i < 5; $i++)
    <div class="col-md-2">
        <!-- input type="text" string -->
        <div class="form-group @if(!empty($errors->first('tag'.$i))) has-error @endif">
            <label>タグ{{ $i }}</label>
            <input type="text" name="tag{{ $i }}" value="{{old('tag'.$i)}}" class="form-control">
            <span class="help-block">{{$errors->first('tag'.$i)}}</span>
        </div>
    </div>
@endfor
