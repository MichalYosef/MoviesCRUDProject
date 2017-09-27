
$( document ).ready(function() 
{
   
    CRUD.Read(); // from crud

   
    $('#btnCreate').click(function() { CRUD.Create(); });

});

// This function lets us include other js files
function require(scriptUrl) 
{
    $.ajax({
        url: scriptUrl,
        dataType: "script",
        async: false,           // <-- This is the key
        success: function () {
            // all good...
        },
        error: function () {
            throw new Error("Could not load script: " + scriptUrl);
        }
    });
}