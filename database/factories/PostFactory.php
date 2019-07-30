$factory->define(App\Post::class, function (Faker $faker) {

    // sample dummy title
    $title = ['title1','title2','title3','title4','title5'];

    // sample dummy content
    $content = ['content1','content2','content3','content4','content5'];

    return [
        'title' => $faker->randomElement($title),
        'content' => $faker->randomElement($content)
    ];
});
