<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $salaryRanges = [
            "Under $50K",
            "$50K - $60K",
            "$60K - $70K",
            "$70K - $80K",
            "$80K - $90K",
            "$90K - $100K",
            "$100K - $125K",
            "$125K - $150K",
            "$150K - $175K",
            "$175K - $200K",
            "Over $200K"
        ];

        
        return [
            'id' => Str::uuid(),
            'title' => fake()->jobTitle(),
            'type' => fake()->randomElement(['Full-Time', 'Part-Time', 'Remote', 'Internship']),
            'location' => fake()->city(),
            'description' => fake()->sentence(255),
            'salary' => fake()->randomElement($salaryRanges),
            'company' => [
                "name" => fake()->company(),
                "description" => fake()->sentence(50),
                "contactEmail" =>  fake()->companyEmail(),
                "contactPhone" => fake()->phoneNumber()
            ]
        ];
    }
}
