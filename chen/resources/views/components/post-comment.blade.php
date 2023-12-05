@props(['comment'])

<article class="flex">
    <div>
        <img src="https://i.pravatar.cc/100" alt="" width="60" height="60">
    </div>

    <div>
        <header>
            <h3 class="font-blod">{{$comment->author->username}}</h3>

            <p class="text-xs">
                Posted
                <time>{{$comment->created_at}}</time>
            </p>
        </header>


        <p>
            {{$comment->body}}
        </p>
    </div>
</article>

{{-- @include ('posts._add-comment-form')

@foreach ($post->comments as $comment)
    <x-post-comment :comment="$comment"/>
@endforeach --}}