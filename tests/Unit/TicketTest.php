<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Ticket;
use App\Models\City;
use App\Models\EducationLevel;
use App\Models\Status;
use App\Models\Responsable;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TicketTest extends TestCase
{
    use RefreshDatabase;

    public function testConsultarTicket()
    {
        // Crear registros relacionados
        $city = City::create(['city' => 'Test City']);
        $educationLevel = EducationLevel::create(['level' => 'Test Level']);
        $status = Status::create(['status' => 'Test Status']);
        $responsable = Responsable::create(['name' => 'Test Responsable']);
        $subject = Subject::create(['subject' => 'Test Subject']);

        // Crear datos de prueba
        $ticket = Ticket::create([
            'folio' => 'TICKET202305010',
            'curp' => 'CURP1234567890ABCDEF',
            'name' => 'Juan Test',
            'last_name' => 'Navarro',
            'second_last_name' => 'Gonzalez',
            'city_id' => $city->id,
            'education_level_id' => $educationLevel->id,
            'email' => 'juan@gmail.com',
            'phone_1' => '1234567890',
            'phone_2' => '0987654321',
            'status_id' => $status->id,
            'responsable_id' => $responsable->id,
            'subject_id' => $subject->id,
            'date' => '2024-05-21',
            'time' => '07:00:00',
        ]);

        // Realizar la consulta del ticket
        $response = $this->json('GET', '/tickets/search-by-curp/' . $ticket->curp . '/' . $ticket->folio);

        // Verificar la respuesta
        $response->assertStatus(200);
        $response->assertJson([
            'folio' => 'TICKET202305010',
            'curp' => 'CURP1234567890ABCDEF',
            'name' => 'Juan Test',
            'last_name' => 'Navarro',
            'second_last_name' => 'Gonzalez',
            'email' => 'juan@gmail.com',
            'phone_1' => '1234567890',
            'phone_2' => '0987654321',
        ]);
    }
}
