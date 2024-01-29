<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
          $data = $request->validated();
          // dd($data);
          $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
          
          $tagsIds = $data['tags'];
          $colorsIds = $data['colors'];
          // $groupsIds = $data['groups'];
          unset( $data['tags'], $data['colors'], $data['groups']);
          $product = Product::firstOrCreate([
            'title' => $data['title'],
          ], $data);
          if (isset($tagsIds)) {
            foreach($tagsIds as $tagsId){
              ProductTag::firstOrCreate([
                  'product_id' => $product->id,
                  'tag_id' => $tagsId,
              ]);
            }
          }
          foreach($colorsIds as $colorsId){
            ColorProduct::firstOrCreate([
                'product_id' => $product->id,
                'color_id' => $colorsId,
            ]);
          }
          // foreach($groupsIds as $groupsId){
          //   ColorProduct::firstOrCreate([
          //       'product_id' => $product->id,
          //       'color_id' => $colorsId,
          //   ]);
          // }
          
          //Product::firstOrCreate($data);

          return redirect()->route('product.index');
    }
}
