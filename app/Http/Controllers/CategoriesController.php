<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\MainCategory;
use App\SubCategory;

class CategoriesController extends Controller
{
    public function addMainCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //dd($data);
            $mainCatChk = MainCategory::where(['name' => $data['name']])->count();
            if($mainCatChk>0){
                return redirect('/admin/categories/add-main-category')->with('error', '"'.$data['name'].'"<br>Category 
                    already exists.Please enter a new one!');
            }
            $mainCatUrlChk = MainCategory::where(['url' => $data['url']])->count();
            if($mainCatUrlChk>0){
                return redirect('/admin/categories/add-main-category')->with('error', '"'.$data['url'].'"<br>URl 
                    is already exists for other main category.Please enter a new one!');
            }
            if(empty($data['status'])){
                $status = 0;
            }else{
                $status = 1;
            }
            $mainCategory = new MainCategory;
            $mainCategory->name = $data['name'];
            $mainCategory->url = $data['url'];
            $mainCategory->status = $status;
            //dd($mainCategory);
            $mainCategory->save();
            return redirect('/admin/categories/view-main-categories')->with('success','Main Category Added Successfully');
        }

        return view('admin.categories.add_main_category');
    }

    public function editMainCategory(Request $request, $id=null){
        if($request->isMethod('post')){
            $data=$request->all();
            if(empty($data['status'])){
                $status = '0';
            }else{
                $status = '1';
            };

            MainCategory::where(['id'=>$id])->update(['name' =>$data['name'], 'url' => $data['url'], 'status' => $status]);
            return redirect('/admin/categories/view-main-categories')->with('success', 'This Main Category Updated 
                Successfully');
        }
        $mainCategory = MainCategory::where(['id'=>$id])->first();
        return view('admin.categories.edit_main_category')->with(compact('mainCategory'));
    }

    public function viewMainCategories(){
        $mainCategory = MainCategory::orderBy('id','DESC')->get();
        return view('admin.categories.view_main_categories')->with(compact('mainCategory'));
    }

    public function addSubCategory(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            //dd($data);
            if(empty($data['status'])){
                $status = "0";
            }else{
                $status = "1";
            }
            $subCategory = new SubCategory;
            $subCategory->sub_name = $data['sub_name'];
            $subCategory->parent_id = $data['parent_id'];
            $subCategory->description = $data['description'];
            $subCategory->sub_url = $data['sub_url'];
            $subCategory->status = $status;
            //dd($subCategory);
            $subCategory->save();
            return redirect('/admin/categories/view-sub-categories')->with('success', 'Sub Category Added Successfully');
        }
        $mainCategories = MainCategory::where(['parent_id'=>"0"])->get();
        return view('admin.categories.add_sub_category')->with(compact('mainCategories'));
    }

    public function editSubCategory(Request $request, $id=null){
        if($request->isMethod('post')){
            $data = $request->all();
            if(empty($data['status'])){
                $status = "0";
            }else{
                $status = "1";
            }
            $input = SubCategory::where(['id'=>$id])->update(['sub_name'=>$data['sub_name'],'parent_id'=>$data
            ['parent_id'],'description'=>$data['description'],'sub_url'=>$data['sub_url'],'status'=>$status]);
            return redirect('/admin/categories/view-sub-categories')->with('success','Sub Category Updated Successfully');
        }
        $mainCategories = MainCategory::where(['parent_id'=>"0"])->get();
        $subCategories = SubCategory::where(['id'=>$id])->first();
        
        return view('admin.categories.edit_sub_category')->with(compact('mainCategories','subCategories'));
    }

    public function viewSubCategories(){
        $subCategories = SubCategory::orderBy('id', 'DESC')->get();
        return view('admin.categories.view_sub_categories')->with(compact('subCategories'));
    }

}
