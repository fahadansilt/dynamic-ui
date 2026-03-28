<?php

namespace Database\Seeders;

use App\Models\UiBlock;
use Illuminate\Database\Seeder;

class UiBlockSeeder extends Seeder
{
    public function run(): void
    {
        UiBlock::create([
            'title' => 'Welcome Banner',
            'type' => 'banner',
            'is_active' => true,
            'order' => 1,
            'content' => [
                'subtitle' => 'Dynamic UI System',
                'description' => 'Experience our powerful admin-configurable interface that adapts to your needs.',
                'buttonText' => 'Get Started',
                'buttonUrl' => '#'
            ]
        ]);

        UiBlock::create([
            'title' => 'Key Features',
            'type' => 'card',
            'is_active' => true,
            'order' => 2,
            'content' => [
                'description' => 'Discover what makes our platform unique',
                'features' => [
                    'Admin-configurable UI blocks',
                    'Real-time content updates',
                    'Drag & drop reordering',
                    'Multiple block types'
                ],
                'icon' => '🚀',
                'buttonText' => 'Learn More',
                'buttonUrl' => '#'
            ]
        ]);

        UiBlock::create([
            'title' => 'Platform Statistics',
            'type' => 'stats',
            'is_active' => true,
            'order' => 3,
            'content' => [
                'description' => 'Our platform by the numbers',
                'stats' => [
                    [
                        'value' => '10K+',
                        'label' => 'Active Users',
                        'description' => 'Growing daily'
                    ],
                    [
                        'value' => '99.9%',
                        'label' => 'Uptime',
                        'description' => 'Reliable service'
                    ],
                    [
                        'value' => '50+',
                        'label' => 'Features',
                        'description' => 'And counting'
                    ],
                    [
                        'value' => '24/7',
                        'label' => 'Support',
                        'description' => 'Always here'
                    ]
                ]
            ]
        ]);

        UiBlock::create([
            'title' => 'Getting Started Guide',
            'type' => 'list',
            'is_active' => true,
            'order' => 4,
            'content' => [
                'description' => 'Follow these steps to get the most out of our platform',
                'items' => [
                    [
                        'title' => 'Create Your Account',
                        'description' => 'Sign up and verify your email address'
                    ],
                    [
                        'title' => 'Configure Your Profile',
                        'description' => 'Add your personal information and preferences'
                    ],
                    [
                        'title' => 'Explore Features',
                        'description' => 'Take a tour of all available tools and options'
                    ],
                    [
                        'title' => 'Start Building',
                        'description' => 'Begin creating your first project'
                    ]
                ]
            ]
        ]);
    }
}
