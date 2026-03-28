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
