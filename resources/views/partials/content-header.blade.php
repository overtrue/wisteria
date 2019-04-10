@if(!!$title)
    <div class="content-header flex justify-between border-b pb-6 mb-6 border-gray-300">
        <div class="border-l-4 border-gray-600 pl-4">
            <h1>{{ $title }}</h1>
            <time class="text-sm text-gray-500">@lang('wisteria::messages.last-updated', ['timeago' => $updatedAt])</time>
        </div>
        <div>
            <div class="py-1 px-4">
                @include('wisteria::partials.edit-btn')
            </div>
        </div>
    </div>
@endif