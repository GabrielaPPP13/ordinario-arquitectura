@extends('base')
@section('title', 'Inicio')



@section('body')
@include('sidebar')


@endsection

@push('scripts')
    <script>
        const logout = async () => {
            // URL to GET
            const url = route('users.logout');
            // Send the request to the backend
            const req = await fetch(url);
            // Check request status
            if (req.ok) {
                window.location.href = route('login');
                return;
            }
            showToast('Error', 'Ha ocurrido un error', 'error');
        }
    </script>
@endpush

