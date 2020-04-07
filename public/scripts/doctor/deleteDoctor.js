
$(".deleteDoctor").click(function(){

    console.log("received ID");
    var id = $(this).data("id");
    console.log(id);
    var token = $("meta[name='csrf-token']").attr("content");;
    console.log("received Token");
    console.log(token);
    
    $.ajax(
    {
        url: "/pharmacy/doctors/destroy/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            console.log("it Works");
        }
    });

    console.log("It failed");
});