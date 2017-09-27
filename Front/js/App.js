const App = (function() 
{
    let  serverUrl = '../../Back/server.php';
   
    function getServerUrl()
    {
        return serverUrl;
    }

    return {    
        getServerUrl: getServerUrl,
    };

}()); // end of App closure