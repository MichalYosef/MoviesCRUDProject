// jquery ajax implementation of CRUD operations
const CRUD = (function() 
{
    function Create() 
    {
        $.ajax({
            type: "POST",
            url: App.getServerUrl() + '?p=create',
            data: DirectorController.loadInputs('create'),
            async: false,
            success: function(response)
            {
                Read(); 
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                View.alertError(textStatus)
            }   
            }).done(function(response)
            {
                View.notifySuccess("Create succeed")
            });
    }

    function Read()//viewData
    {
        $.ajax({
            type: "GET",
            url: App.getServerUrl() ,
            success: function(response)
            {
                //View.show('tbody',response) BUG: not working
                $('tbody').html(response);   
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                alert(jqXHR+textStatus+errorThrown);
               
            }   
        }); //end of $.ajax

    }

    function Update(id)
    {
        $.ajax({
            type: "POST",
            url: App.getServerUrl() + '?p=update',
            data: DirectorController.loadInputs('update',id),
            async: false,
            success: function(response)
            {
                Read(); 
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                alert(jqXHR+textStatus+errorThrown);
                
            }   
            });
//}); //end of $.ajax
    }

    function Delete(id)
    {
        $.ajax({
            type: "GET",
            url: App.getServerUrl() + '?p=del',
            data: "id="+id,
            async: false,
            success: function(response)
            {
                Read(); 
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                alert(jqXHR+textStatus+errorThrown);
                //BUG HERE:$('#result').html("<br/><div class='alert alert-danger'>Error: "+textStatus+"</div>");
            }   
        }); //end of $.ajax

    }

    return {    
        Create: Create,
        Read :Read ,
        Update: Update, 
        Delete: Delete    
    };

}()); // end of CRUD closure

