<?php

namespace App\Http\Controllers\Backend;

Use App\Models\HeaderSection;
use App\Http\Controllers\Controller;
use App\Http\Requests\HeaderSection\LogoTitleRequest;
use App\Http\Requests\HeaderSection\ImageRequest;
use Illuminate\Http\Request;
use NabilAnam\SimpleUpload\SimpleUpload;

class HeaderController extends Controller
{
    public function logoTitele()
    {
        $data = HeaderSection::select('logo', 'title')->first();
        return view('backend.headerSection.create', ['data' => $data]);
    }

    public function image()
    {
        $data = HeaderSection::first();
        return view('backend.headerSection.image', ['data' => $data]);
    }
    public function logoTiteleStore(LogoTitleRequest $request)
    {
        $header = HeaderSection::updateOrCreate([
            'id' => 1
        ],[
            'title'         => $request->title,
        ]);

        if ($request->has('logo')) {
            $header->update(['logo' => $this->imageUpload($request->file('logo'),'110' ,'125', $header->logo)]);
        }

        return redirect()->route('backend.headerSection.title_logo');

    }
    public function imageStore(Request $request)
    {

        $header = HeaderSection::first();
        try {
            if ($request->person_gif) {
                $header->update(['person_gif' => $this->imageUpload($request->file('person_gif'),'350' ,'650', $header->person_gif)]);
            }
            if ($request->coin_gif) {
                $header->update(['coin_gif' => $this->imageUpload($request->file('coin_gif'), '400' ,'400', $header->coin_gif)]);
            }

            if ($request->background_image) {
                $header->update(['background_image' => $this->imageUpload($request->file('background_image'),'6000' ,'3000', $header->background_image)]);
            }
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }

        return redirect()->route('backend.headerSection.image');

    }

    public function imageUpload($requestImage,$width,$height, $image)
    {

        $image = (new SimpleUpload)
                ->file($requestImage)
                ->dirName('image')
                ->deleteIfExists($image)
                // ->resizeImage($width, $height)
                ->save();
        return $image;
    }
}
