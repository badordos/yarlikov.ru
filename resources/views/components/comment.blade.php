<form method="post" action="{{route('comment')}}">
    {{csrf_field()}}
    <input type="hidden" name="model" value="{{get_class($model)}}">
    <input type="hidden" name="id" value="{{$model->id}}">
    <div class="form-group">
        <label>Ваше имя</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Комментарий</label>
        <textarea class="form-control" name="comment" rows="4">{{old('comment')}}</textarea>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {!! app('captcha')->display() !!}
        </div>
    </div>
    <button class="btn btn-info" type="submit">Отправить</button>
</form>
