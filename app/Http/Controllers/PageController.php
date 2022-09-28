<?php

namespace App\Http\Controllers;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index','show']]);
        $this->middleware('permission:page-create', ['only' => ['create','store']]);
        $this->middleware('permission:page-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:page-delete', ['only' => ['destroy']]);
    }

    public function index() 
    {
        $pages = Page::latest()->paginate(100);
        return view('pages.index',compact('pages'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('pages.create');
    }
    
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Page::create($request->all());
        return redirect()->back()->with(['success' => 'Page created!']); 
    }
    

    public function show(Page $page)
    {
        return view('pages.show',compact('page'));
    }
    
    public function edit(Page $page)
    {
        return view('pages.edit',compact('page'));
    }
    

    public function update(Request $request, Page $page)
    {
         request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $page->update($request->all());
    
        return redirect()->back()->with(['success' => 'Page updated!']); 
    }
    

    public function destroy(Page $page)
    {
        $page->delete();
    
        return redirect()->back()->with(['success' => 'Page deleted!']); 
    }
}
