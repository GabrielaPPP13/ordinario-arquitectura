<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 20px;
            }
        h1 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 0.5em;
            color: #333;
        }
        p {
            font-size: 1em;
            margin: 0.2em 0;
            color: #555;
        }
        .container {
            border: 2px solid #009688;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .label {
            font-weight: bold;
            color: #009688;
        }
        .value {
            color: #000;
        }
        .section-title {
            font-size: 1.2em;
            margin-top: 1em;
            margin-bottom: 0.5em;
            border-bottom: 2px solid #009688;
            padding-bottom: 0.2em;
            color: #009688;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles del Ticket</h1>
        <p><span class="label">CURP:</span> <span class="value">{{ $ticket->curp }}</span></p>
        <p><span class="label">Nombre:</span> <span class="value">{{ $ticket->name }}</span></p>
        <p><span class="label">Apellido paterno:</span> <span class="value">{{ $ticket->last_name }}</span></p>
        <p><span class="label">Apellido materno:</span> <span class="value">{{ $ticket->second_last_name }}</span></p>
        <p><span class="label">Teléfono 1:</span> <span class="value">{{ $ticket->phone_1 }}</span></p>
        <p><span class="label">Teléfono 2:</span> <span class="value">{{ $ticket->phone_2 }}</span></p>
        <p><span class="label">Email:</span> <span class="value">{{ $ticket->email }}</span></p>
        <p><span class="label">Folio:</span> <span class="value">{{ $ticket->folio }}</span></p>
        <p><span class="label">Ciudad:</span> <span class="value">{{ $ticket->city->city }}</span></p>
        <p><span class="label">Nivel educativo:</span> <span class="value">{{ $ticket->educationLevel->level }}</span></p>
        <p><span class="label">Estatus:</span> <span class="value">{{ $ticket->status->status }}</span></p>
        <p><span class="label">Responsable:</span> <span class="value">{{ $ticket->responsable->name }}</span></p>
        <p><span class="label">Fecha de creación:</span> <span class="value">{{ $ticket->created_at }}</span></p>
        <p><span class="label">Fecha de Asignación:</span> <span class="value">{{ $ticket->date }}</span></p>
        <p><span class="label">Hora de Asignación:</span> <span class="value">{{ $ticket->time }}</span></p>
    </div>
</body>
</html>
