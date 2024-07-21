<?php

namespace App\Http\Controllers\Admin;

use App\Common\FileHandler;
use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewData = array(
            'pageName' => 'Page',
            'breadCrumbs' => array(
                (object)array(
                    'name' => 'Dashboard',
                    'class' => '',
                    'url' => route('admin.dashboard')
                ),
                (object)array(
                    'name' => 'Page',
                    'class' => 'active',
                    'url' => 'javascript:;'
                )
            )
        );
        return view('admin.page.page')->with($viewData);
    }

    public function tabledata(Request $request) {
        $input = $request->all();
        $query = Page::query();
        if($request->search['value']) {
            $searchStrings = explode(' ', $request->search['value']);
            foreach($searchStrings as $searchString) {
                $query->where(function ($query) use ($searchString) {
                    $query->orWhere('title', 'like', '%' . $searchString . '%');
                    $query->orWhere('slug', 'like', '%' . $searchString . '%');
                });
            }
        }
        if($request->order) {
            $orderableColumns = array('title', 'slug', '');
            $query->orderBy($orderableColumns[$request->order['0']['column']], $request->order['0']['dir']);
        }else {
            $query->orderBy('id', 'DESC');
        }
        $recordsFiltered = $query->count();
        $query->offset($input['start']);
        $query->limit($input['length']);
        $filteredPages = $query->get();
        foreach($filteredPages as $page) {
            $page->actions = '<a class="edit_page" href="'.route('admin.page.edit', ['id' => $page->id]).'">
                        <img src="'.asset('img/edit-solid.svg').'" alt="edit icon">
                    </a>';
            if($page->id > 5) {
                $page->actions .= '<a class="deleteprocess" data-type="page" data-id="'.$page->id.'" href="javascript:;">
                        <img src="'.asset('img/trash-solid.svg').'" alt="delete icon">
                    </a>
                    <form class="deleteformpage'. $page->id.'" method="POST" action="'.route('admin.page.destroy', ['id' => $page->id]).'">
                      <input type="hidden" name="_token" value="'.csrf_token().'">
                      <input type="hidden" name="_method" value="DELETE">
                    </form>';
            }
        }
        $data = [
            'draw' => $input['draw'],
            'recordsTotal' => Page::count(),
            'recordsFiltered' => $recordsFiltered,
            "data" =>  $filteredPages
        ];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viewData = array(
            'pageName' => 'Add Page',
            'breadCrumbs' => array(
                (object)array(
                    'name' => 'Dashboard',
                    'class' => '',
                    'url' => route('admin.dashboard')
                ),
                (object)array(
                    'name' => 'Page',
                    'class' => '',
                    'url' => route('admin.page.index')
                ),
                (object)array(
                    'name' => 'Add New Page',
                    'class' => 'active',
                    'url' => 'javascript:;'
                )
            )
        );
        return view('admin.page.addeditpage')->with($viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'featured_image' => 'required|file|mimes:jpg,jpeg,png|max:5120',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return Redirect()->route("admin.page.create")->with('error', $validator->errors());
        }
        $featuredImage = null;
        if ($request->hasfile('featured_image')) {
            $file = $request->file('featured_image');
            if ($file->isValid()) {
                $featuredImage = FileHandler::uploadImage($file);
                if(!$featuredImage) {
                    return Redirect()->route("admin.page.create")->with('error', 'Something went wrong. Please try again');
                }
            }else {
                return Redirect()->route("admin.page.create")->with('error', 'Featured image is not valid');
            }
        }
        $page = new Page;
        $page->title = $request->title;
        $page->featured_image = $featuredImage;
        $page->description = $request->description;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->save();
        return Redirect()->route("admin.page.index")->with('success', 'Page added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $viewData = array(
            'pageName' => 'Update Page',
            'page' => $page,
            'breadCrumbs' => array(
                (object)array(
                    'name' => 'Dashboard',
                    'class' => '',
                    'url' => route('admin.dashboard')
                ),
                (object)array(
                    'name' => 'Page',
                    'class' => '',
                    'url' => route('admin.page.index')
                ),
                (object)array(
                    'name' => 'Update Page',
                    'class' => 'active',
                    'url' => 'javascript:;'
                )
            )
        );
        return view('admin.page.addeditpage')->with($viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'featured_image' => 'file|mimes:jpg,jpeg,png|max:5120',
            'meta_title' => 'required|max:255',
            'meta_description' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return Redirect()->route("admin.page.update", ['id' =>$id])->with('error', $validator->errors());
        }

        if ($request->hasfile('featured_image')) {
            $file = $request->file('featured_image');
            if ($file->isValid()) {
                $featuredImage = FileHandler::uploadImage($file);
                if(!$featuredImage) {
                    return Redirect()->route("admin.page.update", ['id' =>$id])->with('error', 'Something went wrong. Please try again');
                }else {
                    $page->featured_image = $featuredImage;
                }
            }else {
                return Redirect()->route("admin.page.update", ['id' =>$id])->with('error', 'Featured image is not valid');
            }
        }
        if($id > 5) {
            $page->title = $request->title;
        }
        $page->description = $request->description;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->save();
        return Redirect()->route("admin.page.index")->with('success', 'Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::destroy($id);
        return Redirect()->route("admin.page.index")->with('success', 'Page deleted successfully');
    }
}
