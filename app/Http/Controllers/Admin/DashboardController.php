<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
//use App\Models\Blog;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Page;
use App\Models\Faq;
use App\Models\Lead;
use App\Models\color;

class DashboardController extends Controller
{
    public function index(){
        $categories = Category::count();
        //$blogs = Blog::count();
        $reviews = Testimonial::count();
        $services = Service::count();
        $pages = Page::count();
        $faqs = Faq::count();
        $leads = Lead::count();
        $viewData = array(
            'pageName' => 'Dashboard',
            'categories' => $categories,
            //'blogs' => $blogs,
            'reviews' => $reviews,
            'services' => $services,
            'pages' => $pages,
            'faqs' => $faqs,
            'leads' => $leads,
            'breadCrumbs' => array(
                (object)array(
                    'name' => 'Dashboard',
                    'class' => 'active',
                    'url' => route('admin.dashboard')
                )
            )
        );
        return view('admin.dashboard')->with($viewData);
    }
}
