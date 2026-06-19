@props(['user', 'size' => 'size-16 md:size-20'])

@if ($user->avatar)
    <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}" class="{{ $size }} rounded-full object-cover object-top" />
@else
    <img src="/user.png" alt="{{ $user->name }}" class="{{ $size }} rounded-full object-cover" />
@endif