<style type="text/css">
    .suggestionsBox2{
        position:relative;
        left:180px;
        margin:10px 0px 0px 0px ;
        width:300px;
        background-color:#BBBBBB;
        -moz-border-radius:7px;
        -webkit-border-radius:7px;
        border:2px solid #BBBBBB;


    }
    .sugesstionList2 p:hover{
        background-color:#0066FF;
        text-decoration:none

    }
    .sugesstionList2{
        margin:0px;
        padding:0px;
    }
    .sugestionList2 li{
        margin: :0px 0px 3px 0px;
        padding:3px;
        cursor:pointer;
    }


</style>
<script type="text/javascript" >
    function lookup (inputString)
    {
        if(inputString.lenght==0)
        {
            $('#suggestions').hide();
        }
        else
        {
            console.log(inputString);
            var base_url="<?php echo base_url();?>";
            $.post(base_url+'Welcome/Auto_search',{queryString: ""+inputString+""},function(data){
                if(data.length>0){
                    $('#suggestions').show();
                    $('#autoSuggestionsList').html(data);
                }
            });
        }
    }
    function  fill(thisValue)
    {
        $('#searchinputbox').val(thisValue);
        setTimeout("$('#suggestions').hide();",200);
    }
</script>