<!doctype html>
<html lang="en">
@include('_template.head')
<body>
    @include('_template.nav')

    {{ $slot }}
</body>
@include('_template.footer')
</html>
