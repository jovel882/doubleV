@extends('layouts.app')

@push('includes')
    @vite('resources/js/gitHubUser.js')
@endpush

@section('content')
    <div class="row" id="gitHubUser">
    </div>
@endsection

@push('js')
    <script>
        let loginUser = '{{ $login }}';
    </script>
@endpush