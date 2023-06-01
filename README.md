git clone git@github.com:akirarizky14/Laravel-Vue-Todo.git
cd Laravel-Vue-Todo 
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve and run also npm run dev
You can see my apps on port 8000