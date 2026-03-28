# UI Block Content Structure Examples

This document provides examples of the JSON content structure for each UI block type in the Dynamic UI system.

## Banner Block

**Type:** `banner`

**Content Structure:**
```json
{
  "subtitle": "Optional subtitle text",
  "description": "Main description text for the banner",
  "buttonText": "Call to Action",
  "buttonUrl": "https://example.com"
}
```

**Example:**
```json
{
  "subtitle": "Welcome to Our Platform",
  "description": "Experience the power of dynamic, admin-configurable user interfaces.",
  "buttonText": "Get Started",
  "buttonUrl": "/signup"
}
```

## Card Block

**Type:** `card`

**Content Structure:**
```json
{
  "description": "Card description text",
  "features": ["Feature 1", "Feature 2", "Feature 3"],
  "icon": "🚀",
  "buttonText": "Action Button",
  "buttonUrl": "https://example.com"
}
```

**Example:**
```json
{
  "description": "Powerful features for modern applications",
  "features": [
    "Real-time updates",
    "Admin configuration",
    "Mobile responsive",
    "SEO optimized"
  ],
  "icon": "⚡",
  "buttonText": "Learn More",
  "buttonUrl": "/features"
}
```

## List Block

**Type:** `list`

**Content Structure:**
```json
{
  "description": "Optional description for the list",
  "items": [
    "Simple string item",
    {
      "title": "Item with title and description",
      "description": "Detailed description of the item"
    }
  ]
}
```

**Example:**
```json
{
  "description": "Steps to get started with our platform",
  "items": [
    {
      "title": "Sign Up",
      "description": "Create your account in less than 2 minutes"
    },
    {
      "title": "Configure Settings",
      "description": "Customize your preferences and profile"
    },
    {
      "title": "Start Building",
      "description": "Begin creating your first project"
    }
  ]
}
```

## Stats Block

**Type:** `stats`

**Content Structure:**
```json
{
  "description": "Optional description for the statistics",
  "stats": [
    {
      "value": "100K+",
      "label": "Statistic Label",
      "description": "Optional description"
    }
  ]
}
```

**Example:**
```json
{
  "description": "Our platform performance metrics",
  "stats": [
    {
      "value": "50K+",
      "label": "Active Users",
      "description": "Growing every day"
    },
    {
      "value": "99.9%",
      "label": "Uptime",
      "description": "Reliable service"
    },
    {
      "value": "24/7",
      "label": "Support",
      "description": "Always available"
    },
    {
      "value": "100+",
      "label": "Features",
      "description": "And counting"
    }
  ]
}
```

## Tips for Content Creation

1. **JSON Validation**: Always ensure your JSON is valid before saving. Invalid JSON will cause rendering errors.

2. **Optional Fields**: All fields in the content structure are optional. The blocks will render gracefully with missing fields.

3. **Responsive Design**: All blocks are designed to be responsive and will adapt to different screen sizes.

4. **HTML in Text**: Basic HTML tags can be used in text fields for formatting (e.g., `<strong>`, `<em>`, `<br>`).

5. **URLs**: Use relative URLs (e.g., `/about`) for internal links and absolute URLs (e.g., `https://example.com`) for external links.

## Content Guidelines

- Keep titles concise and descriptive
- Use clear, actionable language for buttons
- Ensure descriptions are informative but not too lengthy
- Test your content on different screen sizes
- Use consistent styling and tone across blocks
