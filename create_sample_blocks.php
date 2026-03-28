<?php

require_once 'vendor/autoload.php';

use App\Models\UiBlock;

// Clear existing blocks
UiBlock::truncate();

// Create sample blocks with proper content
UiBlock::create([
    'title' => 'Welcome to Dynamic UI',
    'type' => 'banner',
    'is_active' => true,
    'order' => 1,
    'content' => [
        'subtitle' => 'Admin-Configurable Interface',
        'description' => 'Experience our powerful system where administrators can configure UI blocks that dynamically change the client interface without code modifications.',
        'buttonText' => 'Get Started',
        'buttonUrl' => '#explore'
    ]
]);

UiBlock::create([
    'title' => 'Key Features',
    'type' => 'card',
    'is_active' => true,
    'order' => 2,
    'content' => [
        'description' => 'Discover what makes our platform unique and powerful',
        'features' => [
            'Real-time UI configuration',
            'Drag & drop block reordering',
            'Multiple block types (banner, card, list, stats)',
            'Admin dashboard with full CRUD operations',
            'Responsive design across all devices'
        ],
        'icon' => '🚀',
        'buttonText' => 'Learn More',
        'buttonUrl' => '#features'
    ]
]);

UiBlock::create([
    'title' => 'Platform Statistics',
    'type' => 'stats',
    'is_active' => true,
    'order' => 3,
    'content' => [
        'description' => 'Our platform performance and user engagement metrics',
        'stats' => [
            [
                'value' => '10,000+',
                'label' => 'Active Users',
                'description' => 'Growing every day'
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
                'description' => 'Always available'
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
        'description' => 'Follow these simple steps to get the most out of our platform',
        'items' => [
            [
                'title' => 'Create Your Account',
                'description' => 'Sign up with your email and verify your account to get started'
            ],
            [
                'title' => 'Configure Your Profile',
                'description' => 'Add your personal information, preferences, and customize your dashboard'
            ],
            [
                'title' => 'Explore Admin Features',
                'description' => 'If you are an admin, access the admin panel to configure UI blocks'
            ],
            [
                'title' => 'Start Building',
                'description' => 'Begin creating and managing your content with our powerful tools'
            ]
        ]
    ]
]);

echo "Sample UI blocks created successfully!\n";
