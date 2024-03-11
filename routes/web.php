<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::statamic('example', 'example-view', [
//    'title' => 'Example'
// ]);
Route::get('/', function() {
    return redirect()->route('statamic.cp.index'); // view('welcome');
});

Route::middleware(config('statamic.api.middleware'))->post('trigger-vercel-deployment', function() {
    $response = \Http::get(config('services.vercel.deployment-hook-url'));
    $response->successful()
        ? Toast::success('Vercel deployment triggered!')
        : Toast::error('Vercel deployment failed.');
    return back();
});
