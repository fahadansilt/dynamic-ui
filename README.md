# Dynamic UI

A Laravel + React system for dynamic UI block management. Administrators can configure UI blocks through an admin dashboard that instantly updates the frontend interface.

Laravel 12, React 19, Inertia.js, Tailwind CSS, TypeScript


2. Install dependencies:
```bash
composer install
npm install
```

3. Environment setup:
```bash
cp .env.example .env
php artisan key:generate
php artisan storage:link
```

4. Database setup:
```bash
php artisan migrate
php artisan db:seed
```

5. Start development servers:
```bash
# Using the combined dev script
composer run dev

# Or individually:
php artisan serve
npm run dev
```

## Usage

### Admin Access
- **URL**: `/admin/login`
- **Credentials**: 
  - Email: `admin@developer.com`
  - Password: `Password123!`

### User Access
- **URL**: `/` (homepage)

### Admin Features
- Create/edit UI blocks (banner, card, list, stats)
- Drag & drop reordering
- Activate/deactivate blocks
- Real-time preview

## Content Structure

See [BLOCK_CONTENT_EXAMPLES.md](BLOCK_CONTENT_EXAMPLES.md) for detailed JSON structure examples for each block type.

