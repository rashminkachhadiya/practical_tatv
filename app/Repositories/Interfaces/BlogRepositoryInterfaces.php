<?php

namespace App\Repositories\Interfaces;

use App\Models\Blog;

Interface BlogRepositoryInterfaces
{

	public function getBlog();

	public function getTag();

	public function saveBlog(array $blog);

	public function saveTag(array $tag);
}