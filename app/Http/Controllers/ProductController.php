<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController; 
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Str;
class ProductController extends BaseController
{
    public function list()
    {
        
    }
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
           
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $save['name'] = $input['name'];
        $save['slug'] = Str::slug($input['name']);
        $save['price'] = $input['price'];
        $save['status'] = $input['status'];

        Product::create($save);
         return $this->sendResponse([], 'product created successfully.');
    }
    public function edit($id)
    {   
       $data = Product::find($id);
       return $this->sendResponse($data, 'product retrieved successfully.');
    }
    public function update(Request $request, $id)
    {
         $input = $request->all();
        $validator = FacadesValidator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'status' => 'required',
           
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $save['name'] = $input['name'];
        $save['slug'] = Str::slug($input['name']);
        $save['price'] = $input['price'];
        $save['status'] = $input['status'];

        Product::where('id' , $id)->update($save);
         return $this->sendResponse([], 'product updated successfully.');
    }
    public function delete($id)
    {
      Product::find($id)->delete();
       return $this->sendResponse([],'product deleted successfully.');
    }
}
