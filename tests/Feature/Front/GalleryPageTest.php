<?php

namespace Tests\Feature\Front;

use App\Image;
use App\Page;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class GalleryPageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_creates_gallery_page_from_seed()
    {
        (new \ImageTableSeeder())->run();

        $this->assertDatabaseHas('images', ['id' => 1]);

        $image = Image::query()->find(1)->toArray();

        $response = $this->get(route('gallery'));

        $response
            ->assertSee($image['url'])
            ->assertStatus(200);
    }
}
