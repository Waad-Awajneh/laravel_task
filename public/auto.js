$(document).ready(function() {
    $( "#book_title" ).autocomplete({
  
        source: function(request, response) {
            console.log(request);
            $.ajax({
            url: siteUrl + '/' +"autocomplete",
            data: {
                    term : request.term
             },
            dataType: "json",
            success:
             function(data){
                console.log(data);

               let resp = $.map(data,function(obj){
                console.log(obj);
                    return obj.book_title;
               }); 
               console.log(resp);
               response(resp);
            }
        });
    },
    minLength: 2
 });
});

// let inputSearch = document.getElementById('book_title');
// inputSearch.onchange = e =>{
//     let _token = document.getElementsByName('_token')[0].value;
//     let value=inputSearch.value;

//     console.log(_token);
//     fetch(siteUrl + '/' +"autocomplete/"+`term=${value}`,{
//         method:'post',
//         headers: {
//             'Content-Type': 'application/json',
//             'Accept': 'application/json',
//             "X-CSRF-Token": `${_token}`,
//         },
//         body:`term=${value}`
   
//     }).then( res =>res.text()).then(ress=>console.log(ress))
// }

