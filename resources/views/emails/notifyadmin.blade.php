@component('mail::panel')
    {{ $post->author->name }} ({{ $post->author->email }}) submitted a new post just now.
    Please Approve or Delete it here: <a href="{{ route('admin.post', $post) }}">{{ route('admin.post', $post) }}</a>
@endcomponent

@component('mail::message')
### {{ $post->title }}

{{ $post->text }}

{{--@component('mail::button', ['url' => route('admin.post.approve', $post), 'color' => 'success'])--}}
{{--    Approve post--}}
{{--@endcomponent--}}

{{--@component('mail::button', ['url' => route('admin.post.delete', $post), 'color' => 'error'])--}}
{{--    Delete post--}}
{{--@endcomponent--}}
@endcomponent
