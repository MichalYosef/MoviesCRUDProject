"use strict";

/* Base Model module for all objects to be used generic in CRUD operations */

const modelController = (function() 
{
    let modelDataArr;
    //  {

    //     name: {htmlId: 'nm' , val: '' },
    //     email: {htmlId: 'em' , val: '' },
    //     phone: {htmlId: 'hp' , val: '' },
    //     adress: {htmlId: 'al' , val: '' }
    // };

    function loadInputs( crudOpt, id=0 )
    {
        let ajaxStr = '';

        switch( crudOpt )
        {
            case 'create':
             {
                for(let key in modelDataArr) 
                {
                    if( key != 'id')
                    {
                        modelDataArr[key].val = $( '#'+modelDataArr[key].htmlId ).val();
                        ajaxStr += modelDataArr[key].htmlId + '=' + modelDataArr[key].val + '&';
                    }
                }
                ajaxStr = ajaxStr.slice(0, -1);
              
                return ajaxStr; 
            }
            case 'update':
            {
                for(let key in modelDataArr) 
                {
                    if( key != 'id')
                    {
                        modelDataArr[key].val = $( '#' + modelDataArr[key].htmlId + "-" + id ).val();
                        ajaxStr += modelDataArr[key].htmlId + '=' + modelDataArr[key].val + '&';
                    }
                }
                ajaxStr = ajaxStr.slice(0, -1);
                ajaxStr += "&id="+id ;

                return ajaxStr; 
            }
            defaule:
                alert("error in modelController.loadInputs. unknown crudOpt");
            
        } //end of switch( crudOpt )

    } //end of function loadInputs

    function get()
    {
        return modelData;
    }

    function loadController(keyHtmlIdValArr)
    {
        modelDataArr = keyHtmlIdValArr;
        return this;
    }

    return {    loadInputs: loadInputs,
                get :get ,
                loadController: loadController
            };

}()); // end of var Model = (function()