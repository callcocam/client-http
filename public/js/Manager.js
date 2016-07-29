$(function(){

    var options = {
        target:        '#output',   // target element(s) to be updated with server response
        beforeSubmit:  showRequest,  // pre-submit callback
        success:       showResponse,  // post-submit callback
        // other available options:
        //url:       url         // override for form's 'action' attribute
         type:      'post',        // 'get' or 'post', override for form's 'method' attribute
         dataType:  'json'
        //clearForm: true        // clear all form fields after successful submit
        //resetForm: true        // reset the form after successful submit
        // $.ajax options can be used here too, for example:
        //timeout:   3000
    };

// bind to the form's submit event
    $('.Manager').submit(function() {
        $(this).ajaxSubmit(options);
        // !!! Important !!!
        // always return false to prevent standard browser submit and page navigation
        return false;
    });



    $(".delete").click(function(){
        var url= $(this).attr('href');
        var _this=$(this);
        new PNotify({
            title: 'Confirmation Needed',
            text: 'Are you sure?',
            hide: false,
            confirm: {
                confirm: true
            },
            buttons: {
                closer: false,
                sticker: false
            },
            history: {
                history: false
            }
        }).get().on('pnotify.confirm', function() {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    beforeSend: function (xhr) {
                        dyn_notice();
                    },
                    success: function (data)
                    {
                        options.title = "Done!";
                        options.type = data.class;
                        options.hide = true;
                        options.text = data.error;
                        options.buttons = {closer: true,sticker: true};
                        options.icon = 'fa fa-check';
                        options.opacity = 1;
                        options.shadow = true;
                        options.width = PNotify.prototype.options.width;
                        notice.update(options);
                        if(data.result==true){
                            _this.parent().parent().parent().parent('.col-box-list').remove();
                        }

                    }
                });
            })
        return false;
    });

    $('.treeview').click(function(){
        return false;
    });
});


// pre-submit callback
function showRequest(formData, jqForm, options) {
    dyn_notice();
    //$('.btn').attr('disabled',true);
    return true;
}

// post-submit callback
function showResponse(responseText, statusText, xhr, $form)  {
    options.title = "Done!";
    options.type = responseText.class;
    options.hide = true;
    options.text = responseText.error;
    options.buttons = {closer: true,sticker: true};
    options.icon = 'fa fa-check';
    options.opacity = 1;
    options.shadow = true;
    options.width = PNotify.prototype.options.width;
    notice.update(options);
    $('.btn').attr('disabled',false);
}