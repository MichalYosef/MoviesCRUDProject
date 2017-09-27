// View closure ( the V of MVC )

const View = (function() 
{

    function show( elemId, htmlStr ) 
    {
        // TODO: BUg doesnt work
        let selector = '#'+elemId;
        $(selector).html( htmlStr );
        
    }
    
    function alertError( text )
    {
        // TODO: BUg doesnt work
        //$('#result').html("<br/><div class='alert alert-danger'>Error: "+textStatus+"</div>");
    }   
        
    function notifySuccess( msg )
    {
        
        // TODO: BUg doesnt work
        
        let str = "<br/><div class='alert alert-info alert-dismissible'>"+msg+"</div>";
       
        $('#result').html(str);
        //document.getElementById('result').innerHTML=str;
        
        //$( "<br/><div class='alert alert-info'>"+msg+"</div>" ).appendTo( "#result" );
    }


    return {    
        show: show,
        notifySuccess: notifySuccess,
        alertError :alertError
    };

}()); // end of View closure

