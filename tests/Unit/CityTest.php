<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    use RefreshDatabase;

    public function testAgregarCity()
    {
        $city = City::create(['city' => 'Test City']);

        $this->assertDatabaseHas('cities', [
            'city' => 'Test City',
        ]);
    }

    public function testActualizarCity()
    {
        $city = City::create(['city' => 'Old City']);
        $city->update(['city' => 'Updated City']);

        $this->assertDatabaseHas('cities', [
            'city' => 'Updated City',
        ]);
    }

    public function testConsultarCity()
    {
        $city = City::create(['city' => 'Test City']);
        $fetchedCity = City::find($city->id);

        $this->assertEquals($city->city, $fetchedCity->city);
    }

    public function testBorrarCity()
    {
        $city = City::create(['city' => 'Test City']);
        $city->delete();

        $this->assertSoftDeleted('cities', [
            'id' => $city->id,
        ]);
    }
}
