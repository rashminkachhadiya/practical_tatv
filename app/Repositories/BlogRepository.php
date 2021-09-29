<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BlogRepositoryInterfaces;
use App\Models\Blog;
use App\Models\Tag;

class BlogRepository implements BlogRepositoryInterfaces
{
    public function __construct()
    {
        //
    }

    public function getBlog()
    {
    	$blog = Blog::all();
    	return $blog;
    }

    public function getTag()
    {
    	$tag = Tag::all();
    	return $tag;
    }

    public function saveBlog(array $blog)
    {
    	try{
    		$insertBlog = new Blog($blog);
    		$insertBlog->save();
    		return $insertBlog;
    	}catch(\Exception $e) {
    		\Log::error("saveBlog | Error : {$e->getMessage()}");
    	}
    }

    public function saveTag(array $tag)
    {
    	try{
    		$insertTag = new Tag($tag);
    		$insertTag->save();
    		return $insertTag;
    	}catch(\Exception $e) {
    		\Log::error("saveTag | Error : {$e->getMessage()}");
    	}
    }
}
