@yield('delete')
 <script>
    $(".deleteDoctor").click(function(){
       // -> The text will appear in the button
       alert('Hello World!')->persistent("Close this");
       if(!confirm("Do you really want to do this?")) {
           console.log("It failed");
           return false;
         }
         else{
               console.log("received ID");
               var id = $(this).data("id");
               console.log(id);
               var token = $("meta[name='csrf-token']").attr("content");;
               console.log("received Token");
               console.log(token);
               var div=document.querySelector("#data"+id);
               console.log(div);
               $.ajax(
               {
                   url: "/pharmacy/doctors/destroy/"+id,
                   type: 'DELETE',
                   data: {
                       "id": id,
                       "_token": token,
                   },
                   success: function (){
                         div.remove();
                   }
               });
         }
    });
    </script>

