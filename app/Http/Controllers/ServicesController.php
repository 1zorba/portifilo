<?php

namespace App\Http\Controllers;

use App\Http\Requests\services;
use App\Http\Requests\Services_Update;
use App\Models\services as modelServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    public function create_service(services $request) // استخدم Request العادي للتجربة أولاً
    {
        $user_id = Auth::user()->id;

        $service_title = $request->input('service_title');
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('image_services', 'public');
        }

        $service = modelServices::create([
            'service_title' => $service_title,
            'image'         => $imagePath, // سيتم حفظ المسار مثل: image_services/abc.jpg
            'user_id'       => $user_id
        ]);

        return response()->json(["message" => 'success created', "data" => $service], 201);
    }

    // أضف المتغير $id هنا
    public function update_services(Services_Update $request, $id)
    {
        $user_id = Auth::id();

        // ابحث عن الخدمة التي تحمل هذا الـ ID وتخص هذا المستخدم تحديداً
        $user_service = modelServices::where('id', $id)
            ->where('user_id', $user_id)
            ->first();

        if (!$user_service) {
            return response()->json(["message" => "الخدمة غير موجودة"], 404);
        }

        // جلب البيانات المفلترة من الـ Request
        $data = $request->validated();

        // معالجة رفع الصورة الجديدة إذا وُجدت
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image_services', 'public');
            $data['image'] = $path;
        }

        $user_service->update($data);

        return response()->json([
            "message" => "success updated",
            "data" => $user_service
        ]);
    }

    public function getAllServices()
    {
        $user_id = Auth::user()->id;
        $services = modelServices::where('user_id', $user_id)->get();
        return response()->json([$services]);
    }
    public function DeleteService($id)
    {
        $user_id = Auth::id();

        // البحث عن الخدمة والتأكد أنها تخص المستخدم
        $service = modelServices::where('user_id', $user_id)->where('id', $id)->first();

        if ($service) {
            // حذف الصورة من التخزين إذا كانت موجودة
            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            // حذف السجل من قاعدة البيانات
            $service->delete();

            return response()->json(['message' => 'تم الحذف بنجاح'], 200);
        }

        return response()->json(['message' => 'الخدمة غير موجودة'], 404);
    }
}
