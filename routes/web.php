<?php

use App\Mail\MyTestMail;
use App\Mail\SendRecieptMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

Route::group(['middleware'=>['Install','Locale']],function(){
  include('admin.php');
  include('ajax.php');
  include('patient.php');
});

Route::get('change_locale/{lang}','HomeController@change_locale')->name('change_locale');

Route::get('clear-cache',function(){
  \Artisan::call('cache:clear');
  \Artisan::call('config:clear');
  \Artisan::call('view:clear');
});

Route::post('send/mail/reciept', function(Request $request){
  $mail = $request->mail;
  $path = $request->path;
  Mail::to($mail)->send(new SendRecieptMail($path));
  dd([]);
})->name('send.mail.reciept');
?>

