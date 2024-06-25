<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Assuming you have director_id and genre_id correctly set up in Movie model fillable

        // Example movies with their respective genre_id and director_id
        Movie::create([
            'name' => 'Inception',
            'description' => 'A thief who enters the dreams of others to steal secrets from their subconscious.',
            'director_id' => 3, // Christopher Nolan
            'genre_id' => 3, // Drama
        ])->actors()->attach([2, 4]); // Attach Leonardo DiCaprio and Robert De Niro

        Movie::create([
            'name' => 'The Dark Knight',
            'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
            'director_id' => 3, // Christopher Nolan
            'genre_id' => 1, // Action
        ])->actors()->attach([2]); // Attach Leonardo DiCaprio

        Movie::create([
            'name' => 'Pulp Fiction',
            'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.',
            'director_id' => 2, // Quentin Tarantino
            'genre_id' => 4, // Thriller
        ])->actors()->attach([1, 2]); // Attach Brad Pitt and Leonardo DiCaprio

        Movie::create([
            'name' => 'Forrest Gump',
            'description' => 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.',
            'director_id' => 1, // Steven Spielberg
            'genre_id' => 2, // Comedy
        ])->actors()->attach([3]); // Attach Tom Hanks
    }
}
