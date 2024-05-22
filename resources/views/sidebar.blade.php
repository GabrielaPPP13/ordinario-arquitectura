<div class="grid">
    <div class="sidebar">
        <a href="{{ route('home') }}">Inicio</a>
        <a href="{{ route('tickets.index') }}">Tickets</a>
        <a href="{{ route('users.index') }}">Usuarios</a>
        <a href="{{ route('education-levels.index') }}">Niveles educativos</a>
        <a href="{{ route('cities.index') }}">Municipios</a>
        <a href="{{ route('subjects.index') }}">Asunto</a>
        <a href="{{ route('responsables.index') }}">Responsable</a>
        <a href="{{ route('statuses.index') }}">Estatus</a>
        <button class="btn btn-danger" onclick="logout()">Cerrar sesión</button>
    </div>
</div>

<style>

.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    width: 200px; 
    background-color: #f4f4f4;
    padding: 20px;
}

.sidebar a {
    display: block;
    margin-bottom: 10px;
    text-decoration: none;
    color: #333;
}

.sidebar a:hover {
    color: #dd34f3; 
}

.btn-logout {
    margin-top: 20px;
}

.grid {
    display: grid;
    grid-template-columns: auto 1fr; 
    gap: 20px; }
  
</style>

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
