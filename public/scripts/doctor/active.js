function activition (id){
    console.log(id);
    if(!confirm("Do you really want to Deactive ?")) {
        console.log("It failed");
        return false;
      }
      else{
            var text=$("#active"+id);
            console.log("received ID");
            //console.log("/pharmacy/doctors/"+id+"/activations/");
            var token = $("meta[name='csrf-token']").attr("content");;
            console.log("received Token"+token);
            $.ajax(
            {
                url: "/pharmacy/doctors/18/activations",
                type: 'PUT',
                data: {
                    "id": id,
                    "_token": token,
                },
              /*   success: function (){
                 
                } */
            })
            .done  (function(data, textStatus, jqXHR){
                if(text.text()=="Active"){
                    text.text("Disactive");
                }
                else{
                    text.text("Active");
                }
                Swal.fire(
                    'Remind!',
                    'Doctor Changed !',
                    'success'
                )  
            })
            .fail  (function(jqXHR, textStatus, errorThrown) { 
                Swal.fire(
                    textStatus,
                    errorThrown,
                    'error'
                )  
             });
      }
}