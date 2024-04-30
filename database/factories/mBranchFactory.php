<?php

namespace Database\Factories;

use App\Models\mBranch;
use Illuminate\Database\Eloquent\Factories\Factory;

class mBranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = mBranch::class;
    
    public function definition()
    {
        return [
            'code' => $this->faker->name,
            'name' => $this->faker->name,
            'notes' => $this->faker->text,
        ];
    }
}
