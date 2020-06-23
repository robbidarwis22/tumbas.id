<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Alert;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
	public function index(){
		$categorys = Category::where('parent_id',null)->get();
		return view('admin.category.index',compact('categorys'));
	}

	public function store(Request $request){
		$category = new Category;
		$category->slug = $request->slug;
		$category->name = $request->name;
		$category->parent_id = $request->parent_id;
		$category->icon = $request->icon;
		$category->user_id = Auth::user()->id;
		$category->save();
		alert()->success('Success Message', 'Category Berhasil di Tambahkan');
		return redirect('admin/category');
	}

	public function edit(Request $request,$id){
		$category = Category::find($id);
		$categorys = Category::where('parent_id',null)->get();
		return view('admin.category.edit',compact('category','categorys'));
	}

  	public function update(Request $request,$id){
  		$category = Category::find($id);
  		$category->slug = $request->slug;
		$category->name = $request->name;
		$category->parent_id = $request->parent_id;
		$category->icon = $request->icon;
		$category->save();
		alert()->success('Success Message', 'Category Berhasil di Diubah');
		return redirect(route('category.index'));
  	}

  	public function destroy($id){
  		$category = Category::find($id);
  		$category->delete();
  		alert()->success('Success Message', 'Category Berhasil di Hapus');
  		return redirect(route('category.index'));
  	}
}
