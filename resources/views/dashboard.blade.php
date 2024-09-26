<x-layout>
    <h1> Dashboard </h1>

    @foreach($users as $user)
        <x-user-data :user="$user"/>
    @endforeach
</x-layout>
