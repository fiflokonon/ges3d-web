<?php

use App\Http\Livewire\Dashboard\Agents\AddAgentsComponent;
use App\Http\Livewire\Dashboard\Agents\EditAgentsComponent;
use App\Http\Livewire\Dashboard\Agents\ListeAgentsComponent;
use App\Http\Livewire\Dashboard\Alerts\AlertDetailComponent;
use App\Http\Livewire\Dashboard\Alerts\ListeAlertComponent;
use App\Http\Livewire\Dashboard\Articles\AddArticleComponent;
use App\Http\Livewire\Dashboard\Articles\EditArticleComponent;
use App\Http\Livewire\Dashboard\Articles\ListeArticleComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Site\WelcomeComponent;
use App\Http\Livewire\Dashboard\DashboardComponent;
use App\Http\Livewire\Dashboard\Products\ListeProductComponent;
use App\Http\Livewire\Dashboard\Utilisateurs\AddUserComponent;
use App\Http\Livewire\Dashboard\Utilisateurs\EditUserComponent;
use App\Http\Livewire\Dashboard\Utilisateurs\ListeUsersComponent;
use App\Http\Livewire\Site\AboutComponent;
use App\Http\Livewire\Site\AlertComponent;
use App\Http\Livewire\Site\BoutiqueComponent;
use App\Http\Livewire\Site\CartItemComponent;
use App\Http\Livewire\Site\ContactComponent;
use App\Http\Livewire\Site\LoginComponent;
use App\Http\Livewire\Site\RegisterComponent;
use App\Http\Livewire\Site\SensiblisationComponent;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeComponent::class)->name('welcome');
Route::get('/dashboard', DashboardComponent::class)->name('dashboard')->middleware('auth:sanctum');

Route::get('/users', ListeUsersComponent::class)->name('dashboard.liste-users')->middleware('auth:sanctum');


Route::get('/agents', ListeAgentsComponent::class)->name('dashboard.liste-agents')->middleware('auth:sanctum');


Route::get('/alerts', ListeAlertComponent::class)->name('dashboard.liste-alerts')->middleware('auth:sanctum');
Route::get('/alerts/{id}', AlertDetailComponent::class)->name('dashboard.datail-alerts')->middleware('auth:sanctum');

Route::get('/articles', ListeArticleComponent::class)->name('dashboard.liste-articles')->middleware('auth:sanctum');


Route::get('/products', ListeProductComponent::class)->name('dashboard.liste-product')->middleware('auth:sanctum');


// liste des routes pour le site

Route::get('/sensibilisation', SensiblisationComponent::class)->name('site.sensibilisation');
Route::get('/login', LoginComponent::class)->name('login');
Route::get('/register', RegisterComponent::class)->name('site.register');
Route::get('/panier', CartItemComponent::class)->name('site.panier')->middleware('auth:sanctum');
Route::get('/boutique', BoutiqueComponent::class)->name('site.boutique');
Route::get('/about', AboutComponent::class)->name('site.about');
Route::get('/contact', ContactComponent::class)->name('site.contact');

Route::get('/alert', AlertComponent::class)->name('site.alert');


