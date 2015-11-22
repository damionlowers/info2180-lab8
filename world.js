$(document).ready(function(){
    var value,all,format;
    var inputbox=document.createElement("input");
    var inputlabel=document.createElement("label");
    inputlabel.innerHTML="all";
    inputbox.type="checkbox";
    $("#controls").append(inputbox);
    $("#controls").append(inputlabel);
    $("#term").val('');
    $("#term").focusout(function(){
        value=$("#term").val();
    });
    $(inputbox).click(function(){
        all=$("input[type='checkbox']").is(":checked");
        if (all) {
            format="xml";
        };
    });
    $("#lookup").click(
        function(){
            $.get("world.php?lookup="+value+"&"+"all="+all+"&"+"format="+format,function(data,status){
                alert(data);
        })
})
})