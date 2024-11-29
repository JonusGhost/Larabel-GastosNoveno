@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>RAMÍREZ OLIVO AXEL ISAÍ</p>
    <p>GONZALEZ GONZALEZ JOHAN</p>
    <p>VARGAS ESPINOSA JONATHAN EMMANUEL</p>
    <p>YAEL GOMEZ</p>

    <!-- Nueva sección: Lista de tareas -->
    <h3>Tareas pendientes</h3>
    <ul>
        <li>Revisar reportes financieros</li>
        <li>Actualizar base de datos</li>
        <li>Reunión con el equipo</li>
    </ul>

    <!-- Nueva sección: Gráfico -->
    <h3>Gráfico de ingresos</h3>
    <div id="chart" style="width: 100%; height: 400px;"></div>

    <!-- Nueva sección: Formulario -->
    <h3>Formulario de contacto</h3>
    <form method="POST" action="#">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
@stop

@section('css')
    {{-- Agregar estilos adicionales --}}
    <style>
        h1 {
            color: #007bff;
        }
        .form-group {
            margin-bottom: 15px;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
        
        // Agregar un gráfico simple con Chart.js
        var ctx = document.getElementById('chart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril'],
                datasets: [{
                    label: 'Ingresos mensuales',
                    data: [1500, 1800, 2000, 2200],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@stop
