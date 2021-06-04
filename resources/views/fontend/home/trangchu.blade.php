<section id="all_services" class="feedback-reflection bg-color-light" xmlns="">
    <br>
    <div class="container">
        <div class="row ">
            <div class="col-md-1"></div>
            <div class="col-sm-5 col-md-3 ">
                <div class="services">
                    {{--<div class="search item">--}}
                        {{--<form action="/tim-kiem" method="post">--}}
                            {{--<div class="form-group margin-0">--}}
                                {{--<input type="text" name="keyword" value="" placeholder="Mã số tra cứu">--}}
                                {{--<button type="submit"><i class="fa fa-search"></i></button>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    {{--</div>--}}
                    <div class="services__item item ">
                        <a href="{{ route('nop_ho_so') }}" class="display-flex-center">
                            <div class="item__img display-flex-center justify-content-center">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <div class="item__content text-uppercase font-size-13 font-weight-bold color-light">
                                Nộp hồ sơ trực tuyến
                            </div>
                        </a>
                    </div>
                    <br>
                    <div class="services__item item">
                        <a href="{{ route('dich_vu') }}" class="display-flex-center">
                            <div class="item__img display-flex-center justify-content-center">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="item__content text-uppercase font-size-13 font-weight-bold color-light ">
                                Thủ tục hành chính
                            </div>
                        </a>
                    </div>
                    <br>
                    <div class="services__item item display-flex-center">
                        <a href="{{ route('huong_dan') }}" class="display-flex-center">
                            <div class="item__img display-flex-center justify-content-center">
                                <i class="far fa-star"></i>
                            </div>
                            <div class="item__content text-uppercase font-size-13 font-weight-bold color-light">
                                Hướng dẫn
                            </div>
                        </a>
                    </div>
                    <br>
                    <div class="services__item item display-flex-center">
                        <a href="#" class="display-flex-center">
                            <div class="item__img display-flex-center justify-content-center">
                                <i class="far fa-comment-dots"></i>
                            </div>
                            <div class="item__content text-uppercase font-size-13 font-weight-bold color-light">
                                Đánh giá sự hài lòng
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-sm-7 col-md-5 box-shadow-main">
                <h2 class="sidebar__title text-center font-size-16" style="background-color: #259b40; color: white;">Tra cứu trực tuyến</h2>
                <form action="{{ route('tra_cuu') }}" method="get" class="form-group">

                    <div class=" mt-3 mb-3 " style="padding: 1em">
                        <div style="padding: 12px 0; " class="font-weight-bold font-size-14"> Mã hồ sơ:</div>
                        <div class="form-group">
                            <input type="text" name="keyword"   placeholder="Nhập mã hồ sơ" autocomplete="off" class="form-control secondary-color font-size-14" value="">
                        </div>
                    </div>
                    <div class="form-group text-center ">
                        <button  class="btn btn-main font-size-16 font-weight-bold">
                            <i class="fas fa-search"></i> Tra cứu
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section id="all_services" class="feedback-reflection " xmlns="">
    <br>
    <div class="container">
        <div class="col-sm-5 col-md-4 box-shadow-main">
            <div class="box-sidebar" style="margin-bottom:0px;">
                <div class="head">
                    <div class="sidebar__title text-center font-size-12" style="background-color: blue; color: white ">Thống kê hồ sơ theo năm
                        <select style="color: black" id="tier_1_nam_tk" onchange="changeyear('ajaxTier1All', $(this).val())">
                            <option style="color: black" value="2019">2019</option>
                            <option style="color: black" value="2020">2020</option>
                            <option style="color: black" selected="" value="2021">2021</option>
                        </select>
                    </div>
                </div>
                <div class="body">
                    {{--<div id="CapSo" style="height: 207px;" data-highcharts-chart="0"><div id="highcharts-j22lpvn-0" class="highcharts-container " style="position: relative; overflow: hidden; width: 368px; height: 207px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-family: sans-serif;"><svg version="1.1" class="highcharts-root" style="font-family:sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="368" height="207" viewBox="0 0 368 207"><desc>Created with Highcharts 5.0.10 custom build</desc><defs><clipPath id="highcharts-j22lpvn-1"><rect x="0" y="0" width="348" height="146" fill="none"></rect></clipPath></defs><rect fill="none" class="highcharts-background" x="0" y="0" width="368" height="207" rx="0" ry="0"></rect><rect fill="none" class="highcharts-plot-background" x="10" y="46" width="348" height="146"></rect><g class="highcharts-pane-group"></g><rect fill="none" class="highcharts-plot-border" x="10" y="46" width="348" height="146"></rect><g class="highcharts-series-group"><g class="highcharts-series highcharts-series-0 highcharts-pie-series highcharts-color-undefined highcharts-tracker " transform="translate(10,46) scale(1 1)" style="cursor:pointer;"><path fill="#058dc7" d="M 173.9875759345746 12.000001265224618 A 61 61 0 1 1 121.97711716815657 41.14690498767364 L 121.97711716815657 41.14690498767364 A 61 61 0 1 0 173.9875759345746 12.000001265224618 Z" class="highcharts-halo highcharts-color-0" fill-opacity="0.25"></path><path fill="#058dc7" d="M 173.9875759345746 12.000001265224618 A 61 61 0 1 1 121.97711716815657 41.14690498767364 L 174 73 A 0 0 0 1 0 174 73 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" stroke-linejoin="round" class="highcharts-point highcharts-color-0 "></path><path fill="red" d="M 122.0089962692993 41.09489804005847 A 61 61 0 0 1 173.91527222377763 12.000058842619062 L 174 73 A 0 0 0 0 0 174 73 Z" transform="translate(0,0)" stroke="#ffffff" stroke-width="1" stroke-linejoin="round" class="highcharts-point highcharts-color-1"></path></g><g class="highcharts-markers highcharts-series-0 highcharts-pie-series highcharts-color-undefined " transform="translate(10,46) scale(1 1)"></g></g><text x="184" text-anchor="middle" class="highcharts-title" style="color:#333333;font-size:18px;fill:#333333;" y="24"><tspan>Tổng số hồ sơ tiếp nhận 166380</tspan></text><g class="highcharts-data-labels highcharts-series-0 highcharts-pie-series highcharts-color-undefined highcharts-tracker " transform="translate(10,46) scale(1 1)" opacity="1" style="cursor:pointer;"><path fill="none" class="highcharts-data-label-connector highcharts-color-0" stroke="#058dc7" stroke-width="1" d="M 213.66485115075375 134.96247327775166 C 208.66485115075375 134.96247327775166 205.73542710984495 129.72620793033602 204.75895242954203 127.98078614786414 L 203.78247774923912 126.23536436539226"></path><path fill="none" class="highcharts-data-label-connector highcharts-color-1" stroke="red" stroke-width="1" d="M 134.3351488492462 11.037526722248373 C 139.3351488492462 11.037526722248373 142.26457289015502 16.273792069664005 143.24104757045794 18.01921385213588 L 144.21752225076085 19.764635634607757"></path><g class="highcharts-label highcharts-data-label highcharts-data-label-color-0 " style="cursor:pointer;" transform="translate(219,125)"><text x="5" style="font-size:11px;font-weight:bold;color:black;fill:black;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round" style="">83,76%</tspan><tspan x="5" y="16">83,76%</tspan></text></g><g class="highcharts-label highcharts-data-label highcharts-data-label-color-1 " style="cursor:pointer;" transform="translate(82,1)"><text x="5" style="font-size:11px;font-weight:bold;color:black;fill:black;" y="16"><tspan x="5" y="16" class="highcharts-text-outline" fill="#FFFFFF" stroke="#FFFFFF" stroke-width="2px" stroke-linejoin="round">16,24%</tspan><tspan x="5" y="16">16,24%</tspan></text></g></g><g class="highcharts-legend"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="8" height="8" visibility="hidden"></rect><g><g></g></g></g><g class="highcharts-label highcharts-tooltip highcharts-color-0" style="cursor:default;pointer-events:none;white-space:nowrap;font:sans-serif;padding:8px;" transform="translate(58,-9999)" opacity="0" visibility="visible"><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 187.5 0.5 C 190.5 0.5 190.5 0.5 190.5 3.5 L 190.5 43.5 C 190.5 46.5 190.5 46.5 187.5 46.5 L 3.5 46.5 C 0.5 46.5 0.5 46.5 0.5 43.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="#000000" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 187.5 0.5 C 190.5 0.5 190.5 0.5 190.5 3.5 L 190.5 43.5 C 190.5 46.5 190.5 46.5 187.5 46.5 L 3.5 46.5 C 0.5 46.5 0.5 46.5 0.5 43.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="#000000" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 187.5 0.5 C 190.5 0.5 190.5 0.5 190.5 3.5 L 190.5 43.5 C 190.5 46.5 190.5 46.5 187.5 46.5 L 3.5 46.5 C 0.5 46.5 0.5 46.5 0.5 43.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" isShadow="true" stroke="#000000" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(247,247,247,0.85)" class="highcharts-label-box highcharts-tooltip-box" d="M 3.5 0.5 L 187.5 0.5 C 190.5 0.5 190.5 0.5 190.5 3.5 L 190.5 43.5 C 190.5 46.5 190.5 46.5 187.5 46.5 L 3.5 46.5 C 0.5 46.5 0.5 46.5 0.5 43.5 L 0.5 3.5 C 0.5 0.5 0.5 0.5 3.5 0.5" stroke="#058dc7" stroke-width="1"></path><text x="8" style="font-size:12px;color:#333333;fill:#333333;" y="20"><tspan style="font-weight:bold">Hồ sơ đã trả kết quả đúng hạn</tspan><tspan style="font-weight:bold" x="8" dy="15">Tỷ lệ:</tspan><tspan dx="0"> 83,76%</tspan></text></g></svg></div></div>--}}
                    {{--<div class="detail-pie" style="padding-bottom: 5px;display: block;font-size: 12px;text-align: center;">--}}
                        {{--<p>Hồ sơ đã hoàn thành: <strong>144155</strong> hồ sơ </p>--}}
                        {{--<p>Hồ sơ đã trả kết quả đúng hạn: <strong>120750</strong> hồ sơ </p>--}}
                        {{--<p>Hồ sơ đã có kết quả quá hạn: <strong>23405</strong> hồ sơ</p>--}}
                    {{--</div>--}}
                    {{--<div class="date-update" style="padding-bottom: 5px;display: block;font-size: 10px;text-align: center;">--}}
                        {{--<p>thời gian cập nhật số liệu: 02/06/2021 12:00:38</p>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-sm-7 col-md-7 box-shadow-main">
            <div class="head" title="12 tháng gần nhất">
                <h2 class="sidebar__title text-center font-size-13" style="background-color: blue; color: white;">Tình hình xử lý hồ sơ theo tháng</h2>
                <br class="br-hidden" style="display: none">
            </div>
            <div class="body">
            </div>
        </div>
    </div>
</section>