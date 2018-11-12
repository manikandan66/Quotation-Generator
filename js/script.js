$(document).ready(function(e){
	
	$('#traditional_form').hide();
    $('#card_type').change(function(){

    	var card_type = $('#card_type').val();
        if( card_type == 'Traditional') {
            $('#quantity').val('');
            $('input:checkbox').removeAttr('checked');
            $('#traditional_form').show(); 
            $('#customize_form').hide();
        } else if(card_type == "Customized"){
            $('#quantity').val('');
            $('input:checkbox').removeAttr('checked');
            $('#customize_form').show(); 
            $('#traditional_form').hide();
        } 
    });
    $("#estimate").click( function(e){
        e.preventDefault();
        var cname = $('#cname').val();
        var Phone = $('#Phone').val();
        var dates = $('#dates').val(); 
        var saleperson = $('#saleperson').val();
        var status = $('#status').val();
        var advance = $('#advance').val();
    	var card_type = $('#card_type').val();
        var quantity = $('#quantity').val();
        var card_size = $('#card_size').val();
        var board_type = $('#board_type').val();
        var print_side = $('#print_side').val();
        var design_chrg = $('#design_chrg').val();
        var impression = $('#impression').val();
        var dtp_chrg = $('#dtp_chrg').val();
        var card_price = $('#card_price').val();
        var save = "estimate";
        var finishing = [];
        $.each($("input[name='finishing']:checked"), function(){            
            finishing.push($(this).val());
        });
    	
        $.ajax({
            url: "ajax/quotation.php",
            type: "POST",
            data: {cname:cname, Phone:Phone, dates:dates, saleperson:saleperson, status:status, advance:advance, card_type:card_type, quantity:quantity, card_size:card_size, board_type:board_type, print_side:print_side, design_chrg:design_chrg, finishing:finishing, impression:impression, dtp_chrg:dtp_chrg, card_price:card_price, save:save} ,
            success: function (response) {
                console.log(response);
               $("#response").html(response);  

            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }


        });
    });

    $("#save").click( function(e){
        e.preventDefault();
        var cname = $('#cname').val();
        var Phone = $('#Phone').val();
        var dates = $('#dates').val(); 
        var saleperson = $('#saleperson').val();
        var status = $('#status').val();
        var advance = $('#advance').val();
        var card_type = $('#card_type').val();
        var quantity = $('#quantity').val();
        var card_size = $('#card_size').val();
        var board_type = $('#board_type').val();
        var print_side = $('#print_side').val();
        var design_chrg = $('#design_chrg').val();
        var impression = $('#impression').val();
        var dtp_chrg = $('#dtp_chrg').val();
        var card_price = $('#card_price').val();
        var save = "save";
        var finishing = [];
        $.each($("input[name='finishing']:checked"), function(){            
            finishing.push($(this).val());
        });
        
        $.ajax({
            url: "ajax/quotation.php",
            type: "POST",
            data: {cname:cname, Phone:Phone, dates:dates, saleperson:saleperson, status:status, advance:advance, card_type:card_type, quantity:quantity, card_size:card_size, board_type:board_type, print_side:print_side, design_chrg:design_chrg, finishing:finishing, impression:impression, dtp_chrg:dtp_chrg, card_price:card_price, save:save} ,
            success: function (response) {
                console.log(response);
               $("#response").html(response);  

            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }


        });
    });


    getFinishing();

    $("#add-finishing").on("submit", function(e){
        e.preventDefault();

        $.ajax({
            url:"ajax/quotation.php",
            type:"POST",
            data:new FormData(this),
            contentType:false,
            catche:false,
            processData:false,
            success:function(data){
                if(data=="Success"){
                    $('#addFinishing').modal('hide');
                    getFinishing();
                }         
            }
        });

    });

    $("#print").click( function(e){
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById('print_cont').innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    });

});
function getFinishing(){
    $.ajax({
        url: "ajax/quotation.php",
        type: "POST",
        data: {quotation:'quotation'} ,
            success: function (response) {
            $("#finish_res").html(response);  

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }


    });
}

