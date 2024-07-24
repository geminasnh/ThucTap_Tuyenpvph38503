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
            'ma_sp' => 'required|max:10|unique:san_phams,ma_sp,' . $this->route('sanpham'),
            'ten_san_pham' => 'required|max:255',
            'so_luong' => 'required|numeric|min:1',
            'gia' => 'required|numeric|min:1|max:99999999',
            'ngay_nhap' => 'required|date',
            'danh_muc_id' => 'required'
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
            'ma_sp.required' => 'Vui lòng nhập mã sản phẩm.',
            'ma_sp.max' => 'Mã sản phẩm không được quá 10 ký tự.',
            'ma_sp.unique' => 'Mã sản phẩm đã tồn tại.',
            'ten_san_pham.required' => 'Vui lòng nhập tên sản phẩm.',
            'ten_san_pham.max' => 'Tên sản phẩm không được quá 255 ký tự.',
            'so_luong.required' => 'Vui lòng nhập số lượng.',
            'so_luong.numeric' => 'Số lượng phải là một số.',
            'so_luong.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
            'gia.required' => 'Vui lòng nhập giá.',
            'gia.numeric' => 'Giá phải là một số.',
            'gia.min' => 'Giá phải lớn hơn hoặc bằng 1.',
            'gia.max' => 'Giá không được quá 99999999.',
            'ngay_nhap.required' => 'Vui lòng nhập ngày nhập.',
            'ngay_nhap.date' => 'Ngày nhập không đúng định dạng.',
            'danh_muc_id.required' => 'Vui lòng chọn danh mục sản phẩm.'
        ];
    }

}
