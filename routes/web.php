<?php

use Illuminate\Support\Facades\Route;

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
use App\Models\Property;
use Illuminate\Http\Request;
use PiedWeb\TextSpinner\Spinner;

Route::get('/', function() {
    return redirect('/offers/1');
});

Route::get('/spin-text', function(){
    $spintext = ''; $spuntext ='';
    return view('spinner', compact('spintext','spuntext'));
});
Route::get('/mail-test', function(){
    $lead = \App\Models\Lead::first();
    return (new App\Mail\LeadNotification($lead))->activateTestViews();
} );
Route::post('/spin-text', function(Request $request){
    $spintext = $request->spintext; $spuntext ='';
    $spuntext = Spinner::spin($spintext);
    return view('spinner', compact('spintext','spuntext'));
});
Route::get('/private/test', function(){ return route('image',['filePath'=>'images/bg01.jpg','security=010101']); });
Route::get('/private/{filePath}', [App\Http\Controllers\ImageController::class,'serve'])
        ->where(['filePath' => '.*'])
    ->name('image');
Route::get('/secure/{security}/{filePath}', [App\Http\Controllers\ImageController::class,'serveGoogleFriendly'])
        ->where(['filePath' => '.*'])
    ->name('imageGoogleFriendly');
Route::resource('properties', \App\Http\Controllers\PropertyController::class, [
    'names' => [
        'index' => 'property.index',
        'show' => 'property.show',
        'edit' => 'property.edit',
        'create' => 'property.create',
        'update' => 'property.update',
        'destroy'=>'property.delete'
    ]
]);
Route::prefix('/offers/{property}')->group(function() {
    Route::middleware([\App\Http\Middleware\TrackUse::class])->group(function(){
    Route::get('/', function(Property $property) {
        $title = $property->address;
        return view('billy-gene-landing', compact('property', 'title'));
    })->name('offer.landing');
    Route::get('/thank-you', function (Property $property) {
        $title = $property->address;
        return view('billy-gene-thank-you', compact('property', 'title'));
    })->name('offer.thanks');
    Route::resource('leads', App\Http\Controllers\LeadController::class, [
        'names'=>[
            'index'=>'leads.index',
            'show'=>'leads.show',
            'edit'=>'leads.edit',
            'create'=>'leads.create',
            'update'=>'leads.update',
            'store'=>'leads.store',
            'destroy'=>'leads.delete'
        ]
    ]);
    });
});
