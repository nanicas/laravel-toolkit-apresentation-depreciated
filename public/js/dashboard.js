var DASHBOARD = (function () {

    var state = {};
    
    function saveModal(form, e, callback) {

        HELPER.behaviorOnSubmit(e, form, function (data) {

            if (data.status == true) {
                DASHBOARD.hideModal();
                DASHBOARD.setTopMessage(data.response.message);
            } else {
                var resultBox = state.fastResultBox;
                if (resultBox.length > 0) {
                    resultBox.html(data.response.message);
                }
            }

            if (typeof callback == 'function') {
                callback(data.status, data);
            }
        });
    }
    
    function hideModal() {
        state.fastModalBootstrap.hide();
    }

    function loadModal(url, callback) {
        state.fastBodyModal.html('Aguarde um momento, por gentileza ...');
        state.fastModalBootstrap.show();

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'JSON',
            error: function () {
                state.fastBodyModal.html(APP.convertMessageToAlert('Ocorreu um problema durante o processamento dessa ação, tente novamente', 'danger'));
                callback(false);
            },
            success: function (data) {
                if (!data.status) {
                    state.fastBodyModal.html(data.response.message);
                } else {
                    state.fastBodyModal.html(data.response.html);
                }

                callback(data.status, data.response);
            }
        });
    }

    function load() {
        
        APP.load();
        APP.replaceIcons();
        
        state.fastModal = $('#fast-modal');
        state.fastModalBootstrap = new bootstrap.Modal(state.fastModal.get(0));
        state.fastTitleModal = $('.modal-title', state.fastModal);
        state.fastBodyModal = $('.modal-body', state.fastModal);
        state.fastResultBox = $('#fast-result-box', state.fastModal);
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
        
//        state.fastModal.on('show.bs.modal', function () {
//            alert('hixx');
//        })
          
        var pureFastModal = document.getElementById('fast-modal');
        pureFastModal.addEventListener('show.bs.modal', function (event) {
            state.fastResultBox.html('');
        });
    }
    
    function setTopMessage(message, type) {
        state.topMessageElement.removeClass('none');
        state.topMessageElement.html(message);
    }
    
   

    return { state, load, setTopMessage, loadModal, hideModal, saveModal };
})();

//DASHBOARD = DASHBOARD();