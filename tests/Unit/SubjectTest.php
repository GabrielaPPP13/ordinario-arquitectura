<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Subject;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubjectTest extends TestCase
{
    use RefreshDatabase;

    public function testAgregarSubject()
    {
        $subject = Subject::create(['subject' => 'Test Subject']);

        $this->assertDatabaseHas('subjects', [
            'subject' => 'Test Subject',
        ]);
    }

    public function testActualizarSubject()
    {
        $subject = Subject::create(['subject' => 'Old Subject']);
        $subject->update(['subject' => 'Updated Subject']);

        $this->assertDatabaseHas('subjects', [
            'subject' => 'Updated Subject',
        ]);
    }

    public function testConsultarSubject()
    {
        $subject = Subject::create(['subject' => 'Test Subject']);
        $fetchedSubject = Subject::find($subject->id);

        $this->assertEquals($subject->subject, $fetchedSubject->subject);
    }

    public function testBorrarSubject()
    {
        $subject = Subject::create(['subject' => 'Test Subject']);
        $subject->delete();

        $this->assertDatabaseMissing('subjects', [
            'id' => $subject->id,
        ]);
    }
}
