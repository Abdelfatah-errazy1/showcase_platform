@extends('layouts.clients.client')
@section('content')
  <div class="container my-5">
 <div class="row">
  <div class="col-md-8 col">
     <h1 class="mb-4">📥 How to Install a Project from GitHub</h1>

  <div class="mb-5">
    <h4>✅ 1. Clone the Repository</h4>
    <p>Open your terminal and run:</p>
    <pre><code>git clone https://github.com/username/repository.git
cd repository</code></pre>
  </div>

  <div class="mb-5">
    <h4>✅ 2. Install Dependencies</h4>
    <p><strong>Laravel / PHP Project:</strong></p>
    <pre><code>composer install</code></pre>

    <p><strong>If there's a frontend with Node.js (Vue, React, Vite...):</strong></p>
    <pre><code>npm install</code></pre>
  </div>

  <div class="mb-5">
    <h4>✅ 3. Configure Environment File</h4>
    <p>Create your <code>.env</code> file:</p>
    <pre><code>cp .env.example .env</code></pre>

    <p>Edit the file with your database and app details:</p>
    <pre><code>APP_NAME=MyApp
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=myapp
DB_USERNAME=root
DB_PASSWORD=</code></pre>
  </div>

  <div class="mb-5">
    <h4>✅ 4. Generate Application Key</h4>
    <pre><code>php artisan key:generate</code></pre>
  </div>

  <div class="mb-5">
    <h4>✅ 5. Run Migrations and Seeders</h4>
    <p>Run this to set up the database:</p>
    <pre><code>php artisan migrate --seed</code></pre>
  </div>

  <div class="mb-5">
    <h4>✅ 6. Create Storage Link (Optional)</h4>
    <pre><code>php artisan storage:link</code></pre>
  </div>

  <div class="mb-5">
    <h4>✅ 7. Start the Development Server</h4>
    <p>Laravel app:</p>
    <pre><code>php artisan serve</code></pre>
    <p>Vite / Frontend:</p>
    <pre><code>npm run dev</code></pre>
  </div>

  <div class="mb-5">
    <h4>✅ 8. Fix File Permissions (Linux Only)</h4>
    <pre><code>sudo chmod -R 775 storage bootstrap/cache</code></pre>
  </div>

  <div class="mb-5">
    <h4>📦 Final Setup Cheat Sheet</h4>
    <pre><code>git clone &lt;repo-url&gt;
cd &lt;project&gt;
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm install
npm run dev
php artisan serve</code></pre>
  </div>
  </div>
  <div class="col-md-4 col">
    @include('pages.posts.includes.featured')
  </div>
  @include('pages.posts.includes.most')
 </div>
</div>
@endsection