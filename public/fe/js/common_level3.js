//#region init
var validator;
var subValidator = null;
var formStringify = "";
var enumMethod = {
    Post: 'POST',
    Get: 'GET'
};
//#endregion

//#region Data Config
$.dvc3_Constants = {
    Other: "0" //Khác
};

//Mặc định Loại giấy tờ.
$.dvc3_Loaigiayto = function () {
    return {
        CMT: "1",
        HC: "3",
        TheCC: "4",
        SoHK: "2",
        SoCMCA: "6",
        SoCMQD: "7",
        GiayKS: "100",
        SoTamTru: "30",
        Khac: "0",
        TheThuongTru: "75BA7C5C7F836F70E054000C29748FC6",
        MasoDDCN:"7C6F6BDB74B1156EE054000C29748FC6" /*Mã số định danh cá nhân */
    }
};

// Mặc định nơi cấp giáy tờ: CMT: CA Hà Nội, Thẻ Căn Cước: Cục....:
$.dvc3_Noicapgiayto = function () {
    return {
        CMT: "1",
        TheCC: "64",
        HC: "65",
        SoCMCA: "1",
        MasoDDCN:"64"
    }
};

$.dvc3_FormatType = {
    Uppercase: "uppercase",
    Capitalize: "capitalize",
    Lowercase: "lowercase"

};
//#endregion

//#region rule validate
(function ($) {
    _isEmptyDate = function (data) {
        return !data || data.trim() == "__/__/____";
    }
    $.ValidateType = {

        // kiểm tra Số định danh -- dungtd  (03/11/2018)
        Identity: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Số định danh chỉ được dài 12 kí tự";
            }
            return {
                type: "identity",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    var ret = $.dvc3_isValidIdentity(data);
                    if (typeof ret == "object" && ret.Key != "") rule.Message = ret.Value;
                    return ret == true
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        // validate month,year -- dungtd (20/10/2018)
        Monthyear: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Định dạng không phải là tháng năm";
            }
            return {
                type: "year",
                Reversed: false,
                ValidateFunc: function (data, rule) {
                    var ret = $.dvc3_monthyear(data);
                    if (typeof ret == "object" && ret.Key != "") rule.Message = ret.Value;
                    return ret == true
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        // validate year -- dungtd (20/10/2018)
        Year: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Năm chỉ được dài 4 kí tự";
            }
            return {
                type: "year",
                Reversed: false,
                ValidateFunc: function (data, rule) {
                    var ret = $.dvc3_year(data);
                    if (typeof ret == "object" && ret.Key != "") rule.Message = ret.Value;
                    return ret == true
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

        /*Kiểm tra định dạng điện thoại*/
        Phone: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Điện thoại không đúng định dạng";
            }
            return {
                type: "phone",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    var ret = $.dvc3_isValidPhone(data);
                    if (typeof ret == "object" && ret.Key != "") rule.Message = ret.Value;
                    return ret == true
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Kiểm tra định dạng điện thoại*/
        Number: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Chỉ chấp nhận chữ số";
            }
            return {
                type: "number",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: null,
                ValidateRegex: /^[0-9]+$/, //Regex de validate du lieu
                Message: mess
            }
        },
         //Valide So, Quyen so
         NumberAndBook: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Dữ liệu không hợp lệ";
            }
            return {
                type: "numberandbook",
                Reversed: false,
                ValidateFunc: function (data, rule) {
                    var ret = $.dvc3_NumberAndBook(data);
                    if (typeof ret == "object" && ret.Key != "") rule.Message = ret.Value;
                    return ret == true
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Kiểm tra định dạng fax*/
        Fax: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Fax không đúng định dạng";
            }
            return {
                type: "fax",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    var ret = $.dvc3_isValidFax(data);
                    if (typeof ret == "object" && ret.Key != "") rule.Message = ret.Value;
                    return ret == true
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Kiểm tra định dạng email*/
        Email: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Vui lòng nhập email đúng định dạng như (name@gmail.com, name@yahoo.com, name@abc.vn ...)";
            }
            return {
                type: "email",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: $.dvc3_isValidEmail, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Kiểm tra định dữ liệu không được chưa định dạng HTML*/
        NoHtml: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Không chấp nhận mã HTML";
            }
            return {
                type: "nohtml",
                Reversed: true, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
					//chữa cháy: Cấm luôn dấu  ". Lý do: Khi đục lỗ biểu mẫu gặp dấu này là chết. Trong khi đa số input dùng rule này.
					if(/\"/.test(data)){
						rule.Message = 'Không chấp nhận ký tự " ';
						return true;
					}
                    return $.dvc3_isValidHtml(data);
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Giấy tờ tùy thân */
        Identification: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Số giấy tờ không hợp lệ";
            }
            return {
                type: "identification",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                DocType: null,
                ValidateFunc: function (data, rule) {
                    var ret = $.dvc3_isValidDocumentType(rule.DocType, data);
                    if (typeof ret == "object") {
                        rule.Message = ret.Value
                    }
                    return ret == true;
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        SingleIdentification: function (doctype, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Số giấy tờ không hợp lệ";
            }
            return {
                type: "singleIdentification",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                DocType: doctype,
                ValidateFunc: function (data, rule) {
                    var ret = $.dvc3_isValidDocumentType(rule.DocType, data);
                    if (typeof ret == "object") {
                        rule.Message = ret.Value
                    }
                    return ret == true;
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Validate theo regex tùy biến của dev*/
        CustomRegex: function (reversed, regex, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Dữ liệu không hợp lệ";
            }
            return {
                type: "customRegex",
                Reversed: reversed, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: null, //Function de validate du lieu
                ValidateRegex: regex, //Regex de validate du lieu
                Message: mess
            }
        },


        /*Validate theo function tùy biến của dev*/
        CustomFunc: function (func, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Dữ liệu không hợp lệ";
            }
            return {
                type: "customFunc",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: func, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }

        },

        //#region  Datetime
        /*Ngay data phải lớn hơn ngày hiện tại*/
        DateGreaterThanNow: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày được chọn phải lớn hơn ngày hiện tại";
            }
            return {
                type: "dategreaterthannow",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return $.dvc3_isValidBetweenDate(data, $.dvc3_isValidDateNow()) >= 0
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Ngay data phải lớn hơn ngày hiện tại tối thiểu/tối đa x ngày*/
        DateGreaterThanNowEx: function (numDay, isMin, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày được chọn phải lớn hơn ngày hiện tại" + isMin ? " tối  thiểu" : "tối đa" + numDay + " ngày";
            }
            return {
                type: "dategreaterthannow",
                isMin: isMin,
                numday: numDay,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return rule.isMin ? $.dvc3_isValidBetweenDate(data, $.dvc3_isValidDateNow()) >= rule.numday : $.dvc3_isValidBetweenDate(data, $.dvc3_isValidDateNow()) <= rule.numday
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Ngay data phải lơn hơn 1900*/
        DateGreaterThan1900: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày được chọn phải lớn hơn ngày 01/01/1900";
            }
            return {
                type: "dategreaterthan1900",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return $.dvc3_isValidBetweenDate(data, "01/01/1900") > 0
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

        /*Ngay data phải lơn hơn 1900*/
        DateGreaterThan1800: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày được chọn phải lớn hơn ngày 01/01/1800";
            }
            return {
                type: "dategreaterthan1800",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return $.dvc3_isValidBetweenDate(data, "01/01/1800") > 0
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },


        /*Ngay data phải nhỏ hơn ngày hiện tại*/
        DateLessThanNow: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày được chọn phải nhỏ hơn ngày hiện tại";
            }
            return {
                type: "datelessthannow",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return $.dvc3_isValidBetweenDate(data, $.dvc3_isValidDateNow()) < 0
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Ngay data phải nhỏ hơn ngày hiện tại tối thiểu/tối đa x ngày*/
        DateLessThanNowEx: function (numDay, isMin, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày được chọn phải nhỏ hơn ngày hiện tại" + isMin ? " tối  thiểu" : "tối đa" + numDay + " ngày";
            }
            return {
                type: "datelessthannow",
                numday: numDay,
                isMin: isMin,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return rule.isMin ? $.dvc3_isValidBetweenDate($.dvc3_isValidDateNow(), data) >= rule.numday : $.dvc3_isValidBetweenDate($.dvc3_isValidDateNow(), data) <= rule.numday
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Ngay data không được lớn hơn ngày hiện tại quá numDay (ngày)*/
        DayNotOverThanNow: function (numDay, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày không được lớn hơn ngày hiện tại quá " + numDay + " (ngày)";
            }
            return {
                type: "daynotoverthannow",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return $.dvc3_isValidBetweenDate(data, $.dvc3_isValidDateNow()) <= numDay
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
          /*Ngay data không được lớn hơn ngày hiện tại quá numDay (ngày) dùng cho kiểu datetime*/ 
          DayTimeNotOverThanNow: function (numDay, message) {
              
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày không được lớn hơn ngày hiện tại quá " + numDay + " (ngày)";
            }
            return {
                type: "daynotoverthannow",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return $.dvc3_isValidBetweenDate(data, $.dvc3_isValidDateTimeNow()) <= numDay
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Ngay data không được nho ngày hiện tại quá numDay (ngày)*/
        DayNotLessThanNow: function (numDay, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày không được nhỏ hơn ngày hiện tại quá " + numDay + " (ngày)";
            }
            return {
                type: "daynotlessthannow",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return $.dvc3_isValidBetweenDate($.dvc3_isValidDateNow(), data) <= numDay
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

        /*Ngày data phải nhỏ hơn ngày truyền vào ít nhất là numDay (ngày);*/
        DateLessThan: function (comparedDate, numDay, isMin, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày phải nhỏ hơn hoặc bằng " + comparedDate + isMin ? " tối  thiểu" : "tối đa" + " (ngày)";
            }
            return {
                type: "daylessthan",
                isMin: isMin,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data) || _isEmptyDate(comparedDate)) return true;
                    return rule.isMin ? $.dvc3_isValidBetweenDate(comparedDate, data) >= numDay : $.dvc3_isValidBetweenDate(comparedDate, data) <= numDay
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Ngày data phải nhỏ hơn field truyền  vào ít nhất là numDay (ngày);*/
        DateLessThanField: function (comparedField, numDay, isMin, message, isModal) {
            var mess = message;
            if(isModal && !window.dvc3State)
                throw ("call dvc3_setObjContent first, please!");

            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày phải nhỏ hơn hoặc bằng trường so sánh" + isMin ? " tối  thiểu" : "tối đa" + " (ngày)";
            }

            return {
                type: "dayLessThan",
                isMin: isMin,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule, gridInfo) {
                    var cpValue = gridInfo ? gridInfo.row[comparedField] : (isModal?window.dvc3State.Modal_data[comparedField]: window.dvc3Objcontent[comparedField]);

                    if (_isEmptyDate(data) || _isEmptyDate(cpValue)) return true;
                    return rule.isMin ? $.dvc3_isValidBetweenDate(cpValue, data) >= numDay : $.dvc3_isValidBetweenDate(cpValue, data) <= numDay
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

        /*Ngày data phải lớn hơn ngày truyền vào tối thiểu/tối đa là numDay (ngày);*/
        DateGreaterThan: function (comparedDate, numDay, isMin, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày phải lớn hơn hoặc bằng " + comparedDate + isMin ? " tối  thiểu" : "tối đa" + " (ngày)";
            }
            return {
                type: "daygreaterthan",
                isMin: isMin,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data) || _isEmptyDate(comparedDate)) return true;
                    return rule.isMin ? $.dvc3_isValidBetweenDate(data, comparedDate) >= numDay : $.dvc3_isValidBetweenDate(data, comparedDate) <= numDay
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Ngày data phải lớn hơn field truyền vào tối thiểu/tối đa là numDay (ngày);*/
        DateGreaterThanField: function (comparedField, numDay, isMin, message, isModal) {
            var mess = message;
            if(isModal && !window.dvc3State)
                throw ("call dvc3_setObjContent first, please!");
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày phải lớn hơn hoặc bằng trường so sánh"  + isMin ? " tối  thiểu" : "tối đa" + " (ngày)";
            }
            return {
                type: "daygreaterthan",
                isMin: isMin,
                comparedField: comparedField,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule, gridInfo) {
                    var cpValue = gridInfo ? gridInfo.row[comparedField] : (isModal?window.dvc3State.Modal_data[comparedField]: window.dvc3Objcontent[comparedField]);

                    if (_isEmptyDate(data) || _isEmptyDate(cpValue)) return true;
                    return rule.isMin ? $.dvc3_isValidBetweenDate(data, cpValue) >= numDay : $.dvc3_isValidBetweenDate(data, cpValue) <= numDay
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

        /*Năm data phải nhỏ hơn năm truyền vào tối đa/tối thiểu là numYear (năm);*/
        YearLessThan: function (comparedDate, numYear, isMin, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Năm phải nhỏ hơn hoặc bằng " + comparedDate + isMin ? " tối  thiểu" : "tối đa" + " (năm)";
            }
            return {
                type: "yearLessThan",
                isMin: isMin,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data) || _isEmptyDate(comparedDate)) return true;
                    let date = new Date(data);
                    let year = date.getFullYear() + numYear;
                    date.setFullYear(year);
                    let val = new Intl.DateTimeFormat('en-US').format(date);

                    return rule.isMin ? $.dvc3_isValidBetweenDate(comparedDate,val) >= 0 : ($.dvc3_isValidBetweenDate(comparedDate, data) >0 && $.dvc3_isValidBetweenDate(comparedDate, val) <= 0 )
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Năm data phải nhỏ hơn năm của field truyền vào tối đa/tối thiểu là numYear (năm);*/
        /*isModal=true: Áp dụng cho Modal*/
        YearLessThanField: function (comparedField, numYear, isMin, message, isModal) {
            var mess = message;
            if(isModal && !window.dvc3State)
                throw ("call dvc3_setObjContent first, please!");

            if (mess == null || typeof mess == "undefined") {                
                mess = "Năm phải nhỏ hơn hoặc bằng trường so sánh" + isMin ? " tối  thiểu" : "tối đa" + " (năm)";
            }
            return {
                type: "yearLessThan",
                isMin: isMin,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule, gridInfo) {
                    var comparedDate = gridInfo ? gridInfo.row[comparedField] : (isModal?window.dvc3State.Modal_data[comparedField]: window.dvc3Objcontent[comparedField]);
                    if (_isEmptyDate(data) || _isEmptyDate(comparedDate)) return true;
                    let date = new Date(data);
                    let year = date.getFullYear() + numYear;
                    date.setFullYear(year);
                    let val = new Intl.DateTimeFormat('en-US').format(date);

                    return rule.isMin ? $.dvc3_isValidBetweenDate(comparedDate,val) >= 0 : ($.dvc3_isValidBetweenDate(comparedDate, data) >0 && $.dvc3_isValidBetweenDate(comparedDate, val) <= 0 )
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Năm data phải lớn hơn năm truyền vào tối đa/tối thiểu là numYear (năm);*/
        YearGreaterThan: function (comparedDate, numYear, isMin, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Năm phải lớn hơn hoặc bằng " + comparedDate + isMin ? " tối  thiểu" : "tối đa" + " (năm)";
            }
            return {
                type: "yearGreaterThan",
                isMin: isMin,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data) || _isEmptyDate(comparedDate)) return true;
                    let date = new Date(comparedDate);
                    let year = date.getFullYear() + numYear;
                    date.setFullYear(year);
                    let val = new Intl.DateTimeFormat('en-US').format(date);
                
                    return rule.isMin ? $.dvc3_isValidBetweenDate(data, val) >= 0 : ($.dvc3_isValidBetweenDate(data, comparedDate) >0 && $.dvc3_isValidBetweenDate(data,val) <= 0 )
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Năm data phải lớn hơn field truyền vào tối đa/tối thiểu là numYear (năm);*/
        YearGreaterThanField: function (comparedField, numYear, isMin, message, isModal) {
            var mess = message;
            if(isModal && !window.dvc3State)
                throw ("call dvc3_setObjContent first, please!");

            if (mess == null || typeof mess == "undefined") {
                mess = "Năm phải lớn hơn hoặc bằng trường so sánh" + isMin ? " tối  thiểu" : "tối đa" + " (năm)";
            }
            return {
                type: "yearGreaterThan",
                isMin: isMin,
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule, gridInfo) {
                    var comparedDate = gridInfo ? gridInfo.row[comparedField] : (isModal?window.dvc3State.Modal_data[comparedField]: window.dvc3Objcontent[comparedField]);
                    if (_isEmptyDate(data) || _isEmptyDate(comparedDate)) return true;
                    let date = new Date(comparedDate);
                    let year = date.getFullYear() + numYear;
                    date.setFullYear(year);
                    let val = new Intl.DateTimeFormat('en-US').format(date);
                
                    return rule.isMin ? $.dvc3_isValidBetweenDate(data, val) >= 0 : ($.dvc3_isValidBetweenDate(data, comparedDate) >0 && $.dvc3_isValidBetweenDate(data,val) <= 0 )
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

         /*Năm data phải hơn hiện tại là numYear (năm)*/
         YearGreaterThanNow: function (numYear, message, isMax) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Năm phải lớn hơn năm hiện tại " + numYear + " (năm)";
            }
            return {
                type: "yeargreaterthannow",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data)) return true;
                    return $.dvc3_isValidYearGreaterNow(data, numYear, isMax)					
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

        /*Ngày data trừ đi ngày truyền vào phải trong khoảng from, to */
        DateBetween: function (comparedDate, numDayFrom, numdayTo, message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày phải trong khoảng từ " + numDayFrom + "đến" + numDayTo + " so với ngày " + comparedDate;
            }
            return {
                type: "daygreaterthan",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule) {
                    if (_isEmptyDate(data) || _isEmptyDate(comparedDate)) return true;
                    return $.dvc3_isValidBetweenDate(data, comparedDate) >= numDayFrom && $.dvc3_isValidBetweenDate(data, comparedDate) <= numdayTo
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

        /*Ngày data trừ đi ngày field truyền vào phải trong khoảng from, to */
        DateBetweenField: function (comparedField, numDayFrom, numdayTo, message, isModal) {
            var mess = message;
            if(isModal && !window.dvc3State)
                throw ("call dvc3_setObjContent first, please!");
            if (mess == null || typeof mess == "undefined") {
                mess = "Ngày phải trong khoảng từ " + numDayFrom + "đến" + numDayTo + " so với ngày của trường so sánh";
            }
            return {
                type: "daygreaterthan",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: function (data, rule, gridInfo) {
                    var cpValue = gridInfo ? gridInfo.row[comparedField] : (isModal?window.dvc3State.Modal_data[comparedField]: window.dvc3Objcontent[comparedField]);			

                    if (_isEmptyDate(data) || _isEmptyDate(cpValue)) return true;
                    return $.dvc3_isValidBetweenDate(data, cpValue) >= numDayFrom && $.dvc3_isValidBetweenDate(data, cpValue) <= numdayTo
                }, //Function de validate du lieu                
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

        //#endregion Datetime

        //#region Character
        /*Không chứa kí tự đặc biệt và kí tự số*/
        SpecialName: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Vui lòng không nhập kí tự đặc biệt và số";
            }
            return {
                type: "specialName",
                Reversed: true, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: null, //Function de validate du lieu
                ValidateRegex: /[0-9|\]|[|""|\\|~|!|@|{}|<|>|#|$|^|*|.|,|/|?|%|`|&|_|+|=|:|;|\\-\\]/, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Không chứa kí tự đặc biệt và kí tự số*/
        NoSpecialAndNumber: function (message) {
            return this.SpecialName(message);
            // var mess = message;
            // if (mess == null || typeof mess == "undefined") {
            //     mess = "Vui lòng không nhập kí tự đặc biệt và số";
            // }
            // return {
            //     type: "specialName",
            //     Reversed: true, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
            //     ValidateFunc: null, //Function de validate du lieu
            //     ValidateRegex: /[0-9|\]|[|""|\\|~|!|@|{}|<|>|#|$|^|*|.|,|/|?|%|`|&|()|_|+|=|:|;|\\-\\-]/, //Regex de validate du lieu
            //     Message: mess
            // }
        },
        /*Không chứa kí tự đặc biệt */
        NoSpecialCharacter: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Vui lòng không nhập kí tự đặc biệt";
            }
            return {
                type: "notSpecialCharacter",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: null, //Function de validate du lieu
                ValidateRegex: /^[^\[\]{}<>*=?^$!#%_`~"]*$/, //Regex de validate du lieu
                //        ValidateRegex: /^[^\\[\]{}()<>*+=?^$|:!@#%_;`~"']*$/, //Regex de validate du lieu
                Message: mess
            }
        },
        /*Số quyết định: không chứa kí tự đặc biệt*/
        DecisionNumber: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Vui lòng không nhập kí tự đặc biệt";
            }
            return {
                type: "decisionNumber",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: null, //Function de validate du lieu
                ValidateRegex: /^[a-z0-9\u0110\u00d0\][a-z0-9\/\-\u0110\u00d0\u111]*$/i, //Regex de validate du lieu
                Message: mess
            }
        },

        /*Số giấy tờ chung: chỉ chữ cái, chữ số và các ký tự sau: -/ */
        CommonDocNumber: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Vui lòng không nhập kí tự đặc biệt";
            }
            return {
                type: "commonDocNumber",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: null, //Function de validate du lieu
                ValidateRegex: /^[a-z0-9\u0110\u00d0\][a-z0-9\/\-\u0110\u00d0]*$/i, //Regex de validate du lieu
                Message: mess
            }
        },

        /*Giá trị phải lớn hơn giá trị của trường truyền vào tối thiểu/tối đa là x đơn vị */
        NumberGreaterThanField: function (comparedField, value, isMin, message, isModal) {
            var mess = message;
            if(isModal && !window.dvc3State)
                throw ("call dvc3_setObjContent first, please!");
            if (mess == null || typeof mess == "undefined") {
                mess = "Giá trị phải lớn hơn trường so sánh" + isMin ? "tối thiểu là " : "tối đa là " + value;
            }
            return {
                type: "numberGreaterThanField",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                isMin: isMin,
                ValidateFunc: function (data, rule, gridInfo) {
                    var cpValue = gridInfo ? gridInfo.row[comparedField] : (isModal?window.dvc3State.Modal_data[comparedField]: window.dvc3Objcontent[comparedField]);

                    if (_isEmptyDate(data) || _isEmptyDate(cpValue)) return true;
                    return rule.isMin ? (data - cpValue >= value) : (data - cpValue <= value)
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },

        NumberLessThanField: function (comparedField, value, isMin, message, isModal) {
            var mess = message;
            if(isModal && !window.dvc3State)
                throw ("call dvc3_setObjContent first, please!");

            if (mess == null || typeof mess == "undefined") {
                mess = "Giá trị phải nhỏ hơn trường so sánh"  + isMin ? "tối thiểu là " : "tối đa là " + value;
            }
            return {
                type: "numberLessThanField",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                isMin: isMin,
                ValidateFunc: function (data, rule, gridInfo) {
                    var cpValue = gridInfo ? gridInfo.row[comparedField] : (isModal?window.dvc3State.Modal_data[comparedField]: window.dvc3Objcontent[comparedField]);			

                    if (_isEmptyDate(data) || _isEmptyDate(cpValue)) return true;
                    return rule.isMin ? (cpValue - data >= value) : (cpValue - data <= value)
                }, //Function de validate du lieu
                ValidateRegex: null, //Regex de validate du lieu
                Message: mess
            }
        },
        TaxCode: function (message) {
            var mess = message;
            if (mess == null || typeof mess == "undefined") {
                mess = "Mã số thuế không hợp lệ";
            }
            return {
                type: "taxCode",
                Reversed: false, //true: Dao nguoc ket qua check. Thuong cho Regex ma khong viet duoc kieu thuan
                ValidateFunc: null,
                ValidateRegex: /^[0-9]{10}(-[0-9]{3})?$/, //Regex de validate du lieu
                Message: mess
            }
        },
        //#endregion
    }
})(jQuery);
//#endregion rule validate


//#region Other functions
(function ($) {
    //#region function base
    //mac dinh, chi show date
    //show_time_ids: Danh sach cac id cua datetimepicker can show time
    $.dvc3_LoadDate = function (show_time_ids) {
        $.datetimepicker.setLocale('vi');
        var stIDs = show_time_ids;
        var Opts = {
            //format: 'Y/m/d',
            format: 'd/m/Y', // n-t-n
            //format: 'm/d/Y',
            timepicker: false,
            mask: true, // '9999/19/39 29:59' - digit is the maximum possible for a cell
            scrollMonth: false,
            scrollInput: false,
            forceParse: false
        };
        var Opt2s = $.extend({}, Opts, {
            timepicker: true,
            format: 'd/m/Y H:i'
        });
        jQuery('.datepicker').each(function () {
            if ($(this).data("initialized"))
                return;
            if (typeof show_time_ids != "undefined" && show_time_ids.indexOf($(this).attr("id")) != -1) {
                $(this).datetimepicker(Opt2s)
            } else
                $(this).datetimepicker(Opts);

            if ($(this).data("initialized"), true);
        })
        //Check người dùng nhập ngày không hợp lệ thì xóa trắng.
        jQuery('.datepicker').blur(function () {
            if (!moment($(this).val(), 'DD/MM/YYYY').isValid())
                $(this).val('__/__/____');
        });

    }

    $.dvc3_generateGuid = function () {
        return $.dvc3_s4() + $.dvc3_s4() + '-' + $.dvc3_s4() + '-' + $.dvc3_s4() + '-' +
            $.dvc3_s4() + '-' + $.dvc3_s4() + $.dvc3_s4() + $.dvc3_s4();
    }
    $.dvc3_s4 = function () {
        return Math.floor((1 + Math.random()) * 0x10000)
            .toString(16)
            .substring(1);
    }
    //#endregion

    //#region call jax,url
    $.customSaveFile = function (listFileIDs) {
        if (listFileIDs.length > 0) {
            $.ajax({
                // url: 'http://uploadportal.egov.com/file/save/',
                url: $.getSaveFileUrl(),
                type: 'POST',
                //dataType: 'json',
                //xhrFields: {
                //  withCredentials: true
                //},
                //crossDomain: true,
                contentType: 'application/json',
                data: JSON.stringify(listFileIDs),
                headers: {
                    'Content-Type': 'application/json'
                },
                success: function (response) {
                    console.log('save file success');
                },
                error: function (error) {
                    console.log('Có lỗi trong quá trình lưu tập tin');
                }
            });
        }
    }
    //#endregion

    //#region validate theo rule
    $.dvc3_approveRules = function (data, fieldName, item, gridInfo) {
        let error = {
            Key: "",
            Value: ""
        }

        if ((data == "" || data == null || (data == "__/__/____" && $("#" + fieldName).hasClass("datepicker"))) && item.required) {
            error = {
                Key: fieldName,
                Value: item.messages.required != null ? item.messages.required : "Vui lòng nhập thông tin"
            };
            return error;
        }

        if (data != "" && data != null) {
            if (item.maxLength > 0 && data.length > item.maxLength) {
                error = {
                    Key: fieldName,
                    Value: item.messages.maxLength != null ? item.messages.maxLength : "Không được vượt quá " + item.maxLength + " ký tự"
                };
                return error;
            }

            for (var i = 0; item.validateType && i < item.validateType.length; i++) {
                let vd = item.validateType[i];
                if ((vd.ValidateRegex && !(vd.Reversed ? !vd.ValidateRegex.test(data) : vd.ValidateRegex.test(data))) || (vd.ValidateFunc && !(vd.Reversed ? !vd.ValidateFunc(data, vd, gridInfo) : vd.ValidateFunc(data, vd, gridInfo)))) {
                    error = {
                        Key: fieldName,
                        Value: vd.Message
                    };
                    return error;
                }
            }
        }
        return error;
    }
    //#endregion validate theo rule

    //#region validate Form
    $.dvc3_validateForm = function (data, rules, errors) {
        //let errors = []
        if (data != undefined && data != null) {
            rules.map((item, i) => {
                let error = {
                    Key: ""
                }
                let fieldName = item.field
                let obj = data[fieldName] == undefined || data[fieldName] == null ? '' : data[fieldName];
                if (typeof obj == "string")
                    obj = obj.trim();
                error = $.dvc3_approveRules(obj, fieldName, item)
                if (item.formatType) {
                    var f = $.getFormatFunc(item.formatType);
                    if (typeof f == "function")
                        data[fieldName] = f(data[fieldName]);

                }
                errors = errors == null || errors == undefined ? [] : errors

                var fieldexist = errors.find(g => g.Key === fieldName);
                if (!fieldexist) {
                    if (error.Key != "") {
                        errors.push(error)
                    }
                }
            });
        }
        //check term of condition

        return errors
    }
    //#endregion

    $.dvc3_validateGridRow = function (gridRow, rules, lastError, rowIndex, bFormatData) {
        return _validateGridRow(gridRow, rowIndex, rules, lastError, bFormatData);
    }

    _setFormatCss = function (fieldName, formatType) {
        //var _css = $.getFormatCss(formatType);
        if (formatType) {
            var _elem = typeof fieldName == "object" ? fieldName : $("#" + fieldName);
            _elem.each((i, item) => {
                if (!$(item).data("cssset")) {
                    $(item).css("text-transform", formatType);
                    $(item).data("cssset", true)
                }
            })
        }
    }


    $.dvc3_applyFormatType = function (rule) {
        var item = $("#" + rule.field);
        $(item).data("cssset", true)
        $(item).css("text-transform", rule.formatType ? rule.formatType : "");
    }

    _validateGridRow = function (gridRow, rowIndex, rules, lastError, bFormatData) {
        let isValid = true;
        let ErrorsMsg = {};
        let error = {
            Key: ""
        }
        let rule = null;
        for (var fieldName in gridRow) {
            rule = rules.find(x => x.field == fieldName);
            if (rule) {
                error = $.dvc3_approveRules(gridRow[fieldName], fieldName, rule, { row: gridRow, index: rowIndex });
                if (error.Value != "") {
                    ErrorsMsg[fieldName] = error;
                    isValid = false;
                }
                else {
                    if (lastError)
                        lastError[fieldName] = { Key: "", Value: "" };//Remove fiels's last error
                }

                if (rule.formatType) {
                    _setFormatCss($("input[name='" + fieldName + "']"), rule.formatType);
                    if (bFormatData) {
                        var f = $.getFormatFunc(rule.formatType);
                        if (typeof f == "function")
                            gridRow[fieldName] = f(gridRow[fieldName]);
                    }
                }


                //chekc if forward onchange event to other input?
                if (rule.forwardChangeEventTo) {
                    var fField = rule.forwardChangeEventTo;
                    var oRule = rules.find(item => item.field == fField);
                    if (oRule) {
                        ErrorsMsg[fieldName] = "";
                        error = $.dvc3_approveRules(gridRow[fField], fField, rule, {
                            row: gridRow,
                            index: rowIndex
                        });
                        if (error.Value != "") {
                            ErrorsMsg[fField] = error;
                            isValid = false;
                        } else {
                            lastError[fField] = {
                                Key: "",
                                Value: ""
                            }; //Remove fiels's last error
                        }

                        if (oRule.formatType) {
                            _setFormatCss($("input[name='" + fField + "']"), oRule.formatType);
                            if (bFormatData) {
                                var f = $.getFormatFunc(oRule.formatType);
                                if (typeof f == "function")
                                    gridRow[fField] = f(gridRow[fField]);
                            }
                        }
                    }
                }
            }
        }
        return { listerror: ErrorsMsg, ispasserror: isValid }
    }


    $.dvc3_validateInline = function (state, gridID) {
        let isValid = true;
        let ret;
        if (state.objcontent[gridID]) {
            if (state.objcontent[gridID].length > 0) {
                state.objcontent[gridID].map((item, j) => {
                    ret = _validateGridRow(item, j, state["rules_" + gridID], state["errors_" + gridID][j], true); // Common.validateTool(item, dataerror, rules_Grid_Inline)
                    state["errors_" + gridID][j] = Object.assign({}, state["errors_" + gridID][j], ret.listerror);
                    isValid = isValid && ret.ispasserror;
                })
            }
        }
        return isValid;
    }

    //#region validate Field
    $.dvc3_validateField = function (data, rules, fieldName, errors) { // data: field value        
        let obj = data == undefined || data == null ? '' : data;
        let error = {
            Key: ""
        }
        var oRule = rules.find(item => item.field == fieldName);
        if (!oRule) return;
        error = $.dvc3_approveRules(obj, fieldName, oRule);
        //if (oRule.formatType) {
        //   var f = $.getFormatFunc(oRule.formatType);
        //   if (typeof f=="function")
        //       data = f(data);
        //   
        //

        _setFormatCss(fieldName, oRule.formatType);
        $.dvc3_removeError(errors, fieldName)
        errors = errors == null || errors == undefined ? [] : errors
        var fieldexist = errors.find(g => g.Key === fieldName);
        if (!fieldexist) {
            if (error.Key != "") {
                errors.push(error)
            }
        }

        //chekc if forward onchange event to other input?
        if (oRule.forwardChangeEventTo && window.dvc3Objcontent) {
            //tai thoi diem nay, state cua truong hien tai chua duoc cap nhat, nen khi forwardChangeEventTo kich hoat, so sanh du lieu se ko dung, nen cap nhat o day truoc.
            window.dvc3Objcontent[fieldName] = data;
            var fField = oRule.forwardChangeEventTo;
            oRule = rules.find(item => item.field == fField);
            if (oRule) {
                $.dvc3_removeError(errors, fField);
                error = $.dvc3_approveRules(window.dvc3Objcontent[fField], fField, oRule);
                // if (oRule.formatType) {
                //     var f = $.getFormatFunc(oRule.formatType);
                //     if (typeof f=="function")
                //         window.dvc3Objcontent[fField] = f(data);
                // } 

                _setFormatCss(fField, oRule.formatType);
                var idx = errors.findIndex(g => g.Key == fField);
                if (idx != -1)
                    errors.splice(idx, 1);
                errors.push(error);
            }

        }

        return {
            isValid: errors.length == 0,
            newData: data
        };
    }
    //#endregion

    //#region remove Error
    $.dvc3_removeError = function (errors, field) {
        let idx = -1;
        if (errors && errors.length > 0 && field) {
            errors.map((item, i) => {
                if (item.Key == field) {
                    idx = i;
                }
            })
        }
        if (idx >= 0) {
            errors.splice(idx, 1);
        }
    }
    //#endregion

    //#region default Data
    /* Thanhpt :29/08/2018 => Hiển thị mặc định loại giấy tờ và nơi cấp tương ứng */

    $.dvc3_initDefaultDropDown_DocType = function (state, idLoaiGiayto, idNoiCap, idSoGiayTo, isModal, idGrid) {
        let defaultVal;
        let bDoFilter = false;
        var data = isModal ? state["Modal_data"] : state["objcontent"];
        if (!data[idLoaiGiayto] && state["lst_" + idLoaiGiayto]) {
            bDoFilter = true;
            defaultVal = state["lst_" + idLoaiGiayto].find(x => x.Selected == true);
            if (defaultVal) {
                data[idLoaiGiayto] = defaultVal.value;
                data[idLoaiGiayto + "_Name"] = defaultVal.label;
                data[idLoaiGiayto + "_Code"] = defaultVal.Code;
            }
        }

        if (state["lst_" + idNoiCap] && !data[idNoiCap] && data[idLoaiGiayto]) {
            // Filter data by idLoaiGiayTo
            if (bDoFilter && state["lst_" + idNoiCap][0].Parent_Value != null)
                state["lst_" + idNoiCap] = state["lst_" + idNoiCap].filter(x => x.Parent_Value == data[idLoaiGiayto]);

            //defaultVal = state["lst_" + idNoiCap].find(x => x.Parent_Value == data[idLoaiGiayto] && (x.Code == $.dvc3_NoicapgiaytoMacDinh(data[idLoaiGiayto])));
            defaultVal = state["lst_" + idNoiCap].find(x => x.Code == $.dvc3_NoicapgiaytoMacDinh(data[idLoaiGiayto]));
            if (defaultVal) {
                data[idNoiCap] = defaultVal.value;
                data[idNoiCap + "_Name"] = defaultVal.label;
                data[idNoiCap + "_Code"] = defaultVal.Code;
            }

        }
        //dat lai DocType cho rule của control GTTT 
        if (idSoGiayTo) {
            var rules = isModal ? state["rules_" + idGrid] : state.rules;
            let oRule = rules.find(x => x.field == idSoGiayTo);

            if (oRule) {
                if (!oRule.validateType)
                    console.log("Ban chua dat validate type $.ValidateType.Identification cho field " + idLoadGiayto);
                else
                    oRule.validateType.find(x => x.type == "identification").DocType = data[idLoaiGiayto];
            }
        }

        return state;
    }

    /* Minhvh :13/09/2018 => Mặc định nơi cấp theo loại giấy tờ */
    $.dvc3_NoicapgiaytoMacDinh = function (doctype) {
        let NoiCap = $.dvc3_Noicapgiayto();
        let LoaiGiayTo = $.dvc3_Loaigiayto();
        for (var key in LoaiGiayTo) {
            if (LoaiGiayTo[key] == doctype) return NoiCap[key];
        }
        return "";
    }

    /* Thanhpt :30/08/2018 =>  Giá trị mặc định cho dropdown Tỉnh Thành */
    $.dvc3_initDefaultDropDown_Province = function (state, idProvince, idDistrict, isModal) {
        let defaultVal;
        let bDoFilter = false;
        var data = isModal ? state["Modal_data"] : state["objcontent"];
        if (!data[idProvince]) {
            bDoFilter = true; //lan dau tien
            defaultVal = state["lst_" + idProvince].find(x => x.Selected == true);
            if (defaultVal) {
                data[idProvince] = defaultVal.value;
                data[idProvince + "_Name"] = defaultVal.label;
                data[idProvince + "_Code"] = defaultVal.Code;
            }
        }

        if (state["lst_" + idDistrict] && !data[idDistrict] && data[idProvince] &&
            bDoFilter == true) {
            state["lst_" + idDistrict] = state["lst_" + idDistrict].filter(x => x.Parent_Value == data[idProvince]);
        }

        return state;
    }

    /* Thanhpt :29/08/2018 => Giá trị mặc định cho dropdown */
    $.dvc3_initDefaultDropDown = function (state, idDropdown, isModal) {
        let defaultVal;
        var data = isModal ? state["Modal_data"] : state["objcontent"];
        if (!data[idDropdown]) {
            defaultVal = state["lst_" + idDropdown].find(x => x.Selected == true);
            if (defaultVal) {
                data[idDropdown] = defaultVal.value;
                data[idDropdown + "_Name"] = defaultVal.label;
                data[idDropdown + "_Code"] = defaultVal.Code;
            }
        }
        return state;
    }

    /* HaiTD :16/07/2018 => Địa chỉ đầy đủ- Full Address */
    $.dvc3_initFullAddress = function (nameCountry, nameProvince, nameDistrinct, nameWard, nameAddress) {
        var fullAddress = "";
        if (nameProvince && nameProvince !="") {
            fullAddress = nameProvince + fullAddress;
        }
        if (nameDistrinct && nameDistrinct !="") {
            // var district = nameDistrinct;
            // district = nameDistrinct[0].toUpperCase() + nameDistrinct.slice(1);
            fullAddress = nameDistrinct + ', ' + fullAddress;
        }
        if (nameWard && nameWard !="") {
            // var ward = nameWard;
            //if (nameAddress != "") {
            //     ward = nameWard[0].toUpperCase() + nameWard.slice(1);
            //  }
            fullAddress = nameWard + ', ' + fullAddress;
        }
        if (nameCountry) {
            if(fullAddress !="")
            {
                fullAddress = fullAddress + ', ' + nameCountry;
            }
            else
            {
                fullAddress = nameCountry;
            }
        }
        if (nameAddress) {
            fullAddress = nameAddress + ', ' + fullAddress;
        }
        return fullAddress;
    }

    //#endregion

    //#region vadidate bussiness

    /* HaiTD :16/07/2018 => Xử lý định dạng Số điện thoại (phone)*/
    $.dvc3_isValidPhone = function (phone) {
        //var arrayPrefixMobileNumber = new Array("0120", "0121", "0122", "0123", "0124", "0125", "0126", "0127", "0128", "0129", "0160", "0161", "0162", "0163", "0164", "0165", "0166", "0167", "0168", "0169", "0186", "0188", "0199", "08", "083", "086", "0868", "088", "089", "090", "091", "092", "093", "094", "095", "096", "097", "098", "099", "034");
        var arrayPrefixMobileNumber = new Array("052","071","072","087", "08", "083", "086", "0868", "088", "089", "090", "091", "092", "093", "094", "095", "096", "097", "098", "099", "034","032", "033", "034", "035", "036", "037", "038", "039","070", "079", "077", "076", "078", "083", "084", "085", "081","082","056", "058", "059");
        var arrayPrefixNumber = new Array("0200", "0201", "0202", "0203", "0204", "0205", "0206", "0207", "0208", "0209", "0210", "0211", "0212", "0213", "0214", "0215", "0216", "0217", "0218", "0219", "0220", "0221", "0222", "0223", "0224", "0225", "0226", "0227", "0228", "0229", "0230", "0231", "0232", "0233", "0234", "0235", "0236", "0237", "0238", "0239", "0240", "0241", "0242", "0243", "0244", "0245", "0246", "0247", "0248", "0249", "0250", "0251", "0252", "0253", "0254", "0255", "0256", "0257", "0258", "0259", "0260", "0261", "0262", "0263", "0264", "0265", "0266", "0267", "0268", "0269", "0270", "0271", "0272", "0273", "0274", "0275", "0276", "0277", "0278", "0279", "0280", "0281", "0282", "0283", "0284", "0285", "0286", "0287", "0288", "0289", "0290", "0291", "0292", "0293", "0294", "0295", "0296", "0297", "0298", "0299");
        var strNumber = phone;
        //strNumber = strNumber.replace(/-/g, '');
        var regEx = new RegExp(/^[0-9]+$/);
        let error = {
            Key: "",
            Value: ""
        }
        if (regEx.test(strNumber.trim())) {
            if (strNumber != "") {
                if ((strNumber.trim().length == 10 || strNumber.trim().length == 11) && regEx.test(strNumber.trim())) {
                    var strPrefixNumber = strNumber.replace('-', '');
                    var flagPrefix = false;
                    var flagNumber = false;
                    for (var j = 0; j < arrayPrefixNumber.length; j++) {
                        if (strPrefixNumber.startsWith(arrayPrefixNumber[j])) {
                            flagPrefix = true;
                        }
                        if (strPrefixNumber.startsWith(arrayPrefixNumber[j]) && strNumber.trim().length == 11) {
                            flagNumber = true;
                        }
                    }
                    for (var j = 0; j < arrayPrefixMobileNumber.length; j++) {
                        if (strPrefixNumber.startsWith(arrayPrefixMobileNumber[j])) {
                            flagPrefix = true;
                        }
                        if ((strPrefixNumber.startsWith(arrayPrefixMobileNumber[j]) && strNumber.trim().length == 10 && arrayPrefixMobileNumber[j].length == 3) || (strPrefixNumber.startsWith(arrayPrefixMobileNumber[j]) && strNumber.trim().length == 11 && arrayPrefixMobileNumber[j].length == 4)) {
                            flagNumber = true;
                        }
                    }
                    if (!flagPrefix) {
                        error = {
                            Key: phone,
                            Value: "Đầu số điện thoại không đúng."
                        }
                        return error;
                    } else if (!flagNumber) {
                        error = {
                            Key: phone,
                            Value: "Điện thoại không đúng định dạng."
                        }
                        return error;
                    }
                    return true;
                } else {
                    error = {
                        Key: phone,
                        Value: "Điện thoại không đúng định dạng (10 hoặc 11 số)."
                    }
                    return error;
                }
            }
        } else {
            phone = phone.slice(0, -1);
            error = {
                Key: phone,
                Value: "Điện thoại không được nhập chữ cái và kí tự đặc biệt"
            }
            return error;
        }
    }

    /* Minhvh : 05/09/2018 =>  Kiểm tra validate fax */
    $.dvc3_isValidFax = function (fax) {
        var regEx = new RegExp(/^[0-9]+$/);
        let error = {
            Key: "",
            Value: ""
        }
        if (!regEx.test(fax.trim())) {
            fax = fax.slice(0, -1);
            error = {
                Key: fax,
                Value: "Fax không được nhập chữ cái và kí tự đặc biệt"
            }
            return error;
        }
        return true;
    }

    /* Validate Email */
    $.dvc3_isValidEmail = function (email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email.toLowerCase());
    }

    /* Validate Code */
    $.dvc3_isValidCode = function (code) {
        var re = /^([a-zA-Z0-9_]*)$/;
        return re.test(code.toLowerCase());
    }

    /* Validate Số */
    $.dvc3_isValidNumber = function (number) {
        var re = /^(\d+)$/;
        return re.test(number)
    }

    /* HaiTD :13/07/2018 => Xử lý số giấy tờ theo loại giấy tờ */
    $.dvc3_isValidDocumentType = function (idDocumentType, idNumber) {
        var regEx = new RegExp(/^[0-9]*$/);
        //var regExHC = new RegExp(/^([A-Z][0-9]{7})*$/);
        var regExHC = new RegExp(/^[a-z0-9]+$/i);
        var regExCAQD= new RegExp(/^[A-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪỬỮỰỲỴÝỶỸ0-9:.-]*$/);
        let error = {
            Key: "",
            Value: ""
        }
        var length = idNumber.length;
        if (length == 0) {
            return true;
        }



        var loaiGiayTo = $.dvc3_Loaigiayto();
        //Chứng minh thư nhân dân
        if (idDocumentType == loaiGiayTo.CMT) {
            if (regEx.test(idNumber)) {
                if (length == 9 || length == 12) {
                    return true;
                } else {
                    error = {
                        Key: idNumber,
                        Value: "Số CMND phải là 9 hoặc 12 số"
                    }
                    return error;
                }
                return true;
            } else {
                idNumber = idNumber.slice(0, -1);
                error = {
                    Key: idNumber,
                    Value: "Số CMND không được nhập chữ cái và kí tự đặc biệt"
                }
                return error;
            }
        }
        //Thẻ căn cước, mã số định danh cá nhân
        if (idDocumentType == loaiGiayTo.TheCC || idDocumentType== loaiGiayTo.MasoDDCN) {
            if (regEx.test(idNumber)) {
                if (length == 12) {
                    return true;
                } else {
                    error = {
                        Key: idNumber,
                        Value: (idDocumentType == loaiGiayTo.TheCC ? "Thẻ căn cước":"Mã số định danh cá nhân")+ " phải là 12 số"
                    }
                    return error;
                }
                return true;
            } else {
                idNumber = idNumber.slice(0, -1);
                error = {
                    Key: idNumber,
                    Value: (idDocumentType == loaiGiayTo.TheCC ? "Thẻ căn cước" : "Mã số định danh cá nhân") + " phải là 12 số"
                }
                return error;
            }
        }
        //Hộ chiếu
        if (idDocumentType == loaiGiayTo.HC) {
            if (regExHC.test(idNumber) && idNumber.length <= 16) {
                return true;
            } else {
                error = {
                    Key: idNumber,
                    //Value: "Hộ chiếu bắt đầu 1 ký tự in hoa và 7 chữ số."
                    Value: "Hộ chiếu không được chứa ký tự đặc biệt"
                }
                if (idNumber.length > 16)
                    error.Value += error.Value.length == 0 ? "Hộ chiếu không được quá 16 ký tự" : ", không quá 16 ký tự";

                return error;
            }
        }

        //Sổ hộ khẩu
        if (idDocumentType == loaiGiayTo.SoHK) {
            if (regEx.test(idNumber)) {
                if (length >= 4 && length <= 10) {
                    return true;
                } else {
                    error = {
                        Key: idNumber,
                        Value: "Số sổ hộ khẩu từ 4 đến 10 số"
                    }
                    return error;
                }
                return true;
            } else {
                idNumber = idNumber.slice(0, -1);
                error = {
                    Key: idNumber,
                    Value: "Số sổ hộ khẩu không được nhập chữ cái và kí tự đặc biệt"
                }
                return error;
            }
        }
        //Số CMCA
        if (idDocumentType == loaiGiayTo.SoCMCA) {
            if (regExCAQD.test(idNumber)) {
                if (length >= 6 && length <= 12) {
                    return true;
                } else {
                    error = {
                        Key: idNumber,
                        Value: "Số CMCA từ 6 đến 12 ký tự"
                    }
                    return error;
                }
                return true;
            } else {
                idNumber = idNumber.slice(0, -1);
                error = {
                    Key: idNumber,
                    Value: "Số CMCA bao gồm chữ cái viết hoa, chữ số và kí tự đặc biệt '- .'"
                }
                return error;
            }
        }
        //Số CMQĐ
        if (idDocumentType == loaiGiayTo.SoCMQD) {
            if (regExCAQD.test(idNumber)) {
                if (length >= 6 && length <= 12) {
                    return true;
                } else {
                    error = {
                        Key: idNumber,
                        Value: "Số CMQĐ từ 6 đến 12 ký tự"
                    }
                    return error;
                }
                return true;
            } else {
                idNumber = idNumber.slice(0, -1);
                error = {
                    Key: idNumber,
                    Value: "Số CMQĐ bao gồm chữ cái viết hoa, chữ số và kí tự đặc biệt '- .'"
                }
                return error;
            }
        }

        var otherRegex = /^[a-z0-9\u0110\u00d0\][a-z0-9\/\-\u0110\u00d0]*$/i;
        if (!otherRegex.test(idNumber)) {
            error = {
                Key: idNumber,
                Value: "Không chấp nhận kí tự đặc biệt"
            }
            return error;
        }

        //Cac truong hop khac        
        return true;

    }

    //#region   Datetime
    /* HAITD : 13/07/2018 => Validate Khoảng thời gian */
    $.dvc3_isValidBetweenDate = function (start_date, end_date) {
        
        var oRegex = new RegExp("[\s]{2,}", "g");
        var d1 = start_date.replace(oRegex, " ").split(" ");
        var d2 = end_date.replace(oRegex, " ").split(" ");
        var dateParts_start = d1[0].split("/");
        var dateParts_end = d2[0].split("/");
        var timeParts_start = ["00", "00"];
        var timeParts_end = ["00", "00"];
        if (d1[1])
            timeParts_start = d1[1].split(":");
        if (d2[1])
            timeParts_end = d2[1].split(":");

        var date1 = new Date(dateParts_start[2], dateParts_start[0] - 1, dateParts_start[1], timeParts_start[0], timeParts_start[1]);
        var date2 = new Date(dateParts_end[2], dateParts_end[0] - 1, dateParts_end[1], timeParts_end[0], timeParts_end[1]);
        //var timestart = Math.ceil(date1.getTime() / (1000 * 3600 * 24));
        //var timeend = Math.ceil(date2.getTime() / (1000 * 3600 * 24));
        //var timeDiff = timestart - timeend;
        return (date1 - date2) / (24 * 3600 * 1000);
    }

    /* HAITD : 13/07/2018 => Ngày hiện tại : Date now DD/MM/YYYY */
    $.dvc3_isValidDateNow = function () {
        var dateString = "";
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        dateString = mm + '/' + dd + '/' + yyyy; // kết quả thời gian hiện tại
        return dateString;
    }
    $.dvc3_isValidDateTimeNow = function () {
        
        var dateString = "";
        var today = new Date();
        var dd = today.getDate();
        var MM = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();
        var hh = today.getHours();
        var mm = today.getMinutes();
        if (dd < 10) {
            dd = '0' + dd
        }
        if (MM < 10) {
            MM = '0' + MM
        }
        if (mm < 10) {
            mm = '0' + mm
        }
        if (hh < 10) {
            hh = '0' + hh
        }
        dateString = MM + '/' + dd + '/' + yyyy + " " + hh + ":" + mm; // kết quả thời gian hiện tại
        return dateString;
    }
    /* Thanhpt : 09/04/2018 => Kiểm tra ngày sinh có lớn hơn x tuổi tính từ ngày hiện tại truyển string ngày sinh */
    $.dvc3_isValidYearGreaterNow = function (date, numYear, isMax) {
        var res = true;
        var from = date.split("/");
        var _date = new Date(from[2], from[0] - 1, from[1]);
        var now = new Date();
        var year = now.getFullYear();
        var month = now.getMonth();
        var day = now.getDate();
        var before18 = new Date(year - numYear, month, day);
        var time18 = before18.getTime();
        var timedate = _date.getTime();
        return isMax ? (_date < now && time18 < timedate) : time18 > timedate;
    }
    //#endregion

    /* DATMT : 30/08/2018 => Kiểm tra có phải HTML hay không */
    $.dvc3_isValidHtml = function (str) {
        var a = document.createElement('div');
        a.innerHTML = str;
        for (var c = a.childNodes, i = c.length; i--;) {
            if (c[i].nodeType == 1) return true;
        }
        return false;
    }

    //#endregion

    //#region format Field
    $.getFormatFunc = function (formatType) {
        var formatFunc = null;
        switch (formatType) {
            case $.dvc3_FormatType.Uppercase:
                formatFunc = str => str ? str.toUpperCase() : ""
                break;
            case $.dvc3_FormatType.Lowercase:
                formatFunc = str => str ? str.toLowerCase() : ""
                break;
            case $.dvc3_FormatType.Capitalize:
                formatFunc = $.dvc3_toCapitalize;
                break;
        }
        return formatFunc;
    }



    /* HAITD : 13/07/2018 => Format lại ngày dd/mm/yyyy to mm/dd/yyy */
    $.formatDatePrint_level3 = function (date) {
        if (date == undefined || date == null || date == 'Invalid Date') return '';
        var dateParts_start = date.split("/");
        result = dateParts_start[1] + '/' + dateParts_start[0] + '/' + dateParts_start[2];
        return result;
    }

    /* Thanhpt : 30/08/2018 => Convert 1 chuỗi  thành Capitalize (Viết hoa đầu mỗi từ, ví dụ: Toi Yeu Viet Nam) */
    $.dvc3_toCapitalize = function (str) {
        return str ? str.toLowerCase().replace(/(^|\s)[a-zàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđð]/gi, c => c.toUpperCase()) : "";
    }

    /* Minhvh : 05/09/2018 => Thay đổi ký tự tiếng việt */
    $.dvc3_removeUnicode = function (alias) {
        var str = alias;
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g, " ");
        str = str.replace(/ + /g, " ");
        str = str.trim();
        return str;
    }
    //#endregion

    $.dvc3_setObjContent = function (content, state) {
        window.dvc3Objcontent = content;
        window.dvc3State=state;
    }

    $.dvc3_getDateByWorkingDay = function (fromDate, numWorkingDay) {
        var ret = $.ajax({
            url: "/",
            method: "POST",
            data: {
                fromDate: fromDate,
                numWorkingDay: numWorkingDay
            },
            dataType: "json"
        });
        return ret;
    }

    $.dvc3_mergeRules = function (_validateRules, generatedRules) {
        if (!generatedRules) return;
        for (var FieldName in _validateRules) {
            var r = generatedRules.find(x => x.field == FieldName);
            if (r) {
                $.extend(r, _validateRules[FieldName]);
            }
        }
    }


    /*Format data khi click nut in bieu mau tren portal. (Do du lieu chua duoc format lai tai thoi diem nay*/
    $.dvc3_FormatDataForPrintPortal = function (state, gridIDs) {
        state.rules.map((rule, i) => {
            if (rule.field && rule.formatType) {
                var f = $.getFormatFunc(rule.formatType);
                if (typeof f == "function")
                    state.objcontent[rule.field] = f(state.objcontent[rule.field]);
            }
        })

        if (gridIDs) {
            gridIDs.map((gridID, i) => {
                if (gridID && state["rules_" + gridID]) {
                    state["rules_" + gridID].map((rule, j) => {
                        if (rule.field && rule.formatType) {
                            var f = $.getFormatFunc(rule.formatType);
                            if (typeof f == "function") {
                                state.objcontent[gridID].map((row, k) => {
                                    row[rule.field] = f(row[rule.field])
                                })
                            }
                        }
                    })
                }
            })
        }
    }
    /* HAITD : 05/11/2018 => Đọc ngày tháng thành chữ (mm/dd/yyyy)*/
    $.dvc3_ParseDate = function (date) {
        var opDate = {
            '0': 'không',
            '01': 'một',
            '02': 'hai',
            '03': 'ba',
            '04': 'bốn',
            '05': 'năm',
            '06': 'sáu',
            '07': 'bảy',
            '08': 'tám',
            '09': 'chín',
            '10': 'mười',
            '11': 'mười một',
            '12': 'mười hai',
            '13': 'mười ba',
            '14': 'mười bốn',
            '15': 'mười lăm',
            '16': 'mười sáu',
            '17': 'mười bảy',
            '18': 'mười tám',
            '19': 'mười chín',
            '20': 'hai mươi',
            '21': 'hai mươi mốt',
            '22': 'hai mươi hai',
            '23': 'hai mươi ba',
            '24': 'hai mươi bốn',
            '25': 'hai mươi lăm',
            '26': 'hai mươi sáu',
            '27': 'hai mươi bảy',
            '28': 'hai mươi tám',
            '29': 'hai mươi chín',
            '30': 'ba mươi',
            '31': 'ba mươi mốt',
        };
        var opMonth = {
            '01': 'một',
            '02': 'hai',
            '03': 'ba',
            '04': 'tư',
            '05': 'năm',
            '06': 'sáu',
            '07': 'bảy',
            '08': 'tám',
            '09': 'chín',
            '10': 'mười',
            '11': 'mười một',
            '12': 'mười hai',
        };
        var opYear = {
            '0': 'không',
            '1': 'một',
            '2': 'hai',
            '3': 'ba',
            '4': 'tư',
            '5': 'năm',
            '6': 'sáu',
            '7': 'bảy',
            '8': 'tám',
            '9': 'chín',
        };
        var vConvertResult = '';
        if (date != "" && date.length > 0) {
            var arrDate = date.split('/');
            var vDay = arrDate[1], vMonth = arrDate[0], vYear = arrDate[2];
            var vDayRsl = opDate[vDay];
            var vMonthRsl = opMonth[vMonth];
            var arrYear = vYear.split('');
            var vYearRsl = '';
            vYearRsl += opYear[arrYear[0]] + ' nghìn ';
            vYearRsl += opYear[arrYear[1]] + ' trăm ';
            debugger
            if (arrYear[1] == "0" && arrYear[2] == "0" && arrYear[3] == "0") {
                vYearRsl = opYear[arrYear[0]] + " nghìn";
            } else {
                if (arrYear[2] == "0") {
                    if (arrYear[3] != "0") {
                        vYearRsl += "linh " + opYear[arrYear[3]];
                    }
                }
                
                else if (arrYear[2] == "1") {
                    if (arrYear[3] == "0") {
                        vYearRsl += "mười";
                    } 
                    else if (arrYear[3] == "4") {
                        vYearRsl += "mười bốn";
                    } 
                    else {
                        vYearRsl += "mười ";
                        if (arrYear[3] == "5")
                            vYearRsl += "lăm";
                        else
                            vYearRsl += opYear[arrYear[3]];
                    }
                }
                else {
                    if (arrYear[2] == "4") {
                        opYear[arrYear[2]] = "bốn";
                    }
                    if (arrYear[3] == "0") {
                        vYearRsl += opYear[arrYear[2]] + " mươi";
                    }
                    else if (arrYear[3] == "1") {
                        vYearRsl += opYear[arrYear[2]] + " mươi mốt";
                    }
                    else if (arrYear[3] == "5") {
                        vYearRsl += opYear[arrYear[2]] + " mươi lăm";
                    }
                    else {
                        vYearRsl += opYear[arrYear[2]] + " mươi " + opYear[arrYear[3]];
                    }
                }
            }
            vConvertResult = "Ngày " + vDayRsl + ", tháng " + vMonthRsl + ", năm " + vYearRsl;
        }
        else
            vConvertResult = "";
        return vConvertResult;
    }
     /* HAITD : 05/11/2018 => Đọc tháng năm thành chữ (mm/yyyy)*/
     $.dvc3_ParseMonthYear = function (date) {
         debugger
        var opMonth = {
            '01': 'một',
            '02': 'hai',
            '03': 'ba',
            '04': 'tư',
            '05': 'năm',
            '06': 'sáu',
            '07': 'bảy',
            '08': 'tám',
            '09': 'chín',
            '10': 'mười',
            '11': 'mười một',
            '12': 'mười hai',
        };
        var opYear = {
            '0': 'không',
            '1': 'một',
            '2': 'hai',
            '3': 'ba',
            '4': 'tư',
            '5': 'năm',
            '6': 'sáu',
            '7': 'bảy',
            '8': 'tám',
            '9': 'chín',
        };
        var vConvertResult = '';
        if (date != "" && date.length > 0) {
            var arrDate = date.split('/');
            var vMonth = arrDate[0], vYear = arrDate[1];
            var vMonthRsl = opMonth[vMonth];
            var arrYear = vYear.split('');
            var vYearRsl = '';
            vYearRsl += opYear[arrYear[0]] + ' nghìn ';
            vYearRsl += opYear[arrYear[1]] + ' trăm ';
            debugger
            if (arrYear[1] == "0" && arrYear[2] == "0" && arrYear[3] == "0") {
                vYearRsl = opYear[arrYear[0]] + " nghìn";
            } else {
                if (arrYear[2] == "0") {
                    if (arrYear[3] != "0") {
                        vYearRsl += "linh " + opYear[arrYear[3]];
                    }
                }
                
                else if (arrYear[2] == "1") {
                    if (arrYear[3] == "0") {
                        vYearRsl += "mười";
                    } 
                    else if (arrYear[3] == "4") {
                        vYearRsl += "mười bốn";
                    } 
                    else {
                        vYearRsl += "mười ";
                        if (arrYear[3] == "5")
                            vYearRsl += "lăm";
                        else
                            vYearRsl += opYear[arrYear[3]];
                    }
                }
                else {
                    if (arrYear[2] == "4") {
                        opYear[arrYear[2]] = "bốn";
                    }
                    if (arrYear[3] == "0") {
                        vYearRsl += opYear[arrYear[2]] + " mươi";
                    }
                    else if (arrYear[3] == "1") {
                        vYearRsl += opYear[arrYear[2]] + " mươi mốt";
                    }
                    else if (arrYear[3] == "5") {
                        vYearRsl += opYear[arrYear[2]] + " mươi lăm";
                    }
                    else {
                        vYearRsl += opYear[arrYear[2]] + " mươi " + opYear[arrYear[3]];
                    }
                }
            }
            vConvertResult = "Tháng " + vMonthRsl + ", năm " + vYearRsl;
        }
        else
            vConvertResult = "";
        return vConvertResult;
    }
     /* HAITD : 22/11/2018 => Đọc năm thành chữ (yyyy)*/
     $.dvc3_ParseYear = function (year) {
        var opYear = {
            '0': 'không',
            '1': 'một',
            '2': 'hai',
            '3': 'ba',
            '4': 'tư',
            '5': 'năm',
            '6': 'sáu',
            '7': 'bảy',
            '8': 'tám',
            '9': 'chín',
        };
        var vConvertResult = '';
        if (year != "" && year.length > 0) {
            var arrYear = year.split('');
            var vYearRsl = '';
            vYearRsl += opYear[arrYear[0]] + ' nghìn ';
            vYearRsl += opYear[arrYear[1]] + ' trăm ';
            if (arrYear[1] == "0" && arrYear[2] == "0" && arrYear[3] == "0") {
                vYearRsl = opYear[arrYear[0]] + " nghìn";
            } else {
                if (arrYear[2] == "0") {
                    if (arrYear[3] != "0") {
                        vYearRsl += "linh " + opYear[arrYear[3]];
                    }
                }
                else if (arrYear[2] == "1") {
                    if (arrYear[3] == "0") {
                        vYearRsl += "mười";
                    } else if (arrYear[3] == "4") {
                        vYearRsl += "mười bốn";
                    } 
                    else {
                        vYearRsl += "mười ";
                        if (arrYear[3] == "5")
                            vYearRsl += "lăm";
                        else
                            vYearRsl += opYear[arrYear[3]];
                    }
                }
                else {
                    if (arrYear[2] == "4") {
                        opYear[arrYear[2]] = "bốn";
                    }
                    if (arrYear[3] == "0") {
                        vYearRsl += opYear[arrYear[2]] + " mươi";
                    }
                    else if (arrYear[3] == "1") {
                        vYearRsl += opYear[arrYear[2]] + " mươi mốt";
                    }
                    else if (arrYear[3] == "5") {
                        vYearRsl += opYear[arrYear[2]] + " mươi lăm";
                    }
                    else {
                        vYearRsl += opYear[arrYear[2]] + " mươi " + opYear[arrYear[3]];
                    }
                }
            }
            vConvertResult = "Năm " + vYearRsl;
        }
        else
            vConvertResult = "";
        return vConvertResult;
    }

    /* Minhvh : 13/12/2018 => Đọc giờ phút thành chữ (23:15)*/
    $.dvc3_ParseHourMinutes = function (date) {
        var opHour = {
            '0': 'không',
            '01': 'một',
            '02': 'hai',
            '03': 'ba',
            '04': 'bốn',
            '05': 'năm',
            '06': 'sáu',
            '07': 'bảy',
            '08': 'tám',
            '09': 'chín',
            '10': 'mười',
            '11': 'mười một',
            '12': 'mười hai',
            '13': 'mười ba',
            '14': 'mười bốn',
            '15': 'mười lăm',
            '16': 'mười sáu',
            '17': 'mười bảy',
            '18': 'mười tám',
            '19': 'mười chín',
            '20': 'hai mươi',
            '21': 'hai mươi mốt',
            '22': 'hai mươi hai',
            '23': 'hai mươi ba',
            '24': 'hai mươi bốn',
        };
        var opMinutes = {
            '01': 'một',
            '02': 'hai',
            '03': 'ba',
            '04': 'tư',
            '05': 'năm',
            '06': 'sáu',
            '07': 'bảy',
            '08': 'tám',
            '09': 'chín',
            '10': 'mười',
            '11': 'mười một',
            '12': 'mười hai',
            '13': 'mười ba',
            '14': 'mười bốn',
            '15': 'mười lăm',
            '16': 'mười sáu',
            '17': 'mười bảy',
            '18': 'mười tám',
            '19': 'mười chín',
            '20': 'hai mươi',
            '21': 'hai mươi mốt',
            '22': 'hai mươi hai',
            '23': 'hai mươi ba',
            '24': 'hai mươi bốn',
            '25': 'hai mươi lăm',
            '26': 'hai mươi sáu',
            '27': 'hai mươi bảy',
            '28': 'hai mươi tám',
            '29': 'hai mươi chín',
            '30': 'ba mươi',
            '31': 'ba mươi mốt',
            '32': 'ba mươi hai',
            '33': 'ba mươi ba',
            '34': 'ba mươi tư',
            '35': 'ba mươi lăm',
            '36': 'ba mươi sáu',
            '37': 'ba mươi bảy',
            '38': 'ba mươi tám',
            '39': 'ba mươi chín',
            '40': 'bốn mươi',
            '41': 'bốn mươi mốt',
            '42': 'bốn mươi hai',
            '43': 'bốn mươi ba',
            '44': 'bốn mươi bốn',
            '45': 'bốn mươi lăm',
            '46': 'bốn mươi sáu',
            '47': 'bốn mươi bảy',
            '48': 'hai mươi tám',
            '49': 'hai mươi chín',
            '50': 'năm mươi',
            '51': 'năm mươi mốt',
            '52': 'năm mươi hai',
            '53': 'năm mươi ba',
            '54': 'năm mươi bốn',
            '55': 'năm mươi lăm',
            '56': 'năm mươi sáu',
            '57': 'năm mươi bảy',
            '58': 'năm mươi tám',
            '59': 'năm mươi chín',
            '60': 'sáu mươi',
        };
        var vConvertResult = '';
        if (date != "" && date.length > 0) {
            var arrDate = date.split(':');
            var vHour = arrDate[0], vMinutes = arrDate[1];

            var vHourRsl = opHour[vHour];
            var vMinutesRsl = opMinutes[vMinutes];
           
            vConvertResult = vHourRsl + " giờ " + vMinutesRsl + " phút";
            
        }
        else
            vConvertResult = "";
        return vConvertResult;
    }

    // valid số định danh (03/11/2018)
    $.dvc3_isValidIdentity = function (identity) {
        var regEx = new RegExp(/^[0-9]+$/);
        let error = {
            Key: "",
            Value: ""
        }
        if (!regEx.test(identity.trim())) {
            identity = identity.slice(0, -1);
            error = {
                Key: identity,
                Value: "Số định danh không được nhập chữ cái và kí tự đặc biệt"
            }
            return error;
        }
        else {
            if (identity.length != 12) {
                error = {
                    Key: identity,
                    Value: "Số định danh bắt buộc 12 số"
                }
                return error;
            }
        }
        return true;
    }
    $.dvc3_year = function (year) {
        var regEx = new RegExp(/^[0-9]+$/);
        let error = {
            Key: "",
            Value: ""
        }
        if (!regEx.test(year.trim())) {
            error = {
                Key: year,
                Value: "Năm chỉ được nhập số"
            }
            return error;
        }
        else {
            if (year.length == 4) {
                let today = new Date();
                let yyyy = today.getFullYear();
                if (year > yyyy) {
                    error = {
                        Key: year,
                        Value: "Năm không được lớn hơn năm hiện tại"
                    }
                    return error;
                }
                if (1900 > year) {
                    error = {
                        Key: year,
                        Value: "Năm không được nhỏ hơn năm 1900"
                    }
                    return error;
                }
            }
            else {
                error = {
                    Key: year,
                    Value: "Năm bắt buộc là 4 số"
                }
                return error;
            }
        }
        return true;
    }
    $.dvc3_monthyear = function (monthyear) {
        debugger
        let error = {
            Key: "",
            Value: ""
        }
        var today = new Date();
        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        let arr = monthyear.split("/");
        if (arr.length == 2) {
            if (arr[1] >= yyyy) {
                if (arr[1] == yyyy) {
                    if (arr[0] > mm) {
                        error = {
                            Key: monthyear,
                            Value: "Tháng không được lớn hơn tháng hiện tại"
                        }
                        return error;
                    }
                }
                else {
                    error = {
                        Key: monthyear,
                        Value: "Tháng/năm không được lớn hơn tháng/năm hiện tại"
                    }
                    return error;
                }
            }
            else {
                if (1900 > arr[1]) {
                    error = {
                        Key: monthyear,
                        Value: "Tháng/năm không được nhỏ hơn 01/1900"
                    }
                    return error;
                } 
            }
            return true;
        }
        else {
            return error = {
                Key: monthyear,
                Value: "Định dạng không phải là tháng/năm"
            }
        }

    }
    //Validate Số và sổ
    $.dvc3_NumberAndBook = function (value) {
        let error = {
            Key: "",
            Value: ""
        }
        var reg1 = /^((0+[1-9])|([1-9]))$/;
        var reg2 = /^((0+[1-9])|([1-9]))(\d+)$/;
        var reg3 = /^((0+[1-9])|([1-9]))(\\|\-|\/)19(\d){2}$/;
        var reg4 = /^((0+[1-9])|([1-9]))(\\|\-|\/)20(\d){2}$/;
        var reg5 = /^((0+[1-9])|([1-9]))(\d+)(\\|\-|\/)19(\d){2}$/;
        var reg6 = /^((0+[1-9])|([1-9]))(\d+)(\\|\-|\/)20(\d){2}$/;
        if (value) {
            var valStr = value.toString();
            error = reg1.test(valStr.toLowerCase()) || reg2.test(valStr.toLowerCase()) || reg3.test(valStr.toLowerCase()) || reg4.test(valStr.toLowerCase()) || reg5.test(valStr.toLowerCase()) || reg6.test(valStr.toLowerCase());
            if (!error) {
                error = {
                    Key: value,
                    Value: "Dữ liệu lớn hơn 0, chú thích năm từ 1900-2099(Ký tự hợp lệ: số và dấu / \\ - )"
                }
                return error;
            }
        }
        return true;
    }

    //Lay danh sach ID ho so rut gon
    $.dvc3_getInstanceIDs=function(){	 
        var arr=[];
        if(!window.dvc3State) return arr;
        window.dvc3State.listData.PS_WF_INSTANCE_ELEMENTS_INPUT.map((item,i)=>{
           arr.push({PS_WF_ELEMENT_ID:item.PS_WF_ELEMENT_ID, PS_WF_INSTANCE_ELEMENT_NAME:item.PS_WF_INSTANCE_ELEMENT_NAME, IS_REQUIRED:item.IS_REQUIRED});	           
        })
        return arr;
    }


    //show/hide thanh phan ho so
    //elements: vao mang id cac ho so
    //(inspect len de xem cac id ho so)
	
    $.dvc3_showInstanceElements=function(elements, isShow){
		if(typeof GetDataLevel3ListAttachmentsReceive=='undefined')
			setTimeout($.dvc3_showInstanceElements, 1000);
		
        if(typeof GetDataLevel3ListAttachmentsReceive.showList2=="function")
        GetDataLevel3ListAttachmentsReceive.showList2(elements, isShow);        
    }


    //Dat require/bo require thanh phan ho so
    //elements: Mang id cac  thanh phan ho so
    // isRequired: true: bat buoc| false: khong bat buoc
    $.dvc3_setRequireInstanceElements=function(elements, isRequired){
        if(typeof GetDataLevel3ListAttachmentsReceive.setRequired=="function")
            GetDataLevel3ListAttachmentsReceive.setRequired(elements, isRequired);        
    }

    //#region format currency
    //tham khảo: https://github.com/hankphung/numer_to_vietnamese_text/blob/master/src/n2vi.js
    //thanks donghung.viethanit@gmail.com
    $.dvc3_currencyToString=function(numberStr, currency){
        var default_numbers=' hai ba bốn năm sáu bảy tám chín';
        
        var units=('1 một'+ default_numbers).split(' ');
        var ch= 'lẻ mười'+default_numbers;
        var tr='không một'+default_numbers;
        var tram=tr.split(' ');
        var u='2,nghìn,triệu,tỷ,nghìn tỷ,triệu tỷ,tỷ tỷ,nghìn tỷ tỷ,triệu tỷ tỷ,tỷ tỷ tỷ,'.split(',');
        var chuc=ch.split(' ');
        
        //-------------
        function tenth(a)
        {
            var sl1=units[a[1]] ;
            var sl2=chuc[a[0]];
            var append='';
            if(a[0]>0 && a[1]==5)
            sl1='lăm';
            if(a[0]>1)
            {
            append=' mươi';
            if(a[1]==1)
                sl1=' mốt'; 
            }
            var str=sl2+''+append+' '+sl1;
            return str;
        }
        //-------------
        function block_of_three(d)
        {
            _a=d+'';
            if(d=='000')return '';
            switch(_a.length)
            {
            case 0:
            return '';

            case 1:
            return units[_a] ;

            case 2:
            return tenth(_a);

            case 3:
            sl12='';
            if(_a.slice(1,3)!='00')
                sl12=tenth(_a.slice(1,3));
            sl3=tram[_a[0]]+' trăm';
            return sl3+' '+sl12;
            }
        }
        //-------------
        function formatnumber(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        };
        //-------------
        var str=Number(numberStr)+'';
        //str=fixCurrency(a,1000);
        var i=0;
        var arr=[];
        var index = str.length;
        var result=[]
        if(index==0||str=='NaN' )
        return '';
        var ret='';

        //explode number string into blocks of 3numbers and push to queue
        while (index>=0) {
        arr.push(str.substring(index, Math.max(index-3,0)));
        index-=3;
        }

        //loop though queue and convert each block 
		debugger
        for(i=arr.length-1;i>=0;i--)
        {
        if(arr[i]!='' && arr[i]!='000'){
            result.push(block_of_three(arr[i]))
            if(u[i])			
				result.push(u[i] +(u[i]=="2"?"":","));
        }
        } 
        if(currency)
        result.push(currency)
        ret=result.join(' ')
		if(ret.length >0)
			ret=ret.charAt(0).toUpperCase() + ret.slice(1);
        //remove unwanted white space
		
        return ret.replace(/[0-9]/g, '').replace(/  /g,' ').replace(/[ ,]$/,'');
    }
    //#endregion format currency 


	///thousand separator
	$.dvc3_formatNumber=function(str){
		var parts = str.toString().replace(".",",").split(",");
		parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		return parts.join(",");
	}



    if (typeof moment == "undefined")
        $.getScript("/Scripts/datetimepicker/moment.js");
    //#endregion functions
}(jQuery));


