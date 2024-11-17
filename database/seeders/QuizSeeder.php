<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    public function run()
    {
        $quizzes = [
            [
                'question' => 'What is the capital of France?',
                'options' => json_encode(['Berlin', 'Madrid', 'Paris', 'Lisbon']),
                'correct_answer' => 'Paris',
            ],
            [
                'question' => 'Who wrote "Hamlet"?',
                'options' => json_encode(['William Shakespeare', 'Charles Dickens', 'Jane Austen', 'Leo Tolstoy']),
                'correct_answer' => 'William Shakespeare',
            ],
            [
                'question' => 'What is the chemical symbol for water?',
                'options' => json_encode(['O2', 'H2O', 'CO2', 'NaCl']),
                'correct_answer' => 'H2O',
            ],
            [
                'question' => 'What planet is known as the Red Planet?',
                'options' => json_encode(['Mars', 'Venus', 'Jupiter', 'Saturn']),
                'correct_answer' => 'Mars',
            ],
            [
                'question' => 'Which element does "O" represent on the periodic table?',
                'options' => json_encode(['Oxygen', 'Gold', 'Osmium', 'Oganesson']),
                'correct_answer' => 'Oxygen',
            ],
        ];

        foreach ($quizzes as $quiz) {
            Quiz::create($quiz);
        }
    }
}