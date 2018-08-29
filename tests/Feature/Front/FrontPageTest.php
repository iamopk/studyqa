<?php

namespace Tests\Feature\Front;

use App\Page;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class FrontPageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_creates_front_page_from_seed()
    {
        (new \PageSeeder())->run();

        $this->assertDatabaseHas('pages', ['id' => 1]);

        $frontPage = Page::query()->find(1)->toArray();

        $response = $this->get(route('home'));

        $response
            ->assertSee($frontPage['title'])
            ->assertStatus(200);
    }
}
