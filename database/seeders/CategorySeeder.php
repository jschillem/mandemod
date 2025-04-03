<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Due to there being a set of default categories for the system
        // (users cannot create more categories), we will seed the default categories here.

        // Determine if the categories already exist to avoid seeding duplicates.
        if (Category::count() > 0) {
            // Categories already exist, no need to seed again
            $this->command->info('Categories already exist in the database. Skipping seeding.');
            $this->command->info('In order to add new categories, use the category:add Artisan command.');

            return;
        }

        $categories = [
            ['name' => 'Attenuator'],
            ['name' => 'Blank Panel'],
            ['name' => 'Clock Generator'],
            ['name' => 'Clock Modulator'],
            ['name' => 'Controller'],
            ['name' => 'CV Modulation'],
            ['name' => 'Delay'],
            ['name' => 'Digital'],
            ['name' => 'Distortion'],
            ['name' => 'Drum'],
            ['name' => 'Stereo'],
            ['name' => 'Dynamics'],
            ['name' => 'Effect'],
            ['name' => 'Envelope Follower'],
            ['name' => 'Envelope Generator'],
            ['name' => 'Equalizer'],
            ['name' => 'Expander'],
            ['name' => 'External'],
            ['name' => 'Filter'],
            ['name' => 'Frequency Divider'],
            ['name' => 'Function Generator'],
            ['name' => 'Fuzz'],
            ['name' => 'LFO'],
            ['name' => 'Logic'],
            ['name' => 'Looper'],
            ['name' => 'Low Pass Gate'],
            ['name' => 'MIDI'],
            ['name' => 'Mixer'],
            ['name' => 'Multiple'],
            ['name' => 'Noise'],
            ['name' => 'Oscillator'],
            ['name' => 'Panning'],
            ['name' => 'Phase Shifter'],
            ['name' => 'Pitch Shifter'],
            ['name' => 'Polarizer'],
            ['name' => 'Power'],
            ['name' => 'PreAmp'],
            ['name' => 'Quad'],
            ['name' => 'Quantizer'],
            ['name' => 'Random'],
            ['name' => 'Resonator'],
            ['name' => 'Reverb'],
            ['name' => 'Ring Modulator'],
            ['name' => 'Sample & Hold'],
            ['name' => 'Sampler'],
            ['name' => 'Sequencer'],
            ['name' => 'Shift Register'],
            ['name' => 'Slew Limiter'],
            ['name' => 'Switch'],
            ['name' => 'Synth Voice'],
            ['name' => 'Tuner'],
            ['name' => 'Utility'],
            ['name' => 'VCA'],
            ['name' => 'Waveshaper'],
        ];

        $categories = array_map(function ($item) {
            $now = Carbon::now();

            return [
                ...$item,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, $categories);

        Category::insert($categories);

        $this->command->info(Category::count().' categories were inserted into the database.');
    }
}
