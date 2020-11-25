<?php

namespace Modules\ConfigModule\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\CommonModule\Helper\ApiResponseHelper;
use Modules\ConfigModule\Repository\ConfigRepository;
use Modules\ConfigModule\Transformers\ConfigResource;
use Modules\ConfigModule\Entities\Slider;
use Modules\ConfigModule\Entities\Text;
use Modules\ConfigModule\Transformers\SliderResource;
use Modules\ConfigModule\Transformers\TextResource;
use Modules\ConfigModule\Entities\Review;
use Illuminate\Support\Facades\Validator;

class ConfigApiController extends Controller
{
    use ApiResponseHelper;
    public function __construct(ConfigRepository $configRepository)
    {
        $this->configRepository = $configRepository;
    }

    public function getAbout()
    {
        try {
            $about = $this->configRepository->getConfigWhereKey('about');
            $about = ConfigResource::make($about);
            return $this->setCode(200)->setData($about)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }


    public function contact()
    {
        try {
            $about = $this->configRepository->getConfigsByCategory(2);
            $about = ConfigResource::collection($about);
            return $this->setCode(200)->setData($about)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }


    public function slider($type)
    {
        try {
            $slider = Slider::where('type',$type)->get();
            $slider = SliderResource::collection($slider);
            return $this->setCode(200)->setData($slider)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }

    public function maintext()
    {
        try {
            $maintext = Text::first();
            $maintext = TextResource::make($maintext);
            return $this->setCode(200)->setData($maintext)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }


    public function reviewApp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'comment' => 'required',
            'review'=>'required|numeric'
        ]);

        if($validator->fails()){
            return $this->setCode(400)->setError($validator->errors()->first())->send();

        }

        $data=$request->only('name','comment','review');
        Review::create($data);
        return $this->setCode(200)->setSuccess(__('adminmodule::admin.success'))->send();
    }


    public function allReviews()
    {
        try {
            $reviews = Review::select('id','name','comment','review')->where('active',1)->get();
            return $this->setCode(200)->setData($reviews)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }

    }

    public function getPolicy($key)
    {
        try {
            $about = $this->configRepository->getConfigWhereKey($key);
            $about = ConfigResource::make($about);
            return $this->setCode(200)->setData($about)->send();
        }catch (\Exception $e){
            return $this->setCode(400)->setError(__('commonmodule::common.technical_error'));
        }
    }

}
