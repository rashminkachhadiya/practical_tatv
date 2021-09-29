<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Interfaces\BlogRepositoryInterfaces;

class BlogController extends Controller
{
    //
    protected $blog;

    public function __construct(BlogRepositoryInterfaces $blog)
    {
    	$this->blog = $blog;
    }

    public function index()
    {
    	$blogs = $this->blog->getBlog();
    	$tags = $this->blog->getTag();
    	return view('blog')->with(['blogs' => $blogs,'tags' => $tags]);
    }

    public function create()
    {
    	return view('create_blog');
    }

    public function save(Request $request)
    {
    	if($request->file()) {
            $fileName = time().'_'.$request->image->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads', $fileName, 'public');
        }

    	$postData = [
    		'user_id' => auth()->user()->id,
    		'title' => $request->title,
    		'description' => $request->description,
    		'image' => '/storage/' . $filePath,
    	];

    	
    	$result = $this->blog->saveBlog($postData);

    	if(isset($request->tag))
    	{
    		$tags = $request->tag;
    		foreach($tags as $tag)
    		{
    			$postTag = [
    				'blog_id' => $result->id,
    				'tag' => $tag,
    			];

    			$resultTag = $this->blog->saveTag($postTag);
    		}
    	}
    	
    }
}
