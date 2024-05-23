<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\EducationLevel;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EducationLevelTest extends TestCase
{
    use RefreshDatabase;

    public function testAgregarEducationLevel()
    {
        $educationLevel = EducationLevel::create(['level' => 'Test Level']);

        $this->assertDatabaseHas('education_levels', [
            'level' => 'Test Level',
        ]);
    }

    public function testActualizarEducationLevel()
    {
        $educationLevel = EducationLevel::create(['level' => 'Old Level']);
        $educationLevel->update(['level' => 'Updated Level']);

        $this->assertDatabaseHas('education_levels', [
            'level' => 'Updated Level',
        ]);
    }

    public function testConsultarEducationLevel()
    {
        $educationLevel = EducationLevel::create(['level' => 'Test Level']);
        $fetchedLevel = EducationLevel::find($educationLevel->id);

        $this->assertEquals($educationLevel->level, $fetchedLevel->level);
    }

    public function testBorrarEducationLevel()
    {
        $educationLevel = EducationLevel::create(['level' => 'Test Level']);
        $educationLevel->delete();

        $this->assertSoftDeleted('education_levels', [
            'id' => $educationLevel->id,
        ]);
    }
}
