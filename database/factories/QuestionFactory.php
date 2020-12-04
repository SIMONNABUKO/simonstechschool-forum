<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class QuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function genID(){
        return rand(1,20);
    }
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title, '_');
        return [
            'title'=>$title,
            'slug'=>$slug,
            'body'=>$this->faker->text,
            'user_id'=>function(){
                return \App\Models\User::all()->random();
            },
            'category_id'=>function(){
                return \App\Models\Category::all()->random();
            },
        ];
    }
}