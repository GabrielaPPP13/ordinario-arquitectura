{{-- @extends('base')
@section('title', 'Inicio')



@section('body')
@include('sidebar')


@endsection --}}

{{-- @push('scripts')
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
@endpush --}}


@extends('base')
@section('title', 'Inicio')

@section('body')
@include('sidebar')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <canvas id="statusChart" style="height: 50%;"></canvas>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <canvas id="cityChart" style="height: 50%;"></canvas>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const ticketStatusCount = @json($ticketStatusCount);
        const ticketCityCount = @json($ticketCityCount);

        // Configuración de datos para el gráfico de estado
        const statusData = {
            labels: Object.keys(ticketStatusCount),
            datasets: [{
                label: 'Tickets por Estado',
                data: Object.values(ticketStatusCount),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Configuración de opciones para el gráfico de estado
        const statusOptions = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Crear el gráfico de estado
        const statusChartCanvas = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(statusChartCanvas, {
            type: 'bar',
            data: statusData,
            options: statusOptions
        });

        // Configuración de datos para el gráfico de municipio
        const cityData = {
            labels: Object.keys(ticketCityCount),
            datasets: [{
                label: 'Tickets por Municipio',
                data: Object.values(ticketCityCount),
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            }]
        };

        // Configuración de opciones para el gráfico de municipio
        const cityOptions = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };

        // Crear el gráfico de municipio
        const cityChartCanvas = document.getElementById('cityChart').getContext('2d');
        const cityChart = new Chart(cityChartCanvas, {
            type: 'bar',
            data: cityData,
            options: cityOptions
        });
    });
</script>
@endpush
