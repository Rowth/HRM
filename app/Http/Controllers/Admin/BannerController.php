<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

/**
 * Class NoticeboardsController
 * @package App\Http\Controllers\Admin
 */
class BannerController extends Controller
{
    public function index()
    {
        return View::make('admin.banner.index');
    }

}
