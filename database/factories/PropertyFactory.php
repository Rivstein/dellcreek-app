<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $county = $this->getCounty();
        return array_merge([
            'name' => $county['county'].' '.$this->faker->text(20),
            'dimensions' => '50 by 100',
            'map'=> '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63820.25854832494!2d36.65678921576192!3d-1.3158661942399694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1c809869d64b%3A0x199b5604a77f13f5!2sKaren%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1654492822198!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'description' => '<p>Test</p>',
            'price' => round ($this->faker->numberBetween($min = 500000, $max = 500000000), -3),
            'image' => 'properties/Omrsuz9V3a5KjR9BnBeenKgy8jDYMVvvr1xlwErQ.jpg',
            'location' => $this->faker->text(50),
            'listed' => $this->faker->randomElement([0, 1]),
            'hasTitle' => $this->faker->randomElement([0, 1]),
            'created_by' => 1        
        ],$county);
    }

    /**
     * county and sub county generator
     */
    private function getCounty()
    {
        $path = public_path() . "/js/json/counties.json";
        $counties = json_decode(file_get_contents($path), true);

        $random = rand(0, 46);

        $county = $counties[$random];
        $sub_counties = $county['sub_counties'];

        $random = rand(0,count($sub_counties) - 1);

        return [
            'county' => $county['name'],
            'sub_county' => $sub_counties[$random]
        ];
    }
}
