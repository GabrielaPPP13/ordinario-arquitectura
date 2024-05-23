<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StatusTest extends TestCase
{
    use RefreshDatabase;

    public function testAgregarStatus()
    {
        $status = Status::create(['status' => 'Test Status']);

        $this->assertDatabaseHas('statuses', [
            'status' => 'Test Status',
        ]);
    }

    public function testActualizarStatus()
    {
        $status = Status::create(['status' => 'Old Status']);
        $status->update(['status' => 'Updated Status']);

        $this->assertDatabaseHas('statuses', [
            'status' => 'Updated Status',
        ]);
    }

    public function testConsultarStatus()
    {
        $status = Status::create(['status' => 'Test Status']);
        $fetchedStatus = Status::find($status->id);

        $this->assertEquals($status->status, $fetchedStatus->status);
    }

    public function testBorrarStatus()
    {
        $status = Status::create(['status' => 'Test Status']);
        $status->delete();

        $this->assertDatabaseMissing('statuses', [
            'id' => $status->id,
        ]);
    }
}
