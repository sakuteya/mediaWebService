<div class="border-bottom p-3">
    <div class="d-flex small text-secondary">
        <span>投稿者:</span>
        <a href='{{ $article->routeUser() }}' class="mr-1">{{ $article->user->name }}</a>
        <span>更新日時:</span>
        <span>{{$article->updated_at}}</span>
    </div>
    <div>
        <a href='{{ $article->routeArticle() }}' class="h3">{{ $article->title }}</a>
    </div>
    <div class="d-flex">
        @foreach ($article->tags as $tag)
            <a href="#" class="badge badge-secondary mr-1">{{$tag->tag_name}}</a>
        @endforeach
    </div>
</div>
