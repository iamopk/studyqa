<?php

namespace Tests\Feature\Admin;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guests_can_not_login_to_admin()
    {
        $this->withExceptionHandling();
        $this->get(route('admin.news'))
            ->assertStatus(302)
            ->assertRedirect(route('home'));
    }

    /** @test */
    public function user_role_can_not_access_to_admin()
    {
        $user = factory(User::class)->create(['role' => User::ROLE_USER]);
        $this->actingAs($user);
        $this->get(route('admin.news'))
            ->assertStatus(302)
            ->assertRedirect(route('news'));
    }

    /** @test */
    public function publisher_moderator_admin_roles_can_access_to_admin()
    {
        $users[] = factory(User::class)->create(['role' => User::ROLE_PUBLISHER]);
        $users[] = factory(User::class)->create(['role' => User::ROLE_ADMIN]);
        $users[] = factory(User::class)->create(['role' => User::ROLE_MODERATOR]);
        $news = factory(Article::class)->create();
        foreach ($users as $user) {
            $this->actingAs($user);
            $this->get(route('admin.news'))
                ->assertStatus(200)
                ->assertViewIs('admin.articles.index')
                ->assertSee($news->title);
        }
    }
}
