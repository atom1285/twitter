@props([
    /** @var \App\Models\User */
    'user'
])

<h2 {{ $attributes }}> {{ $user->name }} </h2>
<h3> Age: {{ floor($user->date_of_birth->diffInYears()) }} </h3>

@if($user->date_of_birth->diffInYears() > 18)
    <p> User can drive </p>
@else
    <p> User cannot drive yet </p>
@endif
