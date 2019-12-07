<?php

namespace App\Http\Controllers\Frontend;
use App\Model\Front\BannerModel;
use App\Model\Front\ShopCategoryModel;
use App\Model\Front\ShopProductModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class ShopCategoryController extends Controller
{
    //

    public function detail($id) {

        $data = array();
        $data['banner_main'] = $banner_main =   BannerModel::getBannerByLocation(1);

        $homepage_category = ShopCategoryModel::where('homepage', 1)->orderBy('id', 'asc')->take(4)->get();

        foreach ($homepage_category as $key => $cat) {
            $homepage_category[$key]['products'] = ShopProductModel::where(array('cat_id'=> $cat->id, 'homepage' => 1))->orderBy('id', 'asc')->take(8)->get();
        }

        $data['homepage_category'] = $homepage_category;

        $data['category'] = ShopCategoryModel::find($id);
        $data['products'] = ShopCategoryModel::getProducts($id);


        return view('frontend.shop.category.detail', $data);
    }

}
