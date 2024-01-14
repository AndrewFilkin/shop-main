<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductCreateRequest;
use App\Http\Requests\AdminProductUpdateRequest;
use App\Models\Product;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    //  show create product page
    public function show()
    {
        return view('admin.createProduct');
    }

    //    create product
    public function create(AdminProductCreateRequest $request)
    {

        //        upload splash_screen_image
        // Получаем оригинальное имя файла
        $originalName = $request->file('splash_screen_image');
        // Генерируем уникальное имя для файла
        $filename = time().'_'.pathinfo($originalName->getClientOriginalName(), PATHINFO_FILENAME).'.'.$request->file('splash_screen_image')->getClientOriginalExtension();
        // Сохраняем файл на сервере
        $originalName->move(public_path('assets/img/splash_screen_images/'), $filename);

        $slug = Str::slug($request->input('name'));

        $product = Product::create([
            'name' => $request->input('name'),
            'slug' => $slug,
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'color' => $request->input('color'),
            'size' => $request->input('size'),
            'type' => $request->input('type'),
            'category' => $request->input('category'),
            'splash_screen_image' => $filename,
        ]);

        //            upload product_images[]
        $uploadedImages = [];

        foreach ($request->file('product_images') as $image) {

            $filename_product_images = time().'_'.pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME).'.'.$image->getClientOriginalExtension(); // Генерируем уникальное имя для файла
            $path = $image->move(public_path('assets/img/product_images/'), $filename_product_images); // Загрузка изображения в хранилище, в данном случае - папку "images"
            $uploadedImages[] = $path;
            //        save product_images[] to database
            $product->images()->create([
                'image' => $filename_product_images,
            ]);
        }

        return redirect()->route('show.single.page', $slug);
    }

    //edit product
    public function edit($slug)
    {
        //        get entry product
        $products = Product::where('slug', $slug)->firstOrFail();
        //       get and explode size product
        $sizeStr = $products->size;
        $sizes = explode('/', $sizeStr);
        //      get image from product_image table
        $productsImages = Product::find($products->id);
        $images = $productsImages->images;

        return view('admin.editProduct', compact('products', 'sizes', 'images'));
    }

    public function update(AdminProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);

//        check active product or not
        $value = $request->input('active');
        if (is_null($value)) {
            $active = 0;
        } else {
            $active = 1;
        }

        $product->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'description' => $request->input('description'),
            'color' => $request->input('color'),
            'size' => $request->input('size'),
            'active' => $active,
        ]);

        return back();

    }
}
