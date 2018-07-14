
<label for="">Имя</label>
<input type="text" class="form-control" name="title" placeholder="Имя"
       value="@if(old('title')){{old('title')}}@else{{ $currency->title or ""  }}@endif">
@if($errors->has('title'))
    <div class="alert alert-danger">{{$errors->first('title')}}</div>
@endif

<label for="">Короткое имя</label>
<input type="text" class="form-control" name="short_name" placeholder="Короткое имя"
       value="@if(old('short_name')){{old('short_name')}}@else{{ $currency->short_name or ""  }}@endif">
@if($errors->has('short_name'))
    <div class="alert alert-danger">{{$errors->first('short_name')}}</div>
@endif

<label for="">Ссылка на логотип</label>
<input type="text" class="form-control" name="logo_url" placeholder="Ссылка на логотип"
       value="@if(old('logo_url')){{old('logo_url')}}@else{{ $currency->logo_url or ""  }}@endif">
@if($errors->has('logo_url'))
    <div class="alert alert-danger">{{$errors->first('logo_url')}}</div>
@endif

<label for="">Цена USD</label>
<input type="text" class="form-control" name="price" placeholder="Цена USD"
       value="@if(old('price')){{old('price')}}@else{{ $currency->price or ""  }}@endif">
@if($errors->has('price'))
    <div class="alert alert-danger">{{$errors->first('price')}}</div>
@endif


<hr/>

<input class="btn btn-primary" type="submit" value="Save">
