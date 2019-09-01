@if(!empty($comments))
    <h4>Комментарии</h4>
@endif
@foreach($comments as $comment)
    <div class="card">
        <div class="card-header">
            <b>{{$comment->author}}:</b>
        </div>
        <div class="card-body">
            <p class="card-text">{{$comment->text}}</p>
        </div>
    </div>
@endforeach
