<?php

namespace App\Http\Requests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Schema;

class SanPhamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ma_sp' => 'required|max:10|unique:san_phams,ma_sp,' . $this->route('id'),
            'ten_san_pham' => 'required|max:255',
            'hinh_anh' => 'image|mimes:jpg,jpeg,png',
            'so_luong' => 'integer|min:1',
            'gia' => 'required|numeric|min:0',
            'gia_khuyen_mai' => 'numeric|min:0|lt:gia',
            'mo_ta_ngan' => 'string',
            'ngay_nhap' => 'required|date',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ma_sp.required' => 'Mã sản phẩm là bắt buộc.',
            'ma_sp.max' => 'Mã sản phẩm không được vượt quá 10 ký tự.',
            'ma_sp.unique' => 'Mã sản phẩm đã tồn tại.',

            'ten_san_pham.required' => 'Tên sản phẩm là bắt buộc.',
            'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',

            'hinh_anh.image' => 'Hình ảnh phải là một tập tin hình ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpg, jpeg, hoặc png.',

            'so_luong.integer' => 'Số lượng phải là một số nguyên.',
            'so_luong.min' => 'Số lượng phải ít nhất là 1.',

            'gia.required' => 'Giá sản phẩm là bắt buộc.',
            'gia.numeric' => 'Giá sản phẩm phải là một số.',
            'gia.min' => 'Giá sản phẩm phải là một số dương.',

            'gia_khuyen_mai.numeric' => 'Giá khuyến mãi phải là một số.',
            'gia_khuyen_mai.min' => 'Giá khuyến mãi phải là một số dương.',
            'gia_khuyen_mai.lt' => 'Giá khuyến mãi phải nhỏ hơn giá sản phẩm.',

            'mo_ta_ngan.string' => 'Mô tả ngắn phải là một chuỗi ký tự.',

            'ngay_nhap.required' => 'Ngày nhập là bắt buộc.',
            'ngay_nhap.date' => 'Ngày nhập phải là một ngày hợp lệ.',

            'danh_muc_id.required' => 'Danh mục là bắt buộc.',
        ];
    }

}
