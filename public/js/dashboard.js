var DASHBOARD = (function () {

    var state = {};

    function load() {
        
        APP.load();
        APP.replaceIcons();
        
        state.menu = $('#sidebarMenu');
        state.topMessageElement = $('#top-dashboard-message');
        state.bottomMessageElement = $('#bottom-dashboard-message');
        state.changeScopeForm = $('form#change-scope');
        
         state.changeScopeForm.submit(function (e) {
            HELPER.behaviorOnSubmit(e, $(this), function (data) {
                APP.setTopMessage(data.response.message);
                
                if (data.status == true) {
                    window.location.reload();
                }
            });
        });
    }
    
    function setTopMessage(message, type) {
        state.topMessageElement.removeClass('none');
        state.topMessageElement.html(message);
    }
    
   

    return { load, setTopMessage };
})();

//DASHBOARD = DASHBOARD();