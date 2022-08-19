var get_upload_cnt_flag = true;
var amazon_upload_cnt = 0;
var newCsvResult = [];
var no_stocks = [];
var stop_flag = false;
var index = 1;
var showIndex = 1;
var tempCsvResut = [];
var exhibit_price = '{{Auth::user()->yahoo_pro}}';

$('body').on('change', '#csv_load', function(e) {
    
    newCsvResult = [];
    var csv = $('#csv_load');
    var csvFile = e.target.files[0];
    
    var ext = csv.val().split(".").pop().toLowerCase();

    if($.inArray(ext, ["csv"]) === -1){
        alert('CSVファイルを選択してください。');
        return false;
    }
    

    if(csvFile != undefined){
        
        reader = new FileReader();
        reader.onload = function(e){

            csvResult = e.target.result.split(/\n/);   

            for(var i = 1; i < csvResult.length; i++){                    
                var asin = csvResult[i].split('\r');
                asin = csvResult[i].split('"');

                if(asin.length == 1){
                    asin = csvResult[i].split('\r');
                    if(asin[0] != "")
                        newCsvResult.push(asin[0]);
                }else{
                    newCsvResult.push(asin[1]);
                }
            }

            $("#prounm").html(newCsvResult.length+" / 0件完了");
            $("#add_pro").attr('aria-valuenow', 0);
            $("#add_pro").attr('style', 'width:0%');
            
            console.log(">>>>>>>>>>>", newCsvResult);
        }     
        reader.readAsText(csvFile);       
        $("#csv_load")[0].value = '';
    }
});

$("#add_item").click(function() {
    
    if (newCsvResult.length == 0) {

    } else {
        
        getAmazonProduct();
    }

});
function get_upload_cnt_fnc(){
    jQuery.ajax({
        url: "/get_upload_cnt",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        data: {},
        success: function (response) {   

            response = JSON.parse(response);
            console.log(response);

            if(response.amazon_list_cnt > response.amazon_list_tcnt)
                response.amazon_list_cnt = response.amazon_list_tcnt;

            if(response.amazon_list_cnt == "undefined ")response.amazon_list_cnt = 0;
            if(response.amazon_list_tcnt == "undefined ")response.amazon_list_tcnt = 0;

            $("#prounm").html(response.amazon_list_tcnt + ' / '+response.amazon_list_cnt+'件完了'); 

            $("#add_pro").attr("style", "width:"+Math.round(response.amazon_list_cnt / response.amazon_list_tcnt * 100)+"%");

            if(amazon_upload_cnt == response) get_upload_cnt_flag = false;
            if(get_upload_cnt_flag == true){
                setTimeout(get_upload_cnt_fnc, 5000);
            }
        },
        error: function (responseError) {

        },

    });
}
get_upload_cnt_fnc();

function getAmazonProduct(){   

    jQuery.ajax({
        url: "/amazon_upload_info_save",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "post",
        data: {      
            index : index, 
            asin : newCsvResult,
            exhibit_price: exhibit_price
        },
        success: function (response) {
            
            jQuery.ajax({
                url: "../fmproxy/api/v1/amazons/get_info",           
                type: "get",
                data: {      
                    index : response,  
                    //asin : newCsvResult,                   
                },
                success: function (response) {                    
                    
                },
                error: function (responseError) {

                },
            });

        },
        error: function (responseError) {

        },

    });

}

