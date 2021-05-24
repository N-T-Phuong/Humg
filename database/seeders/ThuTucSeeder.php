<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThuTucSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            DB::table('thutuc')->insert([
                [
                    'maTT' => 'TT_1',
                    'tenTT' => 'Đơn xin ghép lớp',
                    'danhmuc_id' => 1,
                    'mota' => 'Đơn xin ghép lớp',
                    'tg_giai_quyet' => '5 ngày',
                ],
                [
                    'maTT' => 'TT_2',
                    'tenTT' => 'Đơn xin mở lớp',
                    'danhmuc_id' => 1,
                    'mota' => 'Đơn xin mở lớp',
                    'tg_giai_quyet' => '5 ngày',
                ], [
                    'maTT' => 'TT_3',
                    'tenTT' => 'Đi thực tập sản xuất , thực tập tốt nghiệp',
                    'danhmuc_id' => 1,
                    'mota' => 'Đơn đi thực tập sản xuất , thực tập tốt nghiệp',
                    'tg_giai_quyet' => '7 ngày',
                ], [
                    'maTT' => 'TT_4',
                    'tenTT' => 'Rút bớt học phần',
                    'danhmuc_id' => 1,
                    'mota' => 'Đơn xin rút bớt học phần',
                    'tg_giai_quyet' => '3 ngày',
                ], [
                    'maTT' => 'TT_5',
                    'tenTT' => 'Xác nhận học phần tương đương , học phần thay thế	Phòng đào tạo ',
                    'danhmuc_id' => 1,
                    'mota' => 'Đơn xin xác nhận học phần tương đương , học phần thay thế	Phòng đào tạo ',
                    'tg_giai_quyet' => '5 ngày',
                ], [
                    'maTT' => 'TT_6',
                    'tenTT' => 'Xác nhận học phần tự chọn không tham gia tính điểm',
                    'danhmuc_id' => 1,
                    'mota' => 'Đơn xin xác nhận học phần tự chọn không tham gia tính điểm',
                    'tg_giai_quyet' => '3 ngày',
                ], [
                    'maTT' => 'TT_7',
                    'tenTT' => 'Đổi địa điểm thực tập sản xuất, thực tập tốt nghiệp',
                    'danhmuc_id' => 1,
                    'mota' => '- Đơn xin đổi địa điểm thực tập sản xuất, thực tập tốt nghiệp;
                           - Công lệnh, quyết định đi thực tập đã cấp ',
                    'tg_giai_quyet' => '7 ngày',
                ], [
                    'maTT' => 'TT_8',
                    'tenTT' => 'Làm đồ án tốt nghiệp',
                    'danhmuc_id' => 1,
                    'mota' => '- Đơn xin Làm đồ án tốt nghiệp
                           - Công lệnh, quyết định đi thực tập tốt nghiệp',
                    'tg_giai_quyet' => '5 ngày',
                ], [
                    'maTT' => 'TT_9',
                    'tenTT' => 'Bảo vệ đồ án tốt nghiệp',
                    'danhmuc_id' => 1,
                    'mota' => '- Đơn xin bảo vệ đồ án tốt nghiệp. 
                            - Quyết định được làm đồ án tốt nghiệp. 
                            - Giấy thanh toán ra trường. 
                            Quy trình giải quyết 
                            - Nộp hồ sơ tại Bộ phận một cửa, nhận lại giấy hẹn. 
                            - Bộ phận một cửa kiểm tra và chuyển hồ sơ cho Phòng Đào tạo Đại học. 
                            - Phòng Đào tạo Đại học kiểm tra điều kiện bảo vệ tốt nghiệp, xác nhận số tháng sinh viên phải nộp lệ phí bảo vệ chậm (nếu có) và chuyển đơn cho Phòng Kế hoạch Tài chính (thời gian xử lý tối đa 1 ngày làm việc). 
                            - Phòng Kế hoạch tài chính kiểm tra, xác nhận số tiền lệ phí sinh viên phải nộp và thông báo cho sinh viên để hoàn thành nghĩa vụ tài chính (nếu có) (thời gian xử lý tối đa 1 ngày làm việc). Ngay sau khi sinh viên hoàn thành nghĩa vụ tài chính, Phòng Kế hoạch tài chính xác nhận và trả đơn 
                            - Phòng Đào tạo Đại học ra Quyết định và trả kết quả cho Bộ phận một cửa (thời gian xử lý tối đa 02 ngày làm việc)
                            - Bộ phận một cửa trả kết quả cho sinh viên.',
                    'tg_giai_quyet' => '5 ngày',
                ], [
                    'maTT' => 'TT_10',
                    'tenTT' => 'Cấp lại bảng điểm',
                    'danhmuc_id' => 1,
                    'mota' => ' Đơn xin cấp lại bảng điểm ',
                    'tg_giai_quyet' => '3 ngày',
                ], [
                    'maTT' => 'TT_11',
                    'tenTT' => 'Xin hoãn thi kết thúc học phần',
                    'danhmuc_id' => 1,
                    'mota' => '- Đơn xin hoãn thi kết thúc học phần); 
                            - Giấy tờ, minh chứng, lý do để hoãn thi kèm theo (VD : Hồ sơ bệnh án...) 
                            Quy trình giải quyết - Nộp hồ sơ tại Bộ phận một cửa, nhận lại giấy hẹn. 
                            - Bộ phận một cửa kiểm tra và chuyển hồ sơ cho Phòng Đào tạo Đại học hoặc Phòng ĐBCLGD tùy theo môn xin hoãn thi là khảo thí hay không. 
                            - Phòng Đào tạo Đại học hoặc Phòng ĐBCLGD xử lý và trả kết quả cho Bộ phận một cửa. 
                            - Bộ phận một cửa trả kết quả cho sinh viên.',
                    'tg_giai_quyet' => '3 ngày',
                ], [
                    'maTT' => 'TT_12',
                    'tenTT' => 'Đề nghị cấp lại thẻ sinh viên',
                    'danhmuc_id' => 2,
                    'mota' => '- Đơn đề nghị cấp lại thẻ sinh viên;
                             - 01 ảnh thẻ kích thước 3x4;
                             - Bản sao giấy tờ tùy thân kèm bản chính để đối chiếu (Chứng minh thư, bằng lái xe…);
                             - Nộp lệ phí 100.000đ (cấp mới); 60.000đ (đổi, gia hạn)
                             - Thẻ sinh viên (để đối chiếu).
                             THỜI GIAN GIẢI QUYẾT
                             - 7 ngày kể từ khi nhận hồ sơ.
                             - Nộp hồ sơ tại Bộ phận một cửa, nhận lại giấy hẹn.
                             - Bộ phận một cửa kiểm tra và chuyển hồ sơ cho Phòng Công tác chính trị - Sinh viên.
                             - Phòng Công tác chính trị 
                             - Sinh viên xử lý và trả kết quả cho Bộ phận một cửa.
                             - Bộ phận một cửa trả kết quả cho sinh viên.',
                    'tg_giai_quyet' => '7 ngày',
                ],
            ]);
        }
    }
}
