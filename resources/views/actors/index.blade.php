@extends('layouts.main')
@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="popular-actors">
        <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">
            Popular Actors
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach($popularActors as $actor)
            <div class="actor mt-8">
                <a href="{{ route('actors.show', $actor['id']) }}">
                    <img src="{{$actor['profile_path']}}" alt="profile image" class="hover:opacity-75 traansition
                    ease-in-out
                    duration-150">
                </a>
                <div class="mt-2">
                    <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{
                    $actor['name']
                    }}</a>
                    <div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{--End of popular actors--}}

    <div class="page-load-status flex justify-center text-center pt-4">
        <div class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</div>
        <p class="infinite-scroll-last">End of content</p>
        <p class="infinite-scroll-error">No more pages to load</p>
    </div>
{{--    <div class="flex justify-around mt-16">--}}
{{--        @if($previous)--}}
{{--            <a href="/actors/page/{{ $previous }}">Previous</a>--}}
{{--        @endif--}}
{{--        @if($next)--}}
{{--            <a href="/actors/page/{{ $next }}">Next</a>--}}
{{--        @endif--}}
{{--    </div>--}}
</div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll( elem, {
          // options
          path: '/actors/page/@{{#}}',
          append: '.actor',
            status: '.page-load-status',
          // history: false,
        });

    </script>

@endsection
