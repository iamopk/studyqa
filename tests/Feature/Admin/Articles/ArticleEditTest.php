<?php

namespace Tests\Feature\Admin\Articles;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ArticleEditTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function moderators_and_admins_have_access_to_edit_articles()
    {
        //to be able to create article
        factory(User::class)->create(['role' => User::ROLE_PUBLISHER]);
        $article = factory(Article::class)->create();

        $users[] = factory(User::class)->create(['role' => User::ROLE_MODERATOR]);
        $users[] = factory(User::class)->create(['role' => User::ROLE_ADMIN]);
        foreach ($users as $user) {
            $this->actingAs($user);
            $this->get(route('admin.news.edit', ['id'=>$article->id]))
                ->assertStatus(200)
                ->assertViewIs('admin.articles.edit')
                ->assertSee($article->title);
        }
    }

    /** @test */
    public function publisher_have_access_to_edit_his_article()
    {
        $user = factory(User::class)->create(['role' => User::ROLE_PUBLISHER]);
        $article = factory(Article::class)->create();

        $this->actingAs($user);
        $this->get(route('admin.news.edit', ['id'=>$article->id]))
            ->assertStatus(200)
            ->assertViewIs('admin.articles.edit')
            ->assertSee($article->title);
    }

    /** @test */
    public function publisher_have_no_access_to_edit_others_articles()
    {
        $this->withExceptionHandling();

        $publisher1 = factory(User::class)->create(['role' => User::ROLE_PUBLISHER]);
        $publisher2 = factory(User::class)->create(['role' => User::ROLE_PUBLISHER]);
        $article = factory(Article::class)->create(['user_id'=>$publisher2->id]);

        $this->actingAs($publisher1);

        $this->get(route('admin.news'))
            ->assertStatus(200);

        //will redirect back
        $this->get(route('admin.news.edit', ['id'=>$article->id]))
            ->assertStatus(302)
            ->assertRedirect(route('admin.news'))
            ->assertSessionHas('errors');
    }
}
