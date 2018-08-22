<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new \App\Page();
        $page->title = 'Главная';
        $page->text = "<p><b>Главная страница</b></p><p><u>Lorem ipsum dolor sit amet</u>, consectetur adipisicing elit. A aliquam animi beatae commodi consequatur corporis, cum cumque cupiditate delectus error eum eveniet ex explicabo fuga id impedit in inventore ipsa ipsam iste magnam, molestias necessitatibus nemo obcaecati optio perspiciatis praesentium quam qui recusandae sapiente sit tempore tenetur unde ut voluptatem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam animi beatae commodi consequatur corporis, cum cumque cupiditate delectus error eum eveniet ex explicabo fuga id impedit in inventore ipsa ipsam iste magnam, molestias necessitatibus nemo obcaecati optio perspiciatis praesentium quam qui recusandae sapiente sit tempore tenetur unde ut voluptatem.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam animi beatae commodi consequatur corporis, cum cumque cupiditate delectus error eum eveniet ex explicabo fuga id impedit in inventore ipsa ipsam iste magnam, molestias necessitatibus nemo obcaecati optio perspiciatis praesentium quam qui recusandae sapiente sit tempore tenetur unde ut voluptatem.</p><p><br></p>";
        $page->save();
    }
}
