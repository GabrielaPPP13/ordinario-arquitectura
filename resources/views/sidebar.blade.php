<div class="grid">
    <div class="sidebar">
        <a href="{{ route('home') }}">Inicio</a>
        <a href="{{ route('cities.index') }}">Tickets</a>
        <a href="{{ route('users.index') }}">Usuarios</a>
        <a href="{{ route('education-levels.index') }}">Niveles educativos</a>
        <a href="{{ route('cities.index') }}">Municipios</a>
        <a href="{{ route('cities.index') }}">Asunto</a>
        <a href="{{ route('cities.index') }}">Responsable</a>
        <button class="btn btn-danger" onclick="logout()">Cerrar sesión</button>
    </div>
</div>

<style>

.sidebar {
    position: fixed;
    left: 0;
    top: 0;
    bottom: 0;
    width: 200px; /* ajusta el ancho según sea necesario */
    background-color: #f4f4f4; /* color de fondo del sidebar */
    padding: 20px;
}

.sidebar a {
    display: block;
    margin-bottom: 10px;
    text-decoration: none;
    color: #333; /* color del texto del enlace */
}

.sidebar a:hover {
    color: #555; /* color del texto del enlace al pasar el cursor */
}

.btn-logout {
    margin-top: 20px;
}

.grid {
    display: grid;
    grid-template-columns: auto 1fr; /* divide el espacio en dos columnas */
    gap: 20px; /* espacio entre las columnas */
}
  
    </style>

