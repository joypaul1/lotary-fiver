<?php

use App\User;
use Illuminate\Support\Facades\Route;

// Backend Routes

require_once __DIR__ . '/backend/authentication.php';

Route::group(['prefix' => 'sadmin', 'middleware' => ['auth:admin', 'admin'], 'namespace' => 'Backend'], function () {
    // Dashboard
    require_once __DIR__ . '/backend/dashboard.php';

    // Site Config
    require_once __DIR__ . '/backend/site_config.php';

    // Product
    require_once __DIR__ . '/backend/product.php';

    // Customer
    require_once __DIR__ . '/backend/customer.php';

    // Order
    require_once __DIR__ . '/backend/order.php';

    // Purchase
    require_once __DIR__ . '/backend/purchase.php';

    // headerSection
    require_once __DIR__ . '/backend/headerSection.php';

    // protocalSection
    require_once __DIR__ . '/backend/protocalSection.php';

    // tokenomiksSection
    require_once __DIR__ . '/backend/tokenomiksSection.php';

    // MARKETPLACE
    require_once __DIR__ . '/backend/marketplaceSection.php';

    // lottarySection
    require_once __DIR__ . '/backend/lottarySection.php';

    // social
    require_once __DIR__ . '/backend/social.php';
});





// Frontend Routes

require_once __DIR__ . '/frontend/home.php';



Route::get('users', function() {
    $items =  User::with('childItems')->get();
    return view('item', compact('items'));
});
