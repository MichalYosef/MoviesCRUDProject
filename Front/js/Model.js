"use strict";

/* Base Model module for all objects to be used generic in CRUD operations */

const Model = (function() 
{
    let modelData={};

    function get()
    {
        return modelData;
    }

    return {    get :get 
            };

}()); // end of var Model = (function()