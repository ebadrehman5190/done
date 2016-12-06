    $(document).ready(function() {
    var max_fields      = 6; //maximum input boxes allowed
    var wrapper         = $(".remove_value"); //Fields wrapper
    var add_button      = $(".add_amount"); //Add button ID
    var loadPHP         = "select.php";    //load page to select members

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click        
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            var timestamp = randString(x);
            $(wrapper).append( $('<div class="'+timestamp+'" style="display:inline;" />').load(loadPHP)).append('<div class="'+timestamp+'" style="display:inline;"><input type="text" placeholder="amount" name="other_amount[]" style="width:60px;"/><input type="text" placeholder="Items" name="other_item[]" style="width:60px;"/><a href="#" class="remove" myattr="'+timestamp+'">Remove</a><br></div>') ; //add input box
//            $(wrapper).append('<div>');
  //          $(wrapper).load('select.php');
    //        $(wrapper).append('<input type="text" placeholder="amount" name="other_amount[]" style="width:60px;"/><a href="#" class="remove">Remove</a></div>');
        }
    });
    
    $(wrapper).on("click",".remove", function(e){ //user click on remove text
        e.preventDefault(); 
        //$(this).parent('div').remove(); x--;
        var myattr = $(this).attr('myattr');
        $("."+myattr).remove();x--;
    })
});


// generating Alpha Numeric 
function randString(x){
    var s = "";
    while(s.length<x&&x>0){
        var r = Math.random();
        s+= (r<0.1?Math.floor(r*100):String.fromCharCode(Math.floor(r*26) + (r>0.5?97:65)));
    }
    return s;
}