<?php

namespace Tests\Feature\Admin\Articles;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ArticleCreateTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function publishers_and_admins_have_access_to_create_articles()
    {
        $users[] = factory(User::class)->create(['role' => User::ROLE_PUBLISHER]);
        $users[] = factory(User::class)->create(['role' => User::ROLE_ADMIN]);
        foreach ($users as $user) {
            $this->actingAs($user);
            $this->get(route('admin.news.create'))
                ->assertStatus(200)
                ->assertViewIs('admin.articles.create')
                ->assertSeeText('Заголовок')
                ->assertSeeText('Создать');
        }
    }

    /** @test */
    public function moderator_can_not_access_to_create_articles()
    {
        $this->withExceptionHandling();

        $user = factory(User::class)->create(['role' => User::ROLE_MODERATOR]);
        $this->actingAs($user);

        $this->get(route('admin.news'))
            ->assertStatus(200);

        //will redirect back
        $this->get(route('admin.news.create'))
            ->assertStatus(302)
            ->assertRedirect(route('admin.news'))
            ->assertSessionHas('errors');
    }
}
