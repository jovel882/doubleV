@extends('layouts.app')

@push('includes')
    @vite('resources/js/gitHubUsers.js')
@endpush

@section('content')
    <div class="row" id="gitHubUsers">
    </div>
@endsection

@push('js')
    <script>
        let routerDetails = '{{ route('details') }}';
    </script>
@endpush